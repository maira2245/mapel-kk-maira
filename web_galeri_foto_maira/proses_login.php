<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']); // contoh, lebih aman pakai password_hash()

$query  = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

if ($row) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['level']    = $row['level'];

    if ($row['level'] == 'admin') {
        header("Location: admin_dashboard.php");
    } elseif ($row['level'] == 'operator') {
        header("Location: operator_dashboard.php");
    } else {
        header("Location: guest_dashboard.php");
    }
} else {
    echo "Login gagal. <a href='index.php'>Coba lagi</a>";
}
?>
