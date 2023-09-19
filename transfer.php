<?php

require "function.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        
        $id_pengirim = json_encode($_POST['from_account']);  
        $id_penerima = json_encode($_POST['to_account']);
        $jumlah_transfer = json_encode($_POST['saldo']);

        // Ambil saldo pengirim
        $user_pengirim = query("SELECT saldo FROM user WHERE id = " . $id_pengirim);

        // Validasi apakah user ditemukan
        if (count($user_pengirim) < 1) {
            throw new Exception("Akun pengirim dengan ID $id_pengirim tidak ditemukan.");
        }

         // Saldo pengirim
         $saldo_pengirim = $user_pengirim[0]['saldo'];

        // Ambil saldo penerima
        $user_penerima = query("SELECT saldo FROM user WHERE id = " . $id_penerima);

        // Validasi apakah user ditemukan
        if (count($user_penerima) < 1) {
            throw new Exception("Akun penerima dengan ID $id_penerima tidak ditemukan.");
        }

        // Lakukan pembaruan saldo pengirim dan penerima
        $query_pengirim ="UPDATE user SET saldo = saldo - $jumlah_transfer WHERE id = $id_pengirim";
        $query_penerima = "UPDATE user SET saldo = saldo + $jumlah_transfer WHERE id = " . $id_penerima;
        $query_tambah = "INSERT INTO transaksi (from_account, to_account, saldo, timestamp) VALUES ($id_pengirim, $id_penerima, $jumlah_transfer, NOW())";

        // Jalankan query pembaruan saldo
        $transaksi = query($query_pengirim);
        $transaksi_penerima = query($query_penerima);
        $transaksi_tambah = query($query_tambah);

        if ($transaksi && $transaksi_penerima && $transaksi_tambah ) {
            echo json_encode(["success" => true, "message" => "Transfer berhasil."]);
        } else {
            echo json_encode(["error" => true, "message" => "Gagal melakukan transfer."]);
        }

    } catch (Exception $e) {
        $response = [
            'error' => true,
            'message' => $e->getMessage()
        ];
        echo json_encode($response);
    }
}
?>
