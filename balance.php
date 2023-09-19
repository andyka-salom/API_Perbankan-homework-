<?php

require 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        if (empty($_GET)) {
            $user = query("SELECT * FROM user");
            echo json_encode($user);
        }  else {
            $id = $_GET["id"];
            $user = query("SELECT * FROM user WHERE id=" . $id);

            if (empty($user)) { 
                throw new Exception("Data dengan ID $id tidak tersedia.");
            }

            echo json_encode($user);
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
