<?php 
include '../model/dbcon.php';





if (isset($_POST['user_reg'])){

    // Collect inputs
    $name = $_POST["customer_name"];
    $address = $_POST["customer_address"];
    $contact = $_POST["customer_contact"];
    $type = $_POST["account_type"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $deposit = $_POST["initial_deposit"];
    $file = $_POST["file"];
    

        //Hashing the password before storing it
        //password_hash is a inbuild function
        //PASSWORD_BCRYPT is the hashing algorithm
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


    $query = "INSERT INTO `users` (`name`, `address`, `contact` , `type` , `username` , `password` , `deposit`) VALUES ('$name', '$address', '$contact' , '$type' , '$username' , '$hashedPassword' , '$deposit' )";

    $result = mysqli_query($conn, $query);
 


   if( !$result ){
       // Show error message properly
       die("Query Failed".mysqli_error($conn));
    }

   else{
     //Throw success messsage to url. Message showed in ./operations/home.php
     $message = urlencode("RESISTRATION SUCCESSFULL PLEASE LOGIN");
     header("Location:../view/login.php?message=" . $message);
     exit;
   }



}

?>