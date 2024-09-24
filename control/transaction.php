<?php
include('../model/dbcon.php');  

session_start();

// Assuming the user is logged in and their username is stored in the session
$username = $_SESSION['username'];

// Fetch the account details from the database
$query = "SELECT `name`, `type`, `deposit` FROM `users` WHERE `username` = '$username'";
$result = mysqli_query($conn, $query);

if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

$accountDetails = mysqli_fetch_assoc($result);





// Add Money Logic
if (isset($_POST['add_money'])) {
    $amountToAdd = $_POST['amount'];

    // Update the deposit in the database
    $newDeposit = $accountDetails['deposit'] + $amountToAdd;
    $updateQuery = "UPDATE `users` SET `deposit` = '$newDeposit' WHERE `username` = '$username'";

    if (mysqli_query($conn, $updateQuery)) {
        //Throw error message to the url and change the directory to details.php
        header('location: ../view/details.php?add_msg=money deposited succesfully'); 
        exit();
    } else {
        die(mysqli_error($conn));
    }
}

// Transfer Money Logic
if (isset($_POST['transfer_money'])) {
    $recipient = $_POST['rcpAcc'];
    $transferAmount = $_POST['trnsfrAcc'];

    // Check if the user has enough balance
    if ($accountDetails['deposit'] >= $transferAmount) {
        // Update the sender's account
        $newSenderBalance = $accountDetails['deposit'] - $transferAmount;
        $updateSenderQuery = "UPDATE `users` SET `deposit` = '$newSenderBalance' WHERE `username` = '$username'";

        // Update the recipient's account
        $updateRecipientQuery = "UPDATE `users` SET `deposit` = `deposit` + '$transferAmount' WHERE `username` = '$recipient'";

        if (mysqli_query($conn, $updateSenderQuery) && mysqli_query($conn, $updateRecipientQuery)) {
            echo "<p>Money transferred successfully. New Balance: $$newSenderBalance</p>";
            // Refresh the page to show updated balance
            header("Refresh:0");
        } else {
            die("Error transferring money: " . mysqli_error($conn));
        }
    } else {
        echo "<p>Insufficient balance to complete the transfer.</p>";
    }
}
?>

</body>
</html>