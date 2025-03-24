<?php
session_start();
include('koneksi.php');

if (isset($_POST["tambah_hp"])) {
  $nama      = $_POST["nama"];
  $harga     = $_POST["harga"];
  $ram       = $_POST["ram"];
  $memori    = $_POST["memori"];
  $processor = $_POST["processor"];
  $kamera    = $_POST["kamera"];

  $harga_angka = $ram_angka = $memori_angka = $processor_angka = $kamera_angka = 0;

  if ($harga < 1000000) {
    $harga_angka = 7;
  } elseif ($harga >= 1000000 && $harga <= 2000000) {
    $harga_angka = 6;
  } elseif ($harga > 2000000 && $harga <= 3000000) {
    $harga_angka = 5;
  } elseif ($harga > 3000000 && $harga <= 4000000) {
    $harga_angka = 4;
  } elseif ($harga > 4000000 && $harga <= 5000000) {
    $harga_angka = 3;
  } elseif ($harga > 5000000 && $harga <= 10000000) {
    $harga_angka = 2;
  } elseif ($harga > 10000000 && $harga <= 35000000) {
    $harga_angka = 1;
  }

  // Konversi RAM
  if ($ram <= 2) {
    $ram_angka = 1;
  } elseif ($ram <= 4) {
    $ram_angka = 2;
  } elseif ($ram <= 6) {
    $ram_angka = 3;
  } elseif ($ram <= 8) {
    $ram_angka = 4;
  } elseif ($ram <= 12) {
    $ram_angka = 5;
  } elseif ($ram <= 16) {
    $ram_angka = 6;
  } else {
    $ram_angka = 7;
  }

  // Konversi Memori
  if ($memori <= 32) {
    $memori_angka = 1;
  } elseif ($memori <= 64) {
    $memori_angka = 2;
  } elseif ($memori <= 128) {
    $memori_angka = 3;
  } elseif ($memori <= 256) {
    $memori_angka = 4;
  } elseif ($memori <= 512) {
    $memori_angka = 5;
  } else {
    $memori_angka = 6;
  }

  // Konversi Processor
  if ($processor == "Dualcore") {
    $processor_angka = 1;
  } elseif ($processor == "Quadcore") {
    $processor_angka = 2;
  } elseif ($processor == "Octacore") {
    $processor_angka = 3;
  } elseif ($processor == "Hexacore") {
    $processor_angka = 4;
  }

  // Konversi Kamera
  if ($kamera <= 12) {
    $kamera_angka = 1;
  } elseif ($kamera <= 32) {
    $kamera_angka = 2;
  } elseif ($kamera <= 48) {
    $kamera_angka = 3;
  } elseif ($kamera <= 64) {
    $kamera_angka = 4;
  } elseif ($kamera <= 108) {
    $kamera_angka = 5;
  } elseif ($kamera <= 200) {
    $kamera_angka = 6;
  } else {
    $kamera_angka = 6;
  }
  // $sql = "INSERT INTO `data_hp` (
  //   `id_hp`, `nama_hp`, `harga_hp`, `ram_hp`, `memori_hp`, 
  //   `processor_hp`, `kamera_hp`,
  //   `harga_angka`, `ram_angka`, `memori_angka`, `processor_angka`, `kamera_angka`
  // ) VALUES (
  //   NULL, :nama_hp, :harga_hp, :ram_hp, :memori_hp,
  //   :processor_hp, :kamera_hp
  //   :harga_angka, :ram_angka, :memori_angka, :processor_angka, :kamera_angka
  // )";
  // $stmt = $db->prepare($sql);
  // $stmt->bindValue(':nama_hp', $nama);
  // $stmt->bindValue(':harga_hp', $harga);
  // $stmt->bindValue(':ram_hp', $ram);
  // $stmt->bindValue(':memori_hp', $memori);
  // $stmt->bindValue(':processor_hp', $processor);
  // $stmt->bindValue(':kamera_hp', $kamera);
  // $stmt->bindValue(':harga_angka', $harga_angka);
  // $stmt->bindValue(':ram_angka', $ram_angka);
  // $stmt->bindValue(':memori_angka', $memori_angka);
  // $stmt->bindValue(':processor_angka', $processor_angka);
  // $stmt->bindValue(':kamera_angka', $kamera_angka);
  // $stmt->execute();
}

// if (isset($_POST["hapus_hp"])) {
//   $id_hapus_hp = $_POST['id_hapus_hp'];
//   $sql_delete = "DELETE FROM data_hp WHERE id_hp = :id_hapus_hp";
//   $stmt_delete = $db->prepare($sql_delete);
//   $stmt_delete->execute([':id_hapus_hp' => $id_hapus_hp]);
// }
?>
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

    .glass-card {
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }

    .table-container {
      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.8s ease forwards;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    tr {
      transition: all 0.3s ease;
    }

    tr:hover {
      transform: translateX(10px);
    }

    .form-input {
      background: rgba(255, 255, 255, 0.1);
      @apply rounded-lg text-white focus:ring-2 focus:ring-blue-500 focus:outline-none;
    }

    .form-input::placeholder {
      @apply text-gray-400;
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
          <a href="daftar_hp.php" class="text-white border-b-2 border-blue-500">DAFTAR HP</a>
          <a href="tentang.php" class="text-gray-400 hover:text-white transition duration-300">TENTANG</a>
        </div>
      </div>
    </nav>

    <div class="container mx-auto px-4 pt-24">
      <!-- Title Section -->
      <div class="text-center mb-8" data-aos="fade-down">
        <h1 class="text-4xl font-bold text-white mb-4">Daftar Smartphone</h1>
        <p class="text-gray-300">Informasi lengkap smartphone yang tersedia</p>
      </div>

      <!-- Table Section -->
      <div class="glass-card rounded-xl p-8 mb-12" data-aos="fade-up" data-aos-delay="200">
        <div class="overflow-x-auto">
          <table class="w-full rounded-lg overflow-hidden">
            <thead class="bg-navy-light/50">
              <tr>
                <th class="p-3 text-left text-white">No</th>
                <th class="p-3 text-left text-white">Nama HP</th>
                <th class="p-3 text-left text-white">Harga HP</th>
                <th class="p-3 text-left text-white">RAM HP</th>
                <th class="p-3 text-left text-white">ROM HP</th>
                <th class="p-3 text-left text-white">Processor HP</th>
                <th class="p-3 text-left text-white">Kamera HP</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = $db->query("SELECT * FROM data_hp");
              $no = 1;
              while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <tr class="border-b border-white/10 hover:bg-navy-light/30 transition duration-200">
                  <td class="p-3"><?php echo $no; ?></td>
                  <td class="p-3"><?php echo $data['nama_hp']; ?></td>
                  <td class="p-3">Rp. <?php echo number_format($data['harga_hp'], 0, ',', '.'); ?></td>
                  <td class="p-3"><?php echo $data['ram_hp']; ?> GB</td>
                  <td class="p-3"><?php echo $data['memori_hp']; ?> GB</td>
                  <td class="p-3"><?php echo $data['processor_hp']; ?></td>
                  <td class="p-3"><?php echo $data['kamera_hp']; ?> MP</td>
                </tr>
              <?php $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>


      <!-- Footer -->
      <footer class="py-4">
        <div class="container mx-auto text-center text-gray-400">
          <p>&copy; Sistem Pendukung Keputusan Pemilihan Smartphone 2024.</p>
        </div>
      </footer>
    </div>
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