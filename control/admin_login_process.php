<?php 
include('../model/dbcon.php'); 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    


<?php
       //select login using POST method
       if (isset($_POST['admin_login'])){ 

        //take inputs from form using post method
        $username = $_POST['username'];
        $password = $_POST['password'];
       

       //Select login info from database using my sql query
        $query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
        
       
       
      
       //Executing the query
       $result = mysqli_query($conn, $query);

       if(!$result){
         //Display error in proper way
        die("query Failed".mysqli_error($conn));
     }
     
          //Selecting row
          if(mysqli_num_rows($result) === 1){
            
            // Fetch the user data
            $row = mysqli_fetch_assoc($result);

           

             //Given password checked with the database Password
             if($password === $row['password']){

             //Get username with the session variable and change the directory to home.php
             $_SESSION['username'] = $username;
             

             header('location: ../view/manage_user.php');
             exit();
             }

             else{
               //Throw error message to the url and change the directory to index.php
               header('location: ../view/admin_login.php?error_msg=Incorrect username or password'); 
               exit();
             }

            }

         
       
          else{
            //Throw error message to the url and change the directory to index.php
            header('location: ../operations/index.php?error_msg=Incorrect username or password'); 
            exit();
         }
      }
       
    
?>


</body>
</html>