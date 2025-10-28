<?php
session_start();
include './koneksi.php';

if (isset($_POST['update'])) {
  $id_foto = intval($_POST['id_foto']);
  $judul_foto = mysqli_real_escape_string($conn, $_POST['judul_foto']);
  $lokasi_foto = mysqli_real_escape_string($conn, $_POST['lokasi_foto']);
  $deskripsi_foto = mysqli_real_escape_string($conn, $_POST['deskripsi_foto']);
  $tanggal_update = date("Y-m-d");

  // Ambil data lama dari database
  $query_lama = mysqli_query($conn, "SELECT lokasi_file FROM foto WHERE id_foto = $id_foto");
  $data_lama = mysqli_fetch_assoc($query_lama);
  $nama_lama = $data_lama['lokasi_file'];

  // Jika user mengupload foto baru
  if (!empty($_FILES['lokasi_file']['name'])) {
    $nama_file = $_FILES['lokasi_file']['name'];
    $tmp_file = $_FILES['lokasi_file']['tmp_name'];
    $ukuran = $_FILES['lokasi_file']['size'];
    $error = $_FILES['lokasi_file']['error'];
    $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

    // Validasi format file
    $allowed_ext = ['jpg', 'jpeg', 'png'];
    $max_size = 10 * 1024 * 1024; // 10 MB

    if (!in_array($ext, $allowed_ext)) {
      echo "<script>alert('Format file tidak didukung! Gunakan JPG, JPEG, atau PNG.'); history.back();</script>";
      exit;
    }

    if ($ukuran > $max_size) {
      echo "<script>alert('Ukuran file terlalu besar! Maksimal 10MB.'); history.back();</script>";
      exit;
    }

    if ($error != 0) {
      echo "<script>alert('Terjadi kesalahan saat upload (error code: $error).'); history.back();</script>";
      exit;
    }

    // Buat nama file unik baru
    $nama_baru = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $nama_file);
    $path_baru = './img/' . $nama_baru;

    // Pindahkan file baru ke folder img
    if (move_uploaded_file($tmp_file, $path_baru)) {
      // Hapus file lama jika ada
      if (file_exists('./img/' . $nama_lama)) {
        unlink('./img/' . $nama_lama);
      }

      // Update data dengan file baru
      $update = mysqli_query($conn, "UPDATE foto SET 
        judul_foto = '$judul_foto',
        deskripsi_foto = '$deskripsi_foto',
        lokasi_foto = '$lokasi_foto',
        lokasi_file = '$nama_baru',
        tanggal_upload = '$tanggal_update'
        WHERE id_foto = '$id_foto'");

      if ($update) {
        echo "<script>alert('Data berhasil diperbarui dengan foto baru!'); window.location='./admin/d-admin.php';</script>";
      } else {
        echo "<script>alert('Gagal memperbarui data di database.'); history.back();</script>";
      }
    } else {
      echo "<script>alert('Gagal mengunggah file baru!'); history.back();</script>";
    }
  } else {
    // Jika tidak mengupload foto baru, hanya update data teks
    $update = mysqli_query($conn, "UPDATE foto SET 
      judul_foto = '$judul_foto',
      deskripsi_foto = '$deskripsi_foto',
      lokasi_foto = '$lokasi_foto',
      tanggal_upload = '$tanggal_update'
      WHERE id_foto = '$id_foto'");

    if ($update) {
      echo "<script>alert('Data berhasil diperbarui tanpa mengganti foto.'); window.location='./admin/d-admin.php';</script>";
    } else {
      echo "<script>alert('Gagal memperbarui data.'); history.back();</script>";
    }
  }
} else {
  echo "<script>window.location='./admin/d-admin.php';</script>";
}
?>
