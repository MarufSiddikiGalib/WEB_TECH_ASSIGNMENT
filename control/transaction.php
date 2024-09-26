<?php
include('../model/dbcon.php');  

session_start();

$username = $_SESSION['username'];
$query = "SELECT `name`, `type`, `deposit` FROM `users` WHERE `username` = '$username'";
$result = mysqli_query($conn, $query);

if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

$accountDetails = mysqli_fetch_assoc($result);
if (isset($_POST['add_money'])) {
    $amountToAdd = $_POST['amount'];

    $newDeposit = $accountDetails['deposit'] + $amountToAdd;
    $updateQuery = "UPDATE `users` SET `deposit` = '$newDeposit' WHERE `username` = '$username'";

    if (mysqli_query($conn, $updateQuery)) {
        header('location: ../view/details.php?add_msg=money deposited succesfully'); 
        exit();
    } 
    else{
        die(mysqli_error($conn));
    }
}
 
if (isset($_POST['transfer_money'])) {
    $recipient = $_POST['rcpAcc'];
    $transferAmount = $_POST['trnsfrAcc'];
    $recipientQuery = "SELECT `deposit` FROM `users` WHERE `username` = '$recipient'";
    $recipientResult = mysqli_query($conn, $recipientQuery);

    if (mysqli_num_rows($recipientResult) === 1) {
        $recipientData = mysqli_fetch_assoc($recipientResult);
        if($accountDetails['deposit'] >= $transferAmount) {
            
            $newSenderBalance = $accountDetails['deposit'] - $transferAmount;
            $updateSenderQuery = "UPDATE `users` SET `deposit` = '$newSenderBalance' WHERE `username` = '$username'";
            $newRecipientBalance = $recipientData['deposit'] + $transferAmount;
            $updateRecipientQuery = "UPDATE `users` SET `deposit` = '$newRecipientBalance' WHERE `username` = '$recipient'";
            if (mysqli_query($conn, $updateSenderQuery) && mysqli_query($conn, $updateRecipientQuery)){
               header('location: ../view/details.php?add_msg2=money transaction succesfull'); 
               exit();
            } 
            else{
                die("Error transferring money: " . mysqli_error($conn));
            }
        } 
        else{
            echo "<p>Insufficient balance to complete the transfer.</p>";
        }
    } 
    else{
        echo "<p>Recipient account does not exist. Please check the username and try again.</p>";
    }
}
?>
</body>
</html>