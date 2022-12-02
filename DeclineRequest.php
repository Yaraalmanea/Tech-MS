<?php
include("session.php");
include("db-connect.php");
if($_SESSION["role"]==="Employee"){
    header("location: Employee.php");
}
?>
<?php 
  $get_id = $_GET['id'];
  mysqli_query($connection ,"update request set status='Declined' where id='$get_id'")or die(mysql_error());
  header("location: Request-info.php?id=".$get_id);
?>