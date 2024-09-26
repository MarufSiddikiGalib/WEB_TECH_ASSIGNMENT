<?php

 include('../model/dbcon.php');  


if (isset($_POST['user_reg'])) {
    
    $customer_name = $_POST['customer_name'];
    $customer_address = $_POST['customer_address'];
    $customer_contact = $_POST['customer_contact'];
    $account_type = $_POST['account_type'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $initial_deposit = $_POST['initial_deposit'];

    
    $errors = [];

    
    if (empty($customer_name)) {
        $errors[] = "Customer name is required.";
    }

    
    if (empty($customer_address)) {
        $errors[] = "Customer address is required.";
    }

    
    if (empty($customer_contact)) {
        $errors[] = "Customer contact is required.";
    } elseif (!is_numeric($customer_contact)) {
        $errors[] = "Customer contact should be a number.";
    }

    
    if(empty($username)) {
        $errors[] = "Username is required.";
    }

    
    if(empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }

    if ($password != $confirm_password){

        $errors[] = "Passwords do not match.";
    }

    
    if  (empty($initial_deposit)){
        $errors[] = "Initial deposit is required.";
    } elseif (!is_numeric($initial_deposit)) {
        $errors[] = "Initial deposit should be a number.";
    }

    
    if (isset($_FILES['identity_proof']) && $_FILES['identity_proof']['error'] == 0) {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf'];
        $file_name = $_FILES['identity_proof']['name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if(!in_array($file_ext, $allowed_extensions)) {
            $errors[] = "Invalid file type. Only JPG, JPEG, PNG, and PDF are allowed.";
        }

        if($_FILES['identity_proof']['size'] > 2000000) { 
            $errors[] = "File size exceeds the 2MB limit.";
        }
    }

    
    if (empty($errors)) {
        
        echo "Form successfully validated and submitted!";
    } else {
        
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>