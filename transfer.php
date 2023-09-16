<!DOCTYPE html>
<html lang="en">

<link href="../css/transfer.css" rel="stylesheet" type="text/css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM - Transfer Money</title>
   
</head>
<body>
    <div class="container">
        <h1>ATM - Transfer Money</h1>
        <div class="form-container">
            <form action="api/transfer.php" method="POST">
                <!-- <label for="from-account">From Account ID:</label>
                <input type="text" id="from-account" name="from_account" placeholder="From Account ID">
                <label for="to-account">To Account ID:</label>
                <input type="text" id="to-account" name="to_account" placeholder="To Account ID">
                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" placeholder="Amount">
                <input type="submit" value="Transfer Money"> -->
                <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tombol Kembali</title>
</head>
<body>
    <a href="../index.php" class="kembali-button">Kembali</a>
</body>
</html>
            </form>
        </div>

        <?php
        include('../config.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fromAccountId = $_POST['from_account'];
            $toAccountId = $_POST['to_account'];
            $amount = $_POST['amount'];

            // Cek apakah saldo mencukupi
            $fromAccountBalance = $conn->query("SELECT balance FROM tbl_accounts WHERE id = $fromAccountId")->fetch_assoc()['balance'];

            echo '<div class="result-container">';
            if ($fromAccountBalance >= $amount) {
                // Mulai transaksi
                $conn->begin_transaction();

                // Kurangi saldo dari akun pengirim
                $conn->query("UPDATE tbl_accounts SET balance = balance - $amount WHERE id = $fromAccountId");

                // Tambah saldo ke akun penerima
                $conn->query("UPDATE tbl_accounts SET balance = balance + $amount WHERE id = $toAccountId");

                // Catat transaksi
                $timestamp = time();
                $conn->query("INSERT INTO tbl_transactions (from_account, to_account, amount, timestamp) VALUES ($fromAccountId, $toAccountId, $amount, NOW())");

                // Commit transaksi
                $conn->commit();

                echo '<div class="result-title">Transfer Successful</div>';
                echo '<div class="result-text">Amount: ' . $amount . '</div>';
                echo '<div class="result-text">From Account: ' . $fromAccountId . '</div>';
                echo '<div class="result-text">To Account: ' . $toAccountId . '</div>';
            } else {
                http_response_code(400);
                echo '<div class="result-title">Transfer Failed</div>';
                echo '<div class="result-text">Error: Insufficient balance</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
