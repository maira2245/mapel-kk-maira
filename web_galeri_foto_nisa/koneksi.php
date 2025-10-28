<?php 
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "web_galeri_foto_maira"; 
$conn = new mysqli($host, $username, $password, $database); 
if ($conn->connect_error) { 
 die("Koneksi gagal: " . $conn->connect_error); 
} 
?>