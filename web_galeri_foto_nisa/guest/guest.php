<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Foto Pesona Kalimantan Utara</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { 
      background: linear-gradient(135deg, #ffdde1, #ee9ca7); 
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    }
    .gallery-container { padding: 20px 0; }
    .gallery-item { 
      margin-bottom: 30px; 
      overflow: hidden; 
      border-radius: 10px; 
      box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
      transition: transform 0.3s ease; 
    }
    .gallery-item:hover { transform: scale(1.03); }
    .gallery-item img { 
      width: 100%; 
      height: 250px; 
      object-fit: cover; 
      transition: opacity 0.3s ease; 
    }
    .gallery-item:hover img { opacity: 0.9; }
    .image-caption { 
      padding: 15px; 
      background-color: white; 
      text-align: center; 
    }
    footer { 
      background-color: #00020e; 
      color: white; 
      padding: 20px 0; 
      margin-top: 40px; 
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Galeri Foto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Menu kiri -->
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="index.html">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="kontak.html">Kontak</a></li>
        </ul>
        <!-- User & Logout di kanan -->
        <ul class="navbar-nav ms-auto">
          <li class="nav-item d-flex align-items-center me-2">
            <span class="text-white">Selamat Datang, <strong><?php echo $_SESSION['username']; ?></strong></span>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="btn btn-outline-light">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Gallery -->
  <div class="container gallery-container">
    <h1 class="text-center">Galeri Pesona Kalimantan Utara</h1>
    <div class="row">
      <!-- Foto 1 -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="gallery-item">
          <img src="https://akcdn.detik.net.id/community/media/visual/2025/02/18/agrowisata-karungan_169.jpeg?w=620" alt=""> 
          <div class="image-caption">
            <h5>Agro Wisata Karungan (Tarakan)</h5>
            <p class="text-muted">Taman rekreasi keluarga seluas 3 hektare dengan hutan kecil, air terjun mini, jembatan gantung, gazebo, dan kolam pemancingan. Berjarak sekitar 14 km dari pusat kota.</p>
         <a href="detail.php?id=1" class="btn btn-primary">Lihat</a>
            <a href="#" class="btn btn-success">Tambah</a>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
      <!-- Foto 2 -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="gallery-item">
          <img src="https://akcdn.detik.net.id/community/media/visual/2025/02/18/mahesya-waterpark_169.jpeg?w=620" alt=""> 
          <div class="image-caption">
            <h5>Mahesya Waterpark (Tana Tidung)</h5>
            <p class="text-muted">Waterpark pertama di Tana Tidung dengan berbagai kolam renang untuk semua usia. Tiket masuk sekitar Rp 20.000, sewa ban Rp 10.000.</p>
            
            <a href="detail.php?id=1" class="btn btn-primary">Lihat</a>
            <a href="#" class="btn btn-success">Tambah</a>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
      <!-- Foto 3 -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="gallery-item">
          <img src="https://zjglidcehtsqqqhbdxyp.supabase.co/storage/v1/object/public/atourin/images/destination/malinau/taman-nasional-kayan-mentarang-profile1641035419.png?x-image-process=image/resize,p_100,limit_1/imageslim" alt=""> 
          <div class="image-caption">
            <h5>Taman Nasional Kayan Mentarang</h5>
            <p class="text-muted">Hutan hujan tropis terluas di Kalimantan dengan keanekaragaman hayati tinggi. Cocok untuk trekking, birdwatching, dan pengalaman budaya di desa adat Dayak.</p>
          <a href="detail.php?id=1" class="btn btn-primary">Lihat</a>
            <a href="#" class="btn btn-success">Tambah</a>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
      <!-- Foto 4 -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="gallery-item">
          <img src="https://indonesiajuara.asia/wp-content/uploads/2024/10/Pantai-Kelapa-Mangkupadi-Wisata-di-Kalimantan-Utara-1024x576.jpg" alt=""> 
          <div class="image-caption">
            <h5>Tanah Kuning (Kabupaten Bulungan)</h5>
            <p class="text-muted">Pantai eksotis di Desa Mangku Padi, air bersih dan pasir putih bersih. Harap berhati-hati karena ombak besar pengunjung hanya bisa berenang di tepian.</p>
        <a href="detail.php?id=1" class="btn btn-primary">Lihat</a>
            <a href="#" class="btn btn-success">Tambah</a>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
      <!-- Foto 5 -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="gallery-item">
          <img src="https://asset-2.tstatic.net/kaltara/foto/bank/images/air-terjun-gunung-rian-di-ktt-02-16072022.jpg" alt=""> 
          <div class="image-caption">
            <h5>Air Terjun Gunung Rian (Tana Tidung)</h5>
            <p class="text-muted">Air terjun setinggi sekitar 90 m dengan aliran jernih di tengah hutan tropis. Terdiri dari tujuh tingkatan, tapi yang sering dikunjungi hanya tingkat pertama dan kedua.</p>
         <a href="detail.php?id=1" class="btn btn-primary">Lihat</a>
            <a href="#" class="btn btn-success">Tambah</a>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
      <!-- Foto 6 -->
      <div class="col-md-4 col-sm-6 col-12">
        <div class="gallery-item">
          <img src="https://www.celebes.co/borneo/wp-content/uploads/2020/07/Gunung-Putih.webp" alt=""> 
          <div class="image-caption">
            <h5>Gunung Putih (Bulungan)</h5>
            <p class="text-muted">Bukit kapur berwarna putih nan memesona, dilengkapi tangga menuju puncak dengan pemandangan Sungai Kayan, cocok untuk trekking ringan atau olahraga.</p>
            
            <a href="detail.php?id=1" class="btn btn-primary">Lihat</a>
            <a href="#" class="btn btn-success">Tambah</a>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container text-center">
      <p>© 2025 Annisa Humaira Azzahra. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
