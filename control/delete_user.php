<?php 
include('../model/dbcon.php');  



function reorderAndReset($conn) {
   
   // Reorder IDs of users
   $reorderQuery = "SET @count = 0; UPDATE users SET id = @count:= @count + 1;";
   if (mysqli_multi_query($conn, $reorderQuery)) {
       // Wait for the queries to finish
       while (mysqli_next_result($conn)) {;}
   } else {
       die("Query Failed: " . mysqli_error($con));
   }



   // Reset auto-increment value of users
   $resetQuery = "ALTER TABLE users AUTO_INCREMENT = 1;";
   if (!mysqli_query($conn , $resetQuery)) {
       die("Query Failed: " . mysqli_error($conn));
   }



}

    // Get the id from url using GET method
    if (isset($_GET['id'])){       //extract the id from url
         $id_new = $_GET['id'];

     }

     // Delete the user from database
     $query = "DELETE FROM `users`WHERE `id` = '$id_new'";
     $result = mysqli_query($conn, $query);

  
     if(!$result){
        // My sqi error function
        die("query Failed".mysqli_error($conn));  
     }

     else{
        // Call the reorder and reset function after deletion
        reorderAndReset($conn); 
        header("Location:../view/manage_user.php?delete_msg=Succesfully_deleted_the_user");
  }

?> 