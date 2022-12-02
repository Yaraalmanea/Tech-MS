<?php

include("db-connect.php");
session_start();



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if (!empty($password) && !is_numeric($username)) {
        //READ FROM DATABASE
        $query = "SELECT * FROM Manager WHERE username = '$username' limit 1";

        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $userData = mysqli_fetch_assoc($result);
            
            
            if ($password === $userData['password']) {
            // Redirect user to welcome page
                
                $_SESSION['username'] = $userData['username'];
                $_SESSION['loggedin'] = true;
                $_SESSION['role'] = "Manager";
                header("location: Manager.php");
            }
            
            //WRONG PASSWORD
            else {

                echo "<script> alert('Wrong Password !'); </script> "; 
            }
        }
        
        //WRONG USERNAME
        else {
             echo "<script> alert('Username does not exist !'); </script> "; 
        }
    }
    
    //INFORMATION NOT VALID
    else {
             echo "<script> alert('Please enter valid information !'); </script>";
        }  
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Tech MS </title>

        <link rel="stylesheet" href="style.css">
        
        <!-- Fonts from google -->
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
   <!-- <div>
        <img src="images/logo.PNG" alt="logo">
    </div>
   -->
    <body>
      <div class="emp-login-form">
          <img src="images/manager-login-icon.png">
          <h1> Manager </h1>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <input type="text" class="input-box" name="username" maxlength="24" placeholder="Enter Your User Name" style="color: #0F222D;" required>
            <input type="password" name="password" maxlength="255" class="input-box" placeholder="Enter Your Password" style="color: #0F222D;" required> <br> <br>
            <button class="login-btn" type="submit"> Log In </button>
          </form>
      </div>

      <footer class="stickyfooter"> Copyright 2022 - Tech MS ALL Rights Reserved </footer>
    </body>
</html>


