<?php 
include("db-connect.php"); 
include("session.php");



if($_SESSION["role"]==="Manager"){
 header("location: Manager.php");
}

if(isset($_SESSION['emp_id']) && !empty($_SESSION['emp_id'])) {
    $emp_id=$_SESSION['emp_id'];
    $sql_employee = "SELECT `id`, `emp_number`, `first_name`, `last_name`, `job_title`, `password` FROM `employee` WHERE `id`=" . $emp_id;
    $result = $connection->query($sql_employee);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $emp_name= $row["first_name"]. " " . $row["last_name"];
            $emp_number=$row["emp_number"];
            $emp_job_title=$row["job_title"];
            $emp_id=$row["id"];
          }
          if(isset($emp_id)){
            $sql_employee_requests_in_progress = "SELECT `request`.`id`, `service`.`type` as `service_type`,`description`,`status` FROM `request` 
            INNER JOIN    `service`
            on `request`.`service_id`=`service`.`id` WHERE  LOWER(`status`) = 'in progress' AND `emp_id`=" . $emp_id;
             $sql_employee_requests_previous = "SELECT `request`.`id`, `service`.`type` as `service_type`,`description`,`status` FROM `request` 
             INNER JOIN    `service`
             on `request`.`service_id`=`service`.`id` WHERE LOWER(`status`) <> 'in progress' AND  `emp_id`=" . $emp_id;
          }
    }

} else {
  header("Location: Emp-login.php"); } ?>



<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Tech MS </title>
        <script src=".js" defer> </script>
        <link rel="stylesheet" href="style.css">
        <!-- Fonts from google -->
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
<body>
    <div class="header">
        <div class="small-logo">
            <img style="max-width: 55px;" src="images/logo.png">
        </div>
        <div class="left">
            <div class="title"><i>Welcome 
                <?php echo $emp_name; ?>
            </i></div>
            <div class="subHeader">Employee's ID: <?php echo $emp_number; ?></div>
            <div class="subHeader">Job Title: <?php echo $emp_job_title; ?></div>
        </div>
         <div class="right">
            <a class="signout-btn" style="margin-top:10px;" href="Logout.php">Sign out</a>
                </div> 
                <br><br>
    </div>
    <div class="content">
        <a class="addreq-btn"  href="New-request.php"> Add Request</a>
            <table class="center" >
                <caption>Requests</caption>
                <tr>
                    <th  style="background: #263d4b;" colspan="4">In Progress</th>
                </tr>
<?php
                $requests = $connection->query($sql_employee_requests_in_progress);
                if ($requests->num_rows > 0) {
                    while($row = $requests->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td colspan="3"><a href="Request-info.php?id=' . $row['id'] . '">' . $row['id'] . '- '.$row['service_type'].'</a></td>';
                            echo '<td><a class="edit" href="Edit-request.php?id=' . $row['id'] . '">Edit</a></td>';
                            echo '</tr>';
                    }
                }
?>
            </table>
        
            <table class="center">
            
                <tr>
                    <th colspan="2">Previous Requests</th>
                    <th>Status</th>
                    <th></th>
                </tr>
<?php
                $requests = $connection->query($sql_employee_requests_previous);
                if ($requests->num_rows > 0) {
                    while($row = $requests->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td colspan="2"><a href="Request-info.php?id=' . $row['id'] . '">' . $row['id'] . '- '.$row['service_type'].'</a></td>';
                            echo '<td>' .$row['status']. '</td>';
                            echo '<td><a class="edit" href="Edit-request.php?id=' . $row['id'] . '">Edit</a></td>';
                            echo '</tr>';
                    }
                }
?>
            </table>
        <br><br>
    </div>
    <div class="footer"></div>
    <footer class="stickyfooter"> Copyright 2022 - Tech MS ALL Rights Reserved </footer>
</body>
</html>

