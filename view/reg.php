<?php 
include('../control/insert.php'); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Interface 1</title>
    <link rel="stylesheet" href="../css/stylesforreg.css">
</head>
<body>
    <h1>Bank Account Opening Form</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="cname">Customer Name:</label>
        <br>
        <input type="text" id="cname" name="customer_name" required>
        <br><br>

        <label for="caddress">Customer Address:</label>
        <br>
        <textarea id="caddress" name="customer_address" rows="3" required></textarea>
        <br><br>

        <label for="ccontact">Customer Contact:</label>
        <br>
        <input type="text" id="ccontact" name="customer_contact" required>
        <br><br>

        <label for="actype">Account Type:</label>
        <br>
        <select id="actype" name="account_type" required>
            <option value="savings">Savings Account</option>
            <option value="islamic">Islamic Account</option>
            <option value="fixed">Fixed Deposit Account</option>
        </select>
        <br><br>


        <label for="username">username:</label>
        <br>
        <input type="text" id="username" name="username" required>
        <br><br>


        <label for="password">password:</label>
        <br>
        <input type="password" id="pass" name="password" required>
        <br><br>


        <label for="confirm_password">Confirm password:</label>
        <br>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br><br>



        <label for="indeposit">Initial Deposit:</label>
        <br>
        <input type="text" id="indeposit" name="initial_deposit" required>
        <br><br>

        <label for="pdoc">Identity Proof:</label>
        <br>
        <input type="file" id="pdoc" name="identity_proof" >
        <br><br>

        <input type="submit" name = "user_reg" id="oasubmit" value="Open Account">

    </form>



</body>
</html>
