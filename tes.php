<?php
$host = "localhost";
$user = "root";
$pass = "PASSWORD_ROOT_DATABASE_ANDA";

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "<h1>Halo AWS! PHP dan MySQL Berhasil Terhubung.</h1>";
?>