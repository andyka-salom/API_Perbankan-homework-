<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

<?php
// Include file konfigurasi database
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil ID akun dari parameter URL
    $account_id = $_GET['account_id'];

    // Query untuk mengambil saldo berdasarkan ID akun
    $query = "SELECT saldo FROM accounts WHERE id = $account_id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $saldo = $row['saldo'];

        // Format response dalam format JSON
        $response = array('saldo' => $saldo);
        echo json_encode($response);
    } else {
        // Handle kesalahan jika query gagal
        echo json_encode(array('error' => 'Gagal mengambil saldo'));
    }
}
?>
</body>
</html>