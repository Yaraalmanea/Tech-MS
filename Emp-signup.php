<?php

session_start();
require_once ("db-connect.php");


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $emp_number = $_POST['emp_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $job_title = $_POST['job_title'];
    $password = $_POST['password'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    
    if (!empty($emp_number) && !empty($first_name) && !empty($last_name) && !empty($job_title) && !empty($password_hashed) && is_numeric($emp_number))
        {
     $query = "SELECT * FROM Employee WHERE emp_number = '$emp_number' limit 1";
        
        $result = mysqli_query($connection,$query);
        
        if($result && mysqli_num_rows($result) > 0){
            
            echo "<script> alert('This user already exists !') </script>";
        }
        else{
         // SAVE TO DATABASE
      
            $sql = "INSERT INTO Employee ( emp_number, first_name, last_name, job_title, password) VALUES ( '$emp_number', '$first_name', '$last_name', '$job_title', '$password_hashed')";
        
       if(mysqli_query($connection, $sql)){
        echo "new record created successfully";
        header("location: Employee.php");

       }
       else{
           echo "<script> alert('No record added !') </script>";
       }
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
      <div class="emp-login-form" style="width: 350px;">
          <img src="images/login-signup-icon-png-7.png">
          <h1> Employee </h1>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
            <input type="text" class="input-box" name="emp_number" maxlength="13" placeholder="Enter Your Employee Number" style="color: #0F222D ;" required>
            <input type="text" class="input-box" name="first_name" maxlength="24" placeholder="Enter Your First Name" style="color: #0F222D;" required>
            <input type="text" class="input-box" name="last_name" maxlength="24" placeholder="Enter Your Last Name" style="color: #0F222D;" required>
            <input type="text" class="input-box" name="job_title" maxlength="30" placeholder="Enter Your Job Title" style="color: #0F222D;" required>
            <input type="password" name="password" maxlength="255" class="input-box" placeholder="Enter Your Password" style="color: #0F222D;" required> <br> <br>

            <button class="login-btn" type="submit" style="padding: 10px 119px;"> Sign Up </button>
          </form>
      </div>

      <footer class="stickyfooter"> Copyright 2022 - Tech MS ALL Rights Reserved </footer>
    </body>
</html>

