<?php

session_start();
include("db-connect.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emp_number = trim($_POST['emp_number']);
    $password = trim($_POST['password']);
   

    if (!empty($emp_number) && !empty($password) && is_numeric($emp_number)) {
        //READ FROM DATABASE
        $query = "SELECT * FROM Employee WHERE emp_number = '$emp_number' limit 1";

        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $userData = mysqli_fetch_assoc($result);
           
            
            if (password_verify($password, $userData['password'])) {         
            // Redirect user to welcome page
             
                $_SESSION["emp_number"] = $userData['emp_number'];
                $_SESSION["id"] = $userData['id'];
                $_SESSION["emp_id"]=$userData['id']; // new code 
                $_SESSION["first_name"] = $userData['first_name'];
                $_SESSION["loggedin"] = true;
                $_SESSION["role"] = "Employee";
                header("location: Employee.php");

            }
            else {

                echo "<script> alert('Wrong Password ! '); </script>";
            }
        }
        else {
            echo "<script> alert('Employee number does not exist ! '); </script>";
        }   
    
    }
    
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
  
    <body>
      <div class="emp-login-form">
          <img src="images/login-signup-icon-png-7.png">
          <h1> Employee  </h1>
          <div id="error"></div>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">

              <input type="text" class="box" id="id-login" name="emp_number" maxlength="13" placeholder="Enter Your Employee Number" style="color: #0F222D;" required>
              <input type="password" id="pswd" name="password" maxlength="60" class="input-box" placeholder="Enter Your Password" style="color: #0F222D;" required> <br> <br>
    
              <button class="login-btn" name="submit" type="submit"> Log In </button>
            
          </form>
      </div>

      <footer class="stickyfooter"> Copyright 2022 - Tech MS ALL Rights Reserved </footer>
    </body>
</html>