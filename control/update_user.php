<?php include('../model/dbcon.php');  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    

</head>
<body>

  
       <?php
       
       // Get the id from url using GET method
       if (isset($_GET['id'])){

        $id = $_GET['id'];
       

         // select the user by id from database 
         $query = "SELECT * FROM `users` WHERE `id` = '$id' ";
         $result = mysqli_query($conn, $query);

         if(!$result){
            die("query Failed".mysqli_error($conn));
         }
         else{
            $row = mysqli_fetch_assoc($result);
            //print_r($row);
      }
       }
       
      
      // Select input named 'update_user' using POST method
      if (isset($_POST['update_user'])){
          // Collect the id from url using GET method and store it to $id_new
          if (isset($_GET['id_new'])){
               $id_new = $_GET['id_new'];
      
          }

           // Collect inputs
             $name = $_POST["name"];
             $address = $_POST["address"];
             $contact = $_POST["contact"];
             $type = $_POST["type"];
             $username = $_POST["username"];
             $password = $_POST["password"];
             $confirm_password = $_POST["confirm_password"];
             $deposit = $_POST["deposit"];
             //$file = $_POST["file"];

         //$query = "UPDATE `stud` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = '$id_new'";

          //Hashing the password before storing it
         //password_hash is a inbuild function
         //PASSWORD_BCRYPT is the hashing algorithm
         $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


         // Update the user into the database
         $query = "UPDATE `users` SET `name` = '$name', `address` = '$address', `contact` = '$contact' , `type` = '$type' , `username` = '$username' , `Password` = '$hashedPassword' , `deposit` = '$deposit' WHERE `id` = '$id_new'";

         // Executing the query
         $result = mysqli_query($conn, $query);

         if(!$result){
            die("query Failed".mysqli_error($conn));
         }
         else{
            //Throw update messsage to url. Message showed in ./operations/home.php
            header("Location:../view/manage_user.php?update_msg=Succesfully updated the user");  
      }

         }
     
     
       ?>






<form action="update_user.php?id_new=<?php echo $id; ?> " method = "POST">
<h1>Update user</h1>
    
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control"  value="<?php echo $row['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control"  value="<?php echo $row['address'] ?>" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="tel" id="contact" name="contact" class="form-control"  value="<?php echo $row['contact'] ?>" required>
            </div>
            <div class="form-group">
                <label for="type">type</label>
                <input type="text" id="type" name="type" class="form-control"  value="<?php echo $row['type'] ?>" required>
            </div>
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo $row['username'] ?>" required>
            </div>

            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" id="password" name="password" class="form-control"  required>
            </div>

           <div class="form-group">
               <label for="confirm_password">Re-enter Password</label>
               <input type="password" id="confirm_password" name="confirm_password" class="form-control"  required>
            </div>

            <div class="form-group">
                <label for="deposit">Deposit</label>
                <input type="text" id="password" name="deposit" class="form-control" value="<?php echo $row['deposit'] ?>" required>
            </div>




       
     <input type="submit" name="update_user" class="btn btn-primary" value="UPDATE">

     </form>


</body
</html>