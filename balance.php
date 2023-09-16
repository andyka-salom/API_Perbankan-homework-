<!DOCTYPE html>
<html lang="en">

<link href="../css/balance.css" rel="stylesheet" type="text/css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM - Check Balance</title>
   
</head>
<body>
    <div class="container">
        <h1>ATM - Check Balance</h1>
        <div class="form-container">
            <!-- <form action="api/balance.php" method="GET">
                <label for="balance-id">Enter Account ID:</label>
                <input type="text" id="balance-id" name="id" placeholder="Account ID">
                <input type="submit" value="Check Balance">
            </form> -->
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
        </div>
    </div>
   
</body>
</html>
<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $accountId = $_GET['id'];

    // Query database untuk mendapatkan saldo akun
    $sql = "SELECT balance FROM tbl_accounts WHERE id = $accountId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $balance = $row['balance'];
        echo '<div class="container">';
        echo '<h1>ATM - Balance Result</h1>';
        echo '<div class="form-container">';
        echo '<p>Account ID: ' . $accountId . '</p>';
        echo '<p>Balance: ' . $balance . '</p>';
        echo '</div>';
        echo '</div>';
    } else {
        http_response_code(404);
        echo '<div class="container">';
        echo '<h1>ATM - Error</h1>';
        echo '<div class="form-container">';
        echo '<p>Account ID: ' . $accountId . '</p>';
        echo '<p>Error: Account not found</p>';
        echo '</div>';
        echo '</div>';
    }
}
?>
