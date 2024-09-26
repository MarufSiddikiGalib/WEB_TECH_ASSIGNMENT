<?php 
include('../model/dbcon.php');  
include('../control/transaction.php');  
?>

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
        <a href="../control/logout_process.php" class="btn btn-danger">Logout</a>
        <h1 id="acholder">Account Holder Dashboard</h1>
        
        <div>
            <h3>Account Details</h3>
            <p>Account Name: <?php echo $accountDetails['name']; ?> </p>
            <p>Account Type: <?php echo $accountDetails['type']; ?> </p>
            <p>Balance: BDT <?php echo $accountDetails['deposit']; ?> </p>
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
            <form action="../control/transaction.php" method="POST">

                <?php
            if(isset($_GET['add_msg'])){

              echo "<h4 class='text-danger'>" . htmlspecialchars($_GET['add_msg']) . "</h4>";
            }
            ?>

                <label for="amount">Amount: </label>
                <input type="text" id="amount" name="amount" required>
                <br><br>
                <button type="submit" name="add_money" id="addMoney">Add Money</button>
            </form>
        </div>

        <div>
        <h3>Transfer Money</h3>
         <form action="../control/transaction.php" method="POST">

         <?php
            if(isset($_GET['add_msg2'])){

              echo "<h4 class='text-danger'>" . htmlspecialchars($_GET['add_msg2']) . "</h4>";
            }
            ?>


        <label for="rcpAcc">Recipient Account:</label>
        <input type="text" id="rcpAcc" name="rcpAcc" required>
        <br><br>
        <label for="trnsfrAcc">Transfer Amount:</label>
        <input type="text" id="trnsfrAcc" name="trnsfrAcc" required>
        <br><br>
        <button type="submit" name="transfer_money" id="trnsfrMoney">Transfer Money</button>
    </form>
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
