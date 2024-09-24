

<?php 
//Distroying session
include('../config/dbcon.php'); 
session_start();

//Have to unset session before destrying
session_unset();  
session_destroy();

//Change the header location to index.php after distroying the session
header('location:../view/login.php');
?>

