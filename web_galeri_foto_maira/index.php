<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Foto Pesona Kalimantan Utara</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* ===== Global Body Style (gabungan) ===== */
    body {
      background: linear-gradient(135deg, #ffdde1, #ee9ca7);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* ===== Login Container Style (gabungan) ===== */
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 25px;
      background: #fff0f5;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(255, 105, 180, 0.3);
      position: relative;
      overflow: hidden;
    }

    /* Pita di atas login box */
    .login-container::before {
      content: "";
      position: absolute;
      top: -20px;
      left: -40px;
      width: 150%;
      height: 60px;
      background: linear-gradient(135deg, #ff69b4, #ff85c1);
      transform: rotate(-3deg);
      box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }

    .login-container h2 {
      color: #d63384;
      font-weight: 700;
      text-align: center;
      margin-bottom: 20px;
      position: relative;
      z-index: 1;
    }

    .form-label {
      color: #b52e6e;
      font-weight: 600;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #f5a6c6;
    }

    .form-control:focus {
      border-color: #ff69b4;
      box-shadow: 0 0 8px rgba(255, 105, 180, 0.4);
    }

    .btn-login {
      background: linear-gradient(135deg, #ff69b4, #ff85c1);
      border: none;
      border-radius: 12px;
      padding: 12px;
      font-weight: 600;
      color: white;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(255, 105, 180, 0.4);
    }

    /* ===== Dashboard Style (tidak diubah) ===== */
    .dashboard-container {
      padding: 20px;
    }
    .navbar-brand {
      font-weight: 700;
    }
    .gallery-container {
      padding: 20px 0;
    }
    .gallery-title {
      text-align: center;
      margin: 30px 0;
      color: #343a40;
    }
    .gallery-item {
      margin-bottom: 30px;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .gallery-item:hover {
      transform: scale(1.03);
    }
    .gallery-item img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: opacity 0.3s ease;
    }
    .gallery-item:hover img {
      opacity: 0.9;
    }
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
  <!-- Login Form -->
  <div class="login-container" id="loginPage">
    <h2>Login</h2>
    <form id="loginForm">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" required>
      </div>
      <button type="submit" class="btn-login w-100">Login</button>
    </form>
  </div>

  <!-- Dashboard Content (hidden initially) -->
  <div id="dashboardPage" style="display:none;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Galeri Foto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="index.html">Tentang</a></li>
            <li class="nav-item"><a class="nav-link" href="kontak.html">Kontak</a></li>
            <li class="nav-item ms-2"><button class="btn btn-outline-light" id="logoutBtn">Logout</button></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Gallery Content -->
    <div class="container gallery-container">
      <h1 class="gallery-title">Galeri Pesona Kalimantan Utara</h1>
      <div class="row">
        <!-- Foto 1 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="agrowisata karongan.jpeg" alt=""> 
            <div class="image-caption">
              <h5>Agro Wisata Karungan (Tarakan)</h5>
              <p class="text-muted">Taman rekreasi keluarga seluas 3 hektare dengan hutan kecil, air terjun mini, jembatan gantung, gazebo, dan kolam pemancingan. Berjarak sekitar 14 km dari pusat kota.</p>
           <button class="btn btn-primary btn-action">Lihat</button>
              <button class="btn btn-success btn-action">Tambah</button>
              <button class="btn btn-warning btn-action">Edit</button>
              <button class="btn btn-danger btn-action">Hapus</button>
            </div>
          </div>
        </div>
        <!-- Foto 2 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="mahesya waterpark.jpg" alt=""> 
            <div class="image-caption">
              <h5>Mahesya Waterpark (Tana Tidung)</h5>
              <p class="text-muted">Waterpark pertama di Tana Tidung dengan berbagai kolam renang untuk semua usia. Tiket masuk sekitar Rp 20.000, sewa ban Rp 10.000.</p>
           <button class="btn btn-primary btn-action">Lihat</button>
              <button class="btn btn-success btn-action">Tambah</button>
              <button class="btn btn-warning btn-action">Edit</button>
              <button class="btn btn-danger btn-action">Hapus</button>
            </div>
          </div>
        </div>
        <!-- Foto 3 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="taman nasional kayan perbatasan.jpg" alt=""> 
            <div class="image-caption">
              <h5>Taman Nasional Kayan Mentarang (Perbatasan Kaltara-Malaysia)</h5>
              <p class="text-muted">Hutan hujan tropis terluas di Kalimantan dengan keanekaragaman hayati tinggi. Cocok untuk trekking, birdwatching, dan pengalaman budaya di desa adat Dayak.</p>
          <button class="btn btn-primary btn-action">Lihat</button>
              <button class="btn btn-success btn-action">Tambah</button>
              <button class="btn btn-warning btn-action">Edit</button>
              <button class="btn btn-danger btn-action">Hapus</button>
            </div>
          </div>
        </div>
        <!-- Foto 4 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="mangkupadi.jpg" alt=""> 
            <div class="image-caption">
              <h5>Tanah Kuning (Kabupaten Bulungan, Tanjung Palas Timur)</h5>
              <p class="text-muted">Pantai eksotis di Desa mangku padi, air bersih dan pasir putih bersih. Harap berhati-hati karena ombak besar pengunjung hanya bisa berenang di tepian.</p>
           <button class="btn btn-primary btn-action">Lihat</button>
              <button class="btn btn-success btn-action">Tambah</button>
              <button class="btn btn-warning btn-action">Edit</button>
              <button class="btn btn-danger btn-action">Hapus</button>
            </div>
          </div>
        </div>
        <!-- Foto 5 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="air terjun gunung rian.jpg" alt=""> 
            <div class="image-caption">
              <h5>Air Terjun Gunung Rian (Kecamatan Sesayap, Tana Tidung)</h5>
              <p class="text-muted">Air terjun setinggi sekitar 90 m dengan aliran jernih di tengah hutan tropis. Terdiri dari tujuh tingkatan, tapi yang sering dikunjungi hanya tingkat pertama dan kedua.</p>
          <button class="btn btn-primary btn-action">Lihat</button>
              <button class="btn btn-success btn-action">Tambah</button>
              <button class="btn btn-warning btn-action">Edit</button>
              <button class="btn btn-danger btn-action">Hapus</button>
            </div>
          </div>
        </div>
        <!-- Foto 6 -->
        <div class="col-md-4 col-sm-6 col-12">
          <div class="gallery-item">
            <img src="gunung putih.jpg" alt=""> 
            <div class="image-caption">
              <h5>Gunung Putih (Desa Gunung Putih, Bulungan)</h5>
              <p class="text-muted">Bukit kapur berwarna putih nan memesona, dilengkapi tangga menuju puncak dengan pemandangan Sungai Kayan, cocok untuk trekking ringan atau olahraga.</p>
            <button class="btn btn-primary btn-action">Lihat</button>
              <button class="btn btn-success btn-action">Tambah</button>
              <button class="btn btn-warning btn-action">Edit</button>
              <button class="btn btn-danger btn-action">Hapus</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <p>© 2025 Annisa humaira azzahra. All Rights Reserved.</p>
      </div>
    </footer>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;

      // Simple auth check
      if (username === 'admin' && password === 'admin123') {
        document.getElementById('loginPage').style.display = 'none';
        document.getElementById('dashboardPage').style.display = 'block';
      } else {
        alert('Username/password salah!');
      }
    });

    document.getElementById('logoutBtn').addEventListener('click', function() {
      if (confirm('Apakah Anda yakin ingin logout?')) {
        document.getElementById('dashboardPage').style.display = 'none';
        document.getElementById('loginPage').style.display = 'block';
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
      }
    });
  </script>
</body>
</html>
