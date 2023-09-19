<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h1 {
    color: #333;
}

.result {
    font-size: 24px;
    margin-top: 20px;
}

.error {
    color: red;
    font-size: 18px;
    margin-top: 20px;
}

        </style>

</head>
<body>
    
<?php
// Include file konfigurasi database
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil ID akun dari parameter URL
    $account_id = $_GET['account_id'];

    // Query untuk mengambil transaksi terakhir berdasarkan ID akun
    $query = "SELECT * FROM transactions WHERE akun_id = $account_id ORDER BY tanggal DESC LIMIT 10";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $transactions = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $transactions[] = $row;
        }

        // Format response dalam format JSON
        echo json_encode($transactions);
    } else {
        // Handle kesalahan jika query gagal
        echo json_encode(array('error' => 'Gagal mengambil transaksi'));
    }
}
?>
</body>
</html>