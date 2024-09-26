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
  if(isset($_GET['success_msg'])){
   echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['success_msg']) . "</h6>";
  }
  if(isset($_GET['error_msg3'])){
    echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['error_msg3']) . "</h6>";
   }
?>
    <div class="login-container">
        <h2>Login to Your Account</h2>
        <form action="../control/admin_login_process.php" method="post">

            <?php


    if (isset($_GET['message'])){  // extract the message from url

            echo "<h6 class='text-danger'>" . htmlspecialchars($_GET['message']) . "</h6>";

    }


    if (isset($_GET['error_msg'])){   
        echo "<h4 class='text-danger'>" . htmlspecialchars($_GET['error_msg']) . "</h4>";
    
    }

  if (isset($_GET['error_msg2'])){   

    echo "<h4 class='text-danger'>" . htmlspecialchars($_GET['error_msg2']) . "</h4>";

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

            <button type="submit" name="admin_login" class="btn">Login</button>

            <a href="reg.php" class="btn2">Resister now</a>
            <br>
            <a href="login.php" class="btn2">Back to user login</a>





        </form>
    </div>



</body>

</html>