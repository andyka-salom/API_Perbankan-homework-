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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require 'db_config.php'; // Include file konfigurasi database

        $fromAccountId = $_POST['sender_account_id'];
        $toAccountId = $_POST['receiver_account_id'];
        $amount = $_POST['amount'];

        // Cek apakah saldo mencukupi
        $query = "SELECT saldo FROM accounts WHERE id = $fromAccountId";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $fromAccountBalance = mysqli_fetch_assoc($result)['saldo'];

            if ($fromAccountBalance >= $amount) {
                // Mulai transaksi
                mysqli_autocommit($connection, false);

                // Kurangi saldo dari akun pengirim
                $debit_query = "UPDATE accounts SET saldo = saldo - $amount WHERE id = $fromAccountId";

                // Tambah saldo ke akun penerima
                $credit_query = "UPDATE accounts SET saldo = saldo + $amount WHERE id = $toAccountId";

                // Insert transaksi
                $transaction_query = "INSERT INTO transactions (akun_id, jenis_transaksi, jumlah) VALUES ($fromAccountId, 'debit', $amount),
                                      ($toAccountId, 'kredit', $amount)";

                if (mysqli_query($connection, $debit_query) && mysqli_query($connection, $credit_query) && mysqli_query($connection, $transaction_query)) {
                    mysqli_commit($connection);
                    echo '<div class="result-title">Transfer Successful</div>';
                    echo '<div class="result-text">Amount: ' . $amount . '</div>';
                    echo '<div class="result-text">From Account: ' . $fromAccountId . '</div>';
                    echo '<div class="result-text">To Account: ' . $toAccountId . '</div>';
                } else {
                    mysqli_rollback($connection);
                    http_response_code(400);
                    echo '<div class="result-title">Transfer Failed</div>';
                    echo '<div class="result-text">Error: There was an issue with the transaction</div>';
                }

                mysqli_close($connection);
            } else {
                http_response_code(400);
                echo '<div class="result-title">Transfer Failed</div>';
                echo '<div class="result-text">Error: Insufficient balance</div>';
            }
        } else {
            http_response_code(400);
            echo '<div class="result-title">Transfer Failed</div>';
            echo '<div class="result-text">Error: Sender account not found</div>';
        }
    }
    ?>
    </body>
    </html>