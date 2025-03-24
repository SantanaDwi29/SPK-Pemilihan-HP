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
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
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
                        <span class="text-white border-b-2 border-blue-500 material-symbols-outlined">home</span>
                    </a>
                    <a href="rekomendasi.php" class="text-gray-400 hover:text-white transition duration-300">REKOMENDASI</a>
                    <a href="daftar_hp.php" class="text-gray-400 hover:text-white transition duration-300">DAFTAR HP</a>
                    <a href="tentang.php" class="text-gray-400 hover:text-white transition duration-300">TENTANG</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section with Animation -->
        <div class="container mx-auto px-6 pt-32 pb-16 text-center" data-aos="fade-up">
            <h1 class="text-6xl font-bold mb-6 text-white">Temukan Smartphone Terbaik Anda</h1>
            <p class="text-xl text-gray-300 mb-8">Gunakan sistem cerdas kami untuk menemukan smartphone sesuai kebutuhan</p>
            <a href="rekomendasi.php"
                class="inline-block bg-blue-600 text-white font-bold py-4 px-8 rounded-lg hover:bg-blue-700 transition-all">
                Mulai Rekomendasi
            </a>
        </div>

        <!-- Feature Cards -->
        <div class="grid md:grid-cols-3 gap-8 max-w-7xl mx-auto px-8 mb-20" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                <div class="w-20 h-20 bg-blue-500/20 rounded-full flex items-center justify-center mx-auto mb-8">
                    <span class="material-symbols-outlined text-4xl text-blue-400">check_circle</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Akurat</h3>
                <p class="text-gray-300 text-lg">Menggunakan metode TOPSIS untuk hasil rekomendasi yang presisi dan terpercaya</p>
            </div>
            <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-8">
                    <span class="material-symbols-outlined text-4xl text-green-400">speed</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Cepat</h3>
                <p class="text-gray-300 text-lg">Dapatkan rekomendasi smartphone dalam hitungan detik</p>
            </div>
            <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                <div class="w-20 h-20 bg-purple-500/20 rounded-full flex items-center justify-center mx-auto mb-8">
                    <span class="material-symbols-outlined text-4xl text-purple-400">tune</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Fleksibel</h3>
                <p class="text-gray-300 text-lg">Sesuaikan kriteria sesuai kebutuhan dan preferensi Anda</p>
            </div>
        </div>

        <!-- How It Works Section -->
        <div class="container mx-auto px-8 py-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-center mb-16 text-white">Cara Kerja</h2>
            <div class="grid md:grid-cols-4 gap-8 max-w-5xl mx-auto">
                <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                    <div class="w-16 h-16 bg-blue-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-symbols-outlined text-3xl text-blue-400">touch_app</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Pilih Kriteria</h3>
                    <p class="text-gray-300">Tentukan prioritas fitur smartphone yang Anda inginkan</p>
                </div>
                <div class="gbg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                    <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-symbols-outlined text-3xl text-green-400">settings</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Proses TOPSIS</h3>
                    <p class="text-gray-300">Sistem menganalisis data menggunakan metode TOPSIS</p>
                </div>
                <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                    <div class="w-16 h-16 bg-purple-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-symbols-outlined text-3xl text-purple-400">phone_iphone</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Lihat Hasil</h3>
                    <p class="text-gray-300">Dapatkan rekomendasi smartphone terbaik</p>
                </div>
                <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                    <div class="w-16 h-16 bg-pink-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-symbols-outlined text-3xl text-pink-400">compare</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Bandingkan</h3>
                    <p class="text-gray-300">Bandingkan spesifikasi dan harga smartphone</p>
                </div>
            </div>
        </div>

        <!-- Why Choose Us Section -->
        <div class="container mx-auto px-8 py-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-center mb-16 text-white">Mengapa Memilih Kami</h2>
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-full flex items-center justify-center mr-4">
                            <span class="material-symbols-outlined text-blue-400">database</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Database Lengkap</h3>
                            <p class="text-gray-300">Informasi smartphone terkini dengan spesifikasi lengkap</p>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center mr-4">
                            <span class="material-symbols-outlined text-green-400">update</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Update Rutin</h3>
                            <p class="text-gray-300">Data smartphone selalu diperbarui secara berkala</p>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-full flex items-center justify-center mr-4">
                            <span class="material-symbols-outlined text-purple-400">verified</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Data Terverifikasi</h3>
                            <p class="text-gray-300">Informasi akurat dari sumber terpercaya</p>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary/30 backdrop-blur max-w-4xl mx-auto p-12  border border-white/10 rounded-xl feature-card card-hover">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-pink-500/20 rounded-full flex items-center justify-center mr-4">
                            <span class="material-symbols-outlined text-pink-400">support_agent</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Dukungan Pengguna</h3>
                            <p class="text-gray-300">Bantuan teknis untuk setiap pertanyaan Anda</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto px-8 py-16 text-center" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-12 text-white">Statistik Kami</h2>
                <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="bg-secondary/30 backdrop-blur p-8 border border-white/10 rounded-xl  feature-card card-hover">
                        <h3 class="text-4xl font-bold text-blue-400 mb-4">50+</h3>
                        <p class="text-gray-300">Smartphone dalam Database</p>
                    </div>
                    <div class="bg-secondary/30 backdrop-blur p-8 border border-white/10 rounded-xl feature-card card-hover">
                        <h3 class="text-4xl font-bold text-green-400 mb-4">5000+</h3>
                        <p class="text-gray-300">Rekomendasi Telah Dibuat</p>
                    </div>
                    <div class="bg-secondary/30 backdrop-blur p-8 border border-white/10 rounded-xl feature-card card-hover">
                        <h3 class="text-4xl font-bold text-purple-400 mb-4">98%</h3>
                        <p class="text-gray-300">Kepuasan Pengguna</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action -->
        <div class="container mx-auto px-4 py-10 text-center" data-aos="fade-up">
            <div class="bg-secondary/30 backdrop-blur inline-block p-10 border border-white/10 rounded-xl card-hover">
                <h2 class="text-3xl font-bold mb-4 text-white">Siap Menemukan Smartphone Impian Anda?</h2>
                <p class="text-xl text-gray-300 mb-6">Gunakan sistem rekomendasi kami sekarang dan temukan smartphone yang sesuai dengan kebutuhan Anda</p>
                <a href="rekomendasi.php"
                    class="inline-block bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition-all">
                    Mulai Sekarang
                </a>
            </div>
        </div>
        <!-- Testimonial Section -->
        <div class="container mx-auto px-8 py-16">
            <h2 class="text-4xl font-bold text-center mb-16 text-white" data-aos="fade-up">Apa Kata Mereka?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                <div class="bg-secondary/30 backdrop-blur p-8 border border-white/10 rounded-xl transition-all duration-300 card-hover"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    <p class="text-gray-300 italic mb-4">"Sistem rekomendasi yang luar biasa! Saya menemukan smartphone sempurna dalam hitungan menit."</p>
                    <div class="flex items-center space-x-4">
                        <img src="img/profil/fotoprofil1.jpg" alt="Asvin Andhika" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-semibold">Asvin Andhika</h4>
                            <p class="text-gray-400 text-sm">Developer</p>
                        </div>
                    </div>
                </div>

                <div class="bg-secondary/30 backdrop-blur p-8 border border-white/10 rounded-xl transition-all duration-300 card-hover"
                    data-aos="fade-up"
                    data-aos-delay="100">
                    <p class="text-gray-300 italic mb-4">"Metode TOPSIS benar-benar membantu saya membandingkan berbagai smartphone dengan objektif."</p>
                    <div class="flex items-center space-x-4">
                        <img src="img/profil/photoprofil2.jpg" alt="Santana" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-semibold">Santana</h4>
                            <p class="text-gray-400 text-sm">Frontend Developer</p>
                        </div>
                    </div>
                </div>

                <div class="bg-secondary/30 backdrop-blur p-8 border border-white/10 rounded-xl transition-all duration-300 card-hover"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <p class="text-gray-300 italic mb-4">"Interface yang user-friendly dan hasil rekomendasi yang sangat membantu dalam memilih smartphone sesuai kebutuhan."</p>
                    <div class="flex items-center space-x-4">
                        <img src="img/profil/photoprofil3.jpg" alt="Agung Aris" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-semibold">Agung Aris</h4>
                            <p class="text-gray-400 text-sm">Professional</p>
                        </div>
                    </div>
                </div>

                <div class="bg-secondary/30 backdrop-blur p-8 border border-white/10 rounded-xl transition-all duration-300 card-hover"
                    data-aos="fade-up"
                    data-aos-delay="200">
                    <p class="text-gray-300 italic mb-4">"Sangat terbantu dengan adanya sistem ini, fitur perbandingan spesifikasi memudahkan saya dalam mengambil keputusan."</p>
                    <div class="flex items-center space-x-4">
                        <img src="img/profil/photoprofil4.jpg" alt="Riski" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-semibold">Riski</h4>
                            <p class="text-gray-400 text-sm">Software Engineer</p>
                        </div>
                    </div>
                </div>

                <div class="bg-secondary/30 backdrop-blur p-8 border border-white/10 rounded-xl transition-all duration-300 card-hover md:col-span-2 max-w-xl mx-auto"
                    data-aos="fade-up"
                    data-aos-delay="300">
                    <p class="text-gray-300 italic mb-4">"Rekomendasi yang diberikan sangat akurat dan sesuai dengan budget yang saya miliki. Website ini sangat membantu!"</p>
                    <div class="flex items-center space-x-4">
                        <img src="img/profil/photoprofil5.jpg" alt="Andhika" class="w-12 h-12 rounded-full object-cover">
                        <div>
                            <h4 class="font-semibold">Andhika</h4>
                            <p class="text-gray-400 text-sm">Content Creator</p>
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
            once: true,
            mirror: false
        });
    </script>
</body>

</html>