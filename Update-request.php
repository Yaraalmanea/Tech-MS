<?php 
include 'db-connect.php' ;

header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire'); 
session_start();


  if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
    $service_id = $_POST['serviceType'];
    $description = $_POST['description'];
    $emp_id = $_SESSION['emp_id'];
    
    $attachment1="";
    if(isset($_FILES['fileUpload1']['name']) && !empty($_FILES['fileUpload1']['name'])){
    $attachment1 =preg_replace('/\s+/', '_',strtolower(uniqid('',true) . $_FILES['fileUpload1']['name']));
    $attachment1_file_tmpName=$_FILES['fileUpload1']['tmp_name'];
    move_uploaded_file($attachment1_file_tmpName,'uploads/' . $attachment1);
    $attachment1='uploads/' . $attachment1;
    }
   
    $attachment2="";
    if(isset($_FILES['fileUpload2']['name']) && !empty($_FILES['fileUpload2']['name'])){
    $attachment2 =preg_replace('/\s+/', '_', strtolower(uniqid('',true) . $_FILES['fileUpload2']['name']));
    $attachment2_file_tmpName=$_FILES['fileUpload2']['tmp_name'];
    move_uploaded_file($attachment2_file_tmpName,'uploads/' . $attachment2);
    $attachment2='uploads/' . $attachment2;
    }
    
    
    $updateStr ="UPDATE  `request` SET `service_id`=".$service_id.", `description`='".$description."' ,`attachment1`='".$attachment1."', `attachment2`='".$attachment2."' WHERE `id`=".$id;

    $response= mysqli_query($connection,$updateStr);
    $_SESSION['id']=$id;
    $_SESSION['from_update']=1;

header('Refresh:2; url=Request-info.php?id='.$id);
    echo ' 
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div class="w3-panel w3-green">
    <h3>Success!</h3>
    <p>Your request has been updated successfully.</p>
  </div>';  }

?>
