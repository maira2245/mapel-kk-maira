<?php
session_start();
include '../koneksi.php'; // karena file ini ada di dalam folder admin
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Galeri Pesona Kalimantan Utara</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #f5f5f7;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
}

/* Animasi fade-in */
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(10px); }
    100% { opacity: 1; transform: translateY(0px); }
}

/* Judul utama */
.gallery-title {
    text-align: center;
    margin: 40px 0;
    color: #343a40;
    font-weight: 700;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    animation: fadeIn 1s ease-in-out;
}

/* Tombol Tambah */
.btn-tambah {
    display: block;
    margin: 0 auto 30px;
    padding: 10px 25px;
    font-weight: 600;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

.btn-tambah:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
}

/* Kartu galeri */
.gallery-item {
    border-radius: 15px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    animation: fadeIn 0.8s ease-in-out;
}

.gallery-item:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

.gallery-item img {
    width: 100%;
    height: 230px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-item:hover img {
    transform: scale(1.08);
}

/* Caption */
.image-caption {
    padding: 15px;
    text-align: center;
    background: #ffffff;
}

.image-caption h5 {
    margin: 5px 0;
    font-weight: 600;
    color: #000;
}

.image-caption p {
    color: #6c757d;
    font-size: 14px;
    margin-bottom: 10px;
}

/* Tombol warna */
.btn-warna a,
.btn-warna button {
    margin: 0 3px;
    border: none;
    color: white;
    border-radius: 5px;
    padding: 5px 10px;
    font-size: 13px;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s, transform 0.3s;
}

.lihat {
    background-color: #0d6efd;
}

.lihat:hover {
    background-color: #0056b3;
    transform: scale(1.1);
}

.edit {
    background-color: #f04d4e;
}

.edit:hover {
    background-color: #ec971f;
    transform: scale(1.1);
}

.hapus {
    background-color: #dc3545;
}

.hapus:hover {
    background-color: #b71d1d;
    transform: scale(1.1);
}

/* Footer */
footer {
    background: #343a40;
    color: #fff;
    text-align: center;
    padding: 15px 0;
    margin-top: 60px;
    font-size: 14px;
}

img {
    transition: opacity 0.3s ease-in-out;
}
</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
      </ul>
    </div>
    <span class="navbar-text text-white ms-3">
        <?php
        $data = htmlspecialchars($_SESSION['username'] ?? 'Tamu');
        echo $data;
        ?>
    </span>
    <a href="../logout.php" class="btn btn-outline-light ms-2">Logout</a>
  </div>
</nav>

<!-- KONTEN -->
<div class="container my-4">
  <h1 class="gallery-title">GALERI PESONA KALIMANTAN UTARA</h1>

  <button type="button" class="btn btn-success btn-tambah" data-bs-toggle="modal" data-bs-target="#modalTambah">
    + Tambah Foto
  </button>

  <!-- Tampil Foto -->
  <div class="row justify-content-center">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM foto ORDER BY id_foto DESC");
    if (mysqli_num_rows($result) == 0) {
        echo "<div class='text-center text-muted mt-3'>Belum ada foto yang ditambahkan.</div>";
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id_foto'];
    ?>
      <div class="col-md-4 col-sm-6 mb-4">
        <div class="gallery-item">
          <img src="welcome.php/img/<?php echo htmlspecialchars($row['lokasi_file']); ?>" alt="">
          <div class="image-caption">
            <h5><?php echo htmlspecialchars($row['judul_foto']); ?></h5>
            <p><?php echo htmlspecialchars($row['lokasi_foto']); ?></p>
            <div class="btn-warna">
              <a href="../img/<?php echo htmlspecialchars($row['lokasi_file']); ?>" target="_blank" class="lihat">Lihat</a>
              <button class="edit" data-bs-toggle="modal" data-bs-target="#modalEdit_<?php echo $id; ?>">Edit</button>
              <a href="hapus_foto.php?id=<?php echo $id; ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus foto ini?')">Hapus</a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- MODAL EDIT FOTO -->
      <div class="modal fade" id="modalEdit_<?php echo $id; ?>" tabindex="-1" aria-labelledby="modalEditLabel_<?php echo $id; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action="update_foto.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id_foto" value="<?php echo $id; ?>">
              <div class="modal-header">
                <h5 class="modal-title">Edit Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Judul Foto</label>
                  <input type="text" name="judul_foto" class="form-control" value="<?php echo htmlspecialchars($row['judul_foto']); ?>" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Lokasi Foto</label>
                  <input type="text" name="lokasi_foto" class="form-control" value="<?php echo htmlspecialchars($row['lokasi_foto']); ?>" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Deskripsi Foto</label>
                  <textarea name="deskripsi_foto" class="form-control" rows="4" required><?php echo htmlspecialchars($row['deskripsi_foto']); ?></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Ganti Foto (opsional)</label>
                  <input type="file" name="lokasi_file" class="form-control" accept=".jpg,.jpeg,.png" onchange="previewImage(this, <?php echo $id; ?>)">
                  <input type="checkbox" name="ubah_gambar" value="1"> Centang jika ingin mengubah foto.
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<!-- MODAL TAMBAH FOTO -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="upload_foto.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Tambahkan Foto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Judul Foto</label>
            <input type="text" name="judul_foto" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Lokasi Foto</label>
            <input type="text" name="lokasi_foto" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi Foto</label>
            <textarea name="deskripsi_foto" class="form-control" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Upload Foto</label>
            <input type="file" name="lokasi_file" class="form-control" accept=".jpg,.jpeg,.png" required>
            <small class="text-muted">Ukuran gambar maksimal 10MB (.jpg, .jpeg, .png)</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<footer>
  <p>© 2025 Nana Lestage Siswa. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Preview Foto Baru -->
<script>
function previewImage(input, id) {
    const file = input.files[0];
    const previewOld = document.getElementById('preview_old_' + id);
    const previewNewContainer = document.getElementById('preview_new_container_' + id);
    const previewNew = document.getElementById('preview_new_' + id);

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewNew.src = e.target.result;
            previewNewContainer.style.display = 'block';
            previewOld.style.opacity = '0.3';
        };
        reader.readAsDataURL(file);
    } else {
        previewNewContainer.style.display = 'none';
        previewOld.style.opacity = '1';
    }
}
</script>
</body>
</html>
