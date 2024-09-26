<?php include('../model/dbcon.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login here</title>
    <link rel="stylesheet" href="../css/style_login.css">

</head>
<body>
    
<?php 

// Get message from url. message threw from login_process.php


  

  // Get message from url. 
  if(isset($_GET['success_msg'])){

   echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['success_msg']) . "</h6>";
  }

  // Get message from url. message threw from reset_process.php
  if(isset($_GET['error_msg3'])){

    echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['error_msg3']) . "</h6>";
   }




  
  


?>

      <div class="login-container">
    <h2>Login to Your Account</h2>
    <form action="../control/login_process.php" method="post">




<?php


    if (isset($_GET['message'])){  // extract the message from url

            echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['message']) . "</h6>";

    }


    if (isset($_GET['error_msg'])){   

        echo "<h4 class='text-danger'>" . htmlspecialchars($_GET['error_msg']) . "</h4>";  //dot is for cancat
    
    }


    // Get message from url. message threw from insert.php
  if (isset($_GET['error_msg2'])){   

    echo "<h4 class='text-danger'>" . htmlspecialchars($_GET['error_msg2']) . "</h4>";  //dot is for cancat

  }

?>



        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" name= "login" class="btn">Login</button>

        <a href="reg.php" class = "btn2" >Resister now</a> 
        <br>
        <a href="password_reset.php" class = "btn2" >Forgot Password?</a>
        <br>
        <a href="admin_login.php" class = "btn2" >Are you a admin</a>


    </form>
</div>



</body>
</html>