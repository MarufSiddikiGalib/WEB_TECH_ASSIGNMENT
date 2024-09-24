<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Holder Dashboard</title>
    <link rel="stylesheet" href="../css/stylesfordetails.css">
</head>
<body>
    <fieldset>
        <h1 id="acholder">Account Holder Dashboard</h1>

        <div>
            <h3>Account Details</h3>
            <p><strong>Account Number:</strong></p>
            <p><strong>Account Type:</strong></p>
            <p><strong>Balance:</strong></p>
        </div>

        <div>
            <h3>Recent Transactions</h3>
            <table border="1">
                <tr>
                    <th>Transaction ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div>
            <h3>Add Money</h3>
            <label for="amount">Amount: </label>
            <input type="text" id="amount" name="amount">
            <br><br>
            <button onclick="addMoney()" id="addMoney">Add Money</button>
        </div>

        <div>
            <h3>Transfer Money</h3>
            <label for="rcpAcc">Recipient Account:</label>
            <input type="text" id="rcpAcc" name="rcpAcc">
            <br><br>
            <label for="trnsfrAcc">Transfer Amount:</label>
            <input type="text" id="trnsfrAcc" name="trnsfrAcc">
            <br><br>
            <button onclick="transferMoney()" id="trnsfrMoney">Transfer Money</button>
        </div>
    </fieldset>

    <script>
        function addMoney(){
            
        }

        function transferMoney(){
            
        }
    </script>
</body>
</html>
