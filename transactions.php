<?php

require 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        
            $id = $_GET["id"];
            $user = query("SELECT * FROM transaksi WHERE from_account=" . $id);

            if (empty($user)) { 
                throw new Exception("Data dengan ID $id tidak tersedia.");
            }
            echo json_encode($user);

    } catch (Exception $e) {
        $response = [
            'error' => true,
            'message' => $e->getMessage()
        ];
        echo json_encode($response);
    }
}

?>
