<?php
$servername = "localhost";
$username = "root"; 
$password = "";      
$dbname = "bank_account"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if(!$conn){
    die("Connection failed");
}
?>