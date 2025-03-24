<?php
session_start();
include('koneksi.php');

class SmartphoneRecommender
{
    private const WEIGHTS = [
        'price' => 0.3,
        'ram' => 0.2,
        'storage' => 0.2,
        'processor' => 0.15,
        'camera' => 0.15
    ];

    private const PRICE_RANGES = [
        '7' => ['max' => 1000000],
        '6' => ['min' => 1000000, 'max' => 2000000],
        '5' => ['min' => 2000000, 'max' => 3000000],
        '4' => ['min' => 3000000, 'max' => 4000000],
        '3' => ['min' => 4000000, 'max' => 5000000],
        '2' => ['min' => 5000000, 'max' => 10000000],
        '1' => ['min' => 10000000, 'max' => 350000000]
    ];
    private $pdo;
    private $error = null;

    public function __construct(PDO $database)
    {
        $this->pdo = $database;
        $this->validateWeights();
    }

    private function validateWeights()
    {
        $sum = array_sum(self::WEIGHTS);
        if (abs($sum - 1.0) > 0.0001) {
            throw new Exception("Total bobot harus berjumlah 1.0");
        }
    }

    public function getError()
    {
        return $this->error;
    }

    private function validatePriceRange($selectedValue)
    {
        if (!isset(self::PRICE_RANGES[$selectedValue])) {
            throw new Exception("Range harga tidak valid");
        }
        return self::PRICE_RANGES[$selectedValue];
    }

    private function buildPriceQuery($priceRange)
    {
        $conditions = [];
        if (isset($priceRange['min'])) {
            $conditions[] = "harga_hp >= :min_price";
        }
        if (isset($priceRange['max'])) {
            $conditions[] = "harga_hp <= :max_price";
        }

        $query = "SELECT * FROM data_hp";
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
        return $query . " ORDER BY harga_hp DESC";
    }

    // Normalisasi matriks
    private function normalizeValue($value, $min = 0, $max = PHP_FLOAT_MAX)
    {
        $value = floatval($value);
        return max(min($value, $max), $min);
    }

    // Menghitung akar jumlah kuadrat nilai untuk setiap kriteria
    // Membantu dalam normalisasi matriks keputusan
    private function calculateDivisor($matrix)
    {
        $divisor = array_fill(0, 5, 0);
        foreach ($matrix as $row) {
            for ($i = 0; $i < 5; $i++) {
                $divisor[$i] += pow($row[$i], 2);
            }
        }
        return array_map(function ($value) {
            return sqrt(max($value, 0.0001));
        }, $divisor);
    }
    // Toppsis

    private function calculateTOPSIS($normalizedMatrix)
    {
        $weights = array_values(self::WEIGHTS);
        $idealPositive = array_fill(0, 5, PHP_FLOAT_MIN);
        $idealNegative = array_fill(0, 5, PHP_FLOAT_MAX);

        // Find ideal solutions
        foreach ($normalizedMatrix as $row) {
            for ($i = 0; $i < 5; $i++) {
                $weightedValue = $row[$i] * $weights[$i];
                $idealPositive[$i] = max($idealPositive[$i], $weightedValue);
                $idealNegative[$i] = min($idealNegative[$i], $weightedValue);
            }
        }

        $results = [];
        foreach ($normalizedMatrix as $index => $row) {
            $positiveDistance = 0;
            $negativeDistance = 0;

            for ($i = 0; $i < 5; $i++) {
                $weightedValue = $row[$i] * $weights[$i];
                $positiveDistance += pow($weightedValue - $idealPositive[$i], 2);
                $negativeDistance += pow($weightedValue - $idealNegative[$i], 2);
            }

            $positiveDistance = sqrt($positiveDistance);
            $negativeDistance = sqrt($negativeDistance);

            // Handle potential division by zero
            $denominator = $positiveDistance + $negativeDistance;
            $results[] = $denominator > 0 ? $negativeDistance / $denominator : 0;
        }

        return $results;
    }

    public function getRecommendations($selectedPrice)
    {
        try {
            if (!is_numeric($selectedPrice) || $selectedPrice < 1 || $selectedPrice > 7) {
                throw new Exception("Pilihan harga tidak valid");
            }

            $priceRange = $this->validatePriceRange($selectedPrice);
            $query = $this->buildPriceQuery($priceRange);

            $stmt = $this->pdo->prepare($query);
            if (isset($priceRange['min'])) {
                $stmt->bindValue(':min_price', $priceRange['min'], PDO::PARAM_INT);
            }
            if (isset($priceRange['max'])) {
                $stmt->bindValue(':max_price', $priceRange['max'], PDO::PARAM_INT);
            }

            $stmt->execute();
            $smartphones = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($smartphones)) {
                throw new Exception("Tidak ada smartphone yang sesuai dengan kriteria yang dipilih.");
            }

            // Prepare decision matrix
            $matrix = [];
            foreach ($smartphones as $phone) {
                $matrix[] = [
                    $this->normalizeValue($phone['harga_angka']),
                    $this->normalizeValue($phone['ram_angka']),
                    $this->normalizeValue($phone['memori_angka']),
                    $this->normalizeValue($phone['processor_angka']),
                    $this->normalizeValue($phone['kamera_angka'])
                ];
            }

            // Normalize matrix
            $divisor = $this->calculateDivisor($matrix);
            $normalizedMatrix = [];
            foreach ($matrix as $row) {
                $normalizedRow = [];
                foreach ($row as $j => $value) {
                    $normalizedRow[] = $divisor[$j] != 0 ? $value / $divisor[$j] : 0;
                }
                $normalizedMatrix[] = $normalizedRow;
            }

            $scores = $this->calculateTOPSIS($normalizedMatrix);

            // Combine scores with smartphone data
            $recommendations = [];
            foreach ($scores as $i => $score) {
                $recommendations[] = [
                    'smartphone' => $smartphones[$i],
                    'nilai' => $score
                ];
            }

            // Mengurutkan rekomendasi berdasarkan skor TOPSIS
            usort($recommendations, function ($a, $b) {
                return $b['nilai'] <=> $a['nilai'];
            });
            return array_slice($recommendations, 0, 5);
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            error_log("Smartphone Recommender Error: " . $e->getMessage());
            return null;
        }
    }
}

// Initialize the recommender with PDO connection
try {
    $recommender = new SmartphoneRecommender($db);
    $selectedPrice = isset($_POST['harga']) ? $_POST['harga'] : null;
    $recommended_smartphones = $selectedPrice ? $recommender->getRecommendations($selectedPrice) : null;
    $error_message = $recommender->getError();
} catch (Exception $e) {
    $error_message = "Terjadi kesalahan sistem: " . $e->getMessage();
    error_log("System Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Smartphone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=home" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'deep-navy': '#0f172a',
                        'navy-blue': '#1e293b',
                        'navy-light': '#334155'
                    }
                }
            }
        }
    </script>
    <style>
        .dark-select {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            border-color: rgba(255, 255, 255, 0.2);
        }

        .dark-select option {
            background-color: #1e293b;
            color: white;
        }

        .glass-card {
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-add {
            background-color: rgba(37, 99, 235, 0.7);
            backdrop-filter: blur(10px);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-add:hover {
            background-color: rgba(29, 78, 216, 0.8);
            transform: translateY(-2px);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table-row-animate {
            transition: all 0.3s ease;
        }

        .table-row-animate:hover {
            transform: translateX(10px);
            background-color: rgba(255, 255, 255, 0.1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>

<body class="bg-deep-navy min-h-screen text-white">
    <div class="fixed inset-0 bg-gradient-to-br from-deep-navy via-navy-light to-light-900 opacity-50"></div>

    <div class="relative min-h-screen">
        <!-- Navigation -->
        <nav class="fixed w-full z-50 glass-effect">
            <div class="container mx-auto px-4">
                <div class="flex space-x-6 py-4">
                    <a href="index.php">
                        <span class="text-gray-400 hover:text-white transition duration-300 material-symbols-outlined">home</span>
                    </a>
                    <a href="rekomendasi.php" class="text-gray-400 hover:text-white transition duration-300">REKOMENDASI</a>
                    <a href="daftar_hp.php" class="text-gray-400 hover:text-white transition duration-300">DAFTAR HP</a>
                    <a href="tentang.php" class="text-gray-400 hover:text-white transition duration-300">TENTANG</a>
                    <a href="hasil.php" class="text-white border-b-2 border-blue-500">HASIL</a>
                </div>
            </div>
        </nav>

        <div class="container mx-auto px-4 pt-24">
            <!-- Title Section with Animation -->
            <div class="text-center mb-8" data-aos="fade-down">
                <h1 class="text-4xl font-bold text-white mb-4">Hasil Rekomendasi</h1>
                <p class="text-gray-300">Rekomendasi smartphone terbaik sesuai kriteria Anda</p>
            </div>

            <div class="glass-card rounded-xl p-8" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-center mb-8 text-white">Hasil Rekomendasi Smartphone Pada Data Tahun 2024</h2>

                <?php if ($error_message): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert" data-aos="fade-up" data-aos-delay="300">
                        <span class="block sm:inline"><?php echo htmlspecialchars($error_message); ?></span>
                    </div>
                <?php elseif ($recommended_smartphones): ?>
                    <div class="overflow-x-auto">
                        <table class="table-glass w-full rounded-lg overflow-hidden">
                            <thead class="bg-navy-light/50">
                                <tr>
                                    <th class="p-3 text-center text-white">No</th>
                                    <th class="p-3 text-center text-white">Nama</th>
                                    <th class="p-3 text-center text-white">Harga</th>
                                    <th class="p-3 text-center text-white">RAM</th>
                                    <th class="p-3 text-center text-white">Memori</th>
                                    <th class="p-3 text-center text-white">Processor</th>
                                    <th class="p-3 text-center text-white">Kamera</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recommended_smartphones as $index => $recommendation): ?>
                                    <tr class="table-row-animate">
                                        <td class="p-3 text-center text-white border-b border-white/10"><?php echo $index + 1; ?></td>
                                        <td class="p-3 text-center text-white border-b border-white/10"><?php echo htmlspecialchars($recommendation['smartphone']['nama_hp']); ?></td>
                                        <td class="p-3 text-center text-white border-b border-white/10">Rp. <?php echo number_format($recommendation['smartphone']['harga_hp'], 0, ',', '.'); ?></td>
                                        <td class="p-3 text-center text-white border-b border-white/10"><?php echo htmlspecialchars($recommendation['smartphone']['ram_hp']); ?> GB</td>
                                        <td class="p-3 text-center text-white border-b border-white/10"><?php echo htmlspecialchars($recommendation['smartphone']['memori_hp']); ?> GB</td>
                                        <td class="p-3 text-center text-white border-b border-white/10"><?php echo htmlspecialchars($recommendation['smartphone']['processor_hp']); ?></td>
                                        <td class="p-3 text-center text-white border-b border-white/10"><?php echo htmlspecialchars($recommendation['smartphone']['kamera_hp']); ?> MP</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
                <div class="text-center pt-8">
                    <button type="submit" class="btn-add" onclick="window.location.href='rekomendasi.php'">
                        Hitung Kembali
                    </button>
                </div>
            </div>
        </div>

        <footer class="mt-12 py-4">
            <div class="container mx-auto text-center text-gray-400">
                <p>&copy; Sistem Pendukung Keputusan Pemilihan Smartphone <?php echo date('Y'); ?>.</p>
            </div>
        </footer>
    </div>

    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    </script>
</body>

</html>