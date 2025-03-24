<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendukung Keputusan Pemilihan Smartphone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
        .gradient-text {
            background: linear-gradient(45deg, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 15px); }
            100% { transform: translate(0, -0px); }
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
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
                    <a href="tentang.php" class="text-white border-b-2 border-blue-500">TENTANG</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="container mx-auto px-4 pt-32 pb-16">
            <div class="text-center max-w-3xl mx-auto  rounded-xl p-8 mb-8" data-aos="fade-up">
                <h1 class="text-5xl font-bold mb-6 text-white">Sistem Pendukung Keputusan Pemilihan Smartphone</h1>
                <p class="text-xl text-gray-300 mb-8">Menggunakan Metode TOPSIS untuk Rekomendasi yang Akurat</p>
                <div class="floating">
                    <span class="material-symbols-outlined text-8xl text-blue-500">smartphone</span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 pb-16">
            <div class="max-w-4xl mx-auto space-y-12">
                <!-- About Section -->
                <div class="bg-secondary/30 backdrop-blur-md rounded-xl p-12 border border-white/10 card-hover" data-aos="fade-up">
                    <div class="flex items-center mb-6">
                        <span class="material-symbols-outlined text-4xl text-blue-500 mr-4">info</span>
                        <h2 class="text-2xl font-bold gradient-text">Tentang SPK TOPSIS</h2>
                    </div>
                    <p class="text-gray-300 leading-relaxed">
                        Sistem Pendukung Keputusan (SPK) Pemilihan Smartphone menggunakan metode TOPSIS (Technique for Order Preference by Similarity to Ideal Solution) untuk memberikan rekomendasi smartphone terbaik sesuai dengan preferensi Anda. TOPSIS merupakan metode pengambilan keputusan yang handal dengan mempertimbangkan solusi ideal positif dan solusi ideal negatif.
                    </p>
                </div>

                <!-- TOPSIS Method Section -->
                <div class="bg-secondary/30 backdrop-blur-md rounded-xl p-12 border border-white/10 card-hover" data-aos="fade-up">
                    <div class="flex items-center mb-6">
                        <span class="material-symbols-outlined text-4xl text-blue-500 mr-4">architecture</span>
                        <h2 class="text-2xl font-bold gradient-text">Metode TOPSIS</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <h3 class="text-xl font-semibold text-blue-400">Kelebihan Metode TOPSIS</h3>
                            <ul class="space-y-3 text-gray-300">
                                <li class="flex items-start">
                                    <span class="material-symbols-outlined text-blue-500 mr-2 mt-1">check_circle</span>
                                    <span>Konsep sederhana dan mudah dipahami</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="material-symbols-outlined text-blue-500 mr-2 mt-1">check_circle</span>
                                    <span>Komputasi yang efisien</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="material-symbols-outlined text-blue-500 mr-2 mt-1">check_circle</span>
                                    <span>Mampu mengukur kinerja relatif dari alternatif keputusan</span>
                                </li>
                            </ul>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-xl font-semibold text-blue-400">Tahapan TOPSIS</h3>
                            <div class="space-y-3">
                                <div class="glass-card rounded-lg p-4">
                                    <div class="flex items-center">
                                        <span class="text-blue-500 font-bold mr-2">1</span>
                                        <p class="text-gray-300">Membuat matriks keputusan ternormalisasi</p>
                                    </div>
                                </div>
                                <div class="glass-card rounded-lg p-4">
                                    <div class="flex items-center">
                                        <span class="text-blue-500 font-bold mr-2">2</span>
                                        <p class="text-gray-300">Membuat matriks keputusan terbobot</p>
                                    </div>
                                </div>
                                <div class="glass-card rounded-lg p-4">
                                    <div class="flex items-center">
                                        <span class="text-blue-500 font-bold mr-2">3</span>
                                        <p class="text-gray-300">Menentukan solusi ideal positif dan negatif</p>
                                    </div>
                                </div>
                                <div class="glass-card rounded-lg p-4">
                                    <div class="flex items-center">
                                        <span class="text-blue-500 font-bold mr-2">4</span>
                                        <p class="text-gray-300">Menghitung jarak dengan solusi ideal</p>
                                    </div>
                                </div>
                                <div class="glass-card rounded-lg p-4">
                                    <div class="flex items-center">
                                        <span class="text-blue-500 font-bold mr-2">5</span>
                                        <p class="text-gray-300">Menghitung nilai preferensi setiap alternatif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Criteria Section -->
                <div class="bg-secondary/30 backdrop-blur-md rounded-xl p-12 border border-white/10  card-hover" data-aos="fade-up">
                    <div class="flex items-center mb-6">
                        <span class="material-symbols-outlined text-4xl text-blue-500 mr-4">list</span>
                        <h2 class="text-2xl font-bold gradient-text">Kriteria Penilaian</h2>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="glass-card rounded-lg p-4">
                            <span class="material-symbols-outlined text-blue-500 mb-2">speed</span>
                            <h3 class="font-semibold mb-1 text-white">Performa</h3>
                            <p class="text-sm text-gray-300">Processor, RAM, dan ROM</p>
                        </div>
                        <div class="glass-card rounded-lg p-4">
                            <span class="material-symbols-outlined text-blue-500 mb-2">photo_camera</span>
                            <h3 class="font-semibold mb-1 text-white">Kamera</h3>
                            <p class="text-sm text-gray-300">Resolusi kamera</p>
                        </div>
                        <div class="glass-card rounded-lg p-4">
                            <span class="material-symbols-outlined text-blue-500 mb-2">payments</span>
                            <h3 class="font-semibold mb-1 text-white">Harga</h3>
                            <p class="text-sm text-gray-300">Nilai ekonomis</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="bg-secondary/30 backdrop-blur-md rounded-xl p-12 border border-white/10  card-hover" data-aos="fade-up">
                    <div class="flex items-center mb-6">
                        <span class="material-symbols-outlined text-4xl text-blue-500 mr-4">contact_support</span>
                        <h2 class="text-2xl font-bold gradient-text">Hubungi Kami</h2>
                    </div>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="flex items-center space-x-4">
                            <span class="material-symbols-outlined text-blue-500">mail</span>
                            <p class="text-gray-300">sistemsmartphone@gmail.com</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="material-symbols-outlined text-blue-500">call</span>
                            <p class="text-gray-300">(081) 1234-5678</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="material-symbols-outlined text-blue-500">location_on</span>
                            <p class="text-gray-300">Politeknik Negeri Bali</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center py-8">
            <p class="text-gray-400">&copy; Sistem Pendukung Keputusan Pemilihan Smartphone 2024</p>
        </footer>
    </div>

    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>