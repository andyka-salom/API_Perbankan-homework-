<!DOCTYPE html>
<html lang="en">

<link href="../css/transactions.css" rel="stylesheet" type="text/css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM - Transaction History</title>
    
</head>
<body>
    <div class="container">
        <h1>ATM - Transaction History</h1>
        <div class="form-container">
            <form action="api/transactions.php" method="GET">
                <!-- <label for="transactions-id">Enter Account ID:</label>
                <input type="text" id="transactions-id" name="id" placeholder="Account ID">
                <input type="submit" value="Get Transactions"> -->
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

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $accountId = $_GET['id'];

            // Query database untuk mendapatkan daftar transaksi
            $sql = "SELECT * FROM tbl_transactions WHERE from_account = $accountId OR to_account = $accountId ORDER BY timestamp DESC LIMIT 10";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<div class="transaction-history">';
                echo '<div class="transaction-title">Transaction History for Account ID: ' . $accountId . '</div>';
                echo '<table class="transaction-table">';
                echo '<tr><th>Timestamp</th><th>From Account</th><th>To Account</th><th>Amount</th></tr>';
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['timestamp'] . '</td>';
                    echo '<td>' . $row['from_account'] . '</td>';
                    echo '<td>' . $row['to_account'] . '</td>';
                    echo '<td>' . $row['amount'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                echo '</div>';
            } else {
                echo '<p>No transactions found for this account.</p>';
            }
        }
        ?>
    </div>
</body>
</html>
