<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        .form-container {
            text-align: center;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;

        }
        input[type="text"] {
            width: 95%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .text2[type="label"]{
            text-align:left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mochammad Vaif Dwi Alifkhan</h1>
        <div class="form-container">
            <form action="api/balance.php" method="GET">
                <h2>Check Balance</h2>
                <label for="balance-id" >Account ID:</label>
                <input type="text" id="balance-id" name="id" placeholder="Enter Account ID">
                <input type="submit" value="Check Balance">
            </form>

            <form action="api/transfer.php" method="POST">
                <h2>Transfer Money</h2>
                <label for="from-account" >From Account:</label>
                <input type="text" id="from-account" name="from_account" placeholder="Enter From Account ID" >
                <label for="to-account">To Account:</label>
                <input type="text" id="to-account" name="to_account" placeholder="Enter To Account ID">
                <label for="transfer-amount">Amount:</label>
                <input type="text" id="transfer-amount" name="amount" placeholder="Enter Amount">
                <input type="submit" value="Transfer">
            </form>

            <form action="api/transactions.php" method="GET">
                <h2>Recent Transactions</h2>
                <label for="transactions-id">Account ID:</label>
                <input type="text" id="transactions-id" name="id" placeholder="Enter Account ID">
                <input type="submit" value="Get Transactions">
            </form>
        </div>
    </div>
</body>
</html>
