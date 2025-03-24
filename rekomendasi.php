<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan Pemilihan Smartphone</title>
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
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
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
        }
      

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 15px); }
            100% { transform: translate(0, -0px); }
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
                    <a href="rekomendasi.php" class="text-white border-b-2 border-blue-500">REKOMENDASI</a>
                    <a href="daftar_hp.php" class="text-gray-400 hover:text-white transition duration-300">DAFTAR HP</a>
                    <a href="tentang.php" class="text-gray-400 hover:text-white transition duration-300">TENTANG</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mx-auto px-4 pt-24">
            <div class="max-w-2xl mx-auto">
                <!-- Added title section with animation -->
                <div class="text-center mb-8" data-aos="fade-down">
                    <h1 class="text-4xl font-bold text-white mb-4">Rekomendasi Smartphone</h1>
                    <p class="text-gray-300">Temukan smartphone terbaik sesuai kebutuhan Anda</p>
                </div>

                <div class="glass-card rounded-xl p-8" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-2xl font-bold text-center mb-8 text-white">Masukan Bobot</h2>

                    <form method="POST" action="hasil.php" class="space-y-6">
                        <div class="grid gap-6">
                            <!-- Harga -->
                            <div class="space-y-2" data-aos="fade-up" data-aos-delay="300">
                                <label class="font-medium text-white">Kriteria Harga</label>
                                <select required name="harga" class="dark-select w-full rounded-lg p-2.5">
                                    <option value="" disabled selected>Pilih Harga</option>
                                    <option value="7">&lt; Rp. 1.000.000</option>
                                    <option value="6">Rp. 1.000.000 - Rp. 2.000.000</option>
                                    <option value="5">Rp. 2.000.000 - Rp. 3.000.000</option>
                                    <option value="4">Rp. 3.000.000 - Rp. 4.000.000</option>
                                    <option value="3">Rp. 4.000.000 - Rp. 5.000.000</option>
                                    <option value="2">Rp. 5.000.000 - Rp. 10.000.000</option>
                                    <option value="1">&gt;Rp. 10.000.000</option>
                                </select>
                            </div>

                            <!-- RAM -->
                            <div class="space-y-2" data-aos="fade-up" data-aos-delay="400">
                                <label class="font-medium text-white">RAM</label>
                                <select required name="ram" class="dark-select w-full rounded-lg p-2.5">
                                    <option value="" disabled selected>Pilih RAM</option>
                                    <option value="1">2 GB</option>
                                    <option value="2">4 GB</option>
                                    <option value="3">6 GB</option>
                                    <option value="4">8 GB</option>
                                    <option value="5">12 GB</option>
                                    <option value="6">16 GB</option>
                                    <option value="7">&gt; 16 GB</option>
                                </select>
                            </div>

                            <!-- Memori -->
                            <div class="space-y-2" data-aos="fade-up" data-aos-delay="500">
                                <label class="font-medium text-white">Memori</label>
                                <select required name="memori" class="dark-select w-full rounded-lg p-2.5">
                                    <option value="" disabled selected>Pilih Memori</option>
                                    <option value="1">32 GB</option>
                                    <option value="2">64 GB</option>
                                    <option value="3">128 GB</option>
                                    <option value="4">256 GB</option>
                                    <option value="5">512 GB</option>
                                    <option value="6">&gt; 512 GB</option>
                                </select>
                            </div>

                            <!-- Processor -->
                            <div class="space-y-2" data-aos="fade-up" data-aos-delay="600">
                                <label class="font-medium text-white">Processor</label>
                                <select required name="processor" class="dark-select w-full rounded-lg p-2.5">
                                    <option value="" disabled selected>Pilih Processor</option>
                                    <option value="1">Dualcore</option>
                                    <option value="2">Quadcore</option>
                                    <option value="3">Octacore</option>
                                    <option value="4">Hexacore</option>
                                </select>
                            </div>

                            <!-- Kamera -->
                            <div class="space-y-2" data-aos="fade-up" data-aos-delay="700">
                                <label class="font-medium text-white">Kamera</label>
                                <select required name="kamera" class="dark-select w-full rounded-lg p-2.5">
                                    <option value="" disabled selected>Pilih Kamera</option>
                                    <option value="1">0 - 12 Mp</option>
                                    <option value="2">13 - 32 Mp</option>
                                    <option value="3">33 - 48 Mp</option>
                                    <option value="4">49 - 64 Mp</option>
                                    <option value="5">65 - 108 Mp</option>
                                    <option value="6">&gt;108 Mp</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center pt-8" data-aos="fade-up" data-aos-delay="700">
                            <button type="submit" class="btn-add">
                                Hitung
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-12 py-4">
            <div class="container mx-auto text-center text-gray-400">
                <p>&copy; Sistem Pendukung Keputusan Pemilihan Smartphone 2024.</p>
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
