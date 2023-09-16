<?php
$host = 'localhost'; // Ganti dengan host Anda
$username = 'root'; // Ganti dengan username Anda
$password = ''; // Ganti dengan password Anda
$database = 'db_backend';

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
