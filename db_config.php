<?php
// Konfigurasi koneksi database
$host = "localhost"; // Ganti dengan nama host database Anda
$user = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "perbankan"; // Ganti dengan nama database Anda

// Buat koneksi ke database
$connection = mysqli_connect($host, $user, $password, $database);

// Periksa koneksi
if (!$connection) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Atur karakter set utf8 untuk koneksi
mysqli_set_charset($connection, "utf8");
?>
