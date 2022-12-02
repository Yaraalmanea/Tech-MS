<?php include 'db-connect.php' ?>
<?php


session_start();
$request_id=0;
if(isset($_REQUEST['id'])){
$request_id=$_REQUEST['id'];
  }
  if(isset($_GET['id'])){
$request_id=$_GET['id'];
  }
if($request_id>0){
    $sql_employee = "SELECT * FROM `request` WHERE `id`=".$request_id;
    $result = $connection->query($sql_employee);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $service_id= $row["service_id"];
            $emp_id=$row["emp_id"];
            $description=$row["description"];
            if($row["attachment1"]!="#"){
                $attatchment1="uploads/".$row["attachment1"];
                $attachmentFile1=$row["attachment1"];
            }else{
                $attatchment1="#";
                $attachmentFile1="#"; 
            }
            if($row["attachment2"]!="#"){
                $attatchment2="uploads/".$row["attachment2"];
                $attachmentFile2=$row["attachment2"];
            }else{
                $attatchment2="#";
                $attachmentFile2="#";
            }
          }
          if($_SESSION['emp_id']<>$emp_id){
            echo '<script>alert("sorry you are not allowed")</script>';
            header("Location: Employee.php");
          }
        }
}
$sql_services = "SELECT * FROM `service` ";
$services = $connection->query($sql_services);
$service_options="";
if ($services->num_rows > 0) {
        while($row = $services->fetch_assoc()) {
            $service_options = $service_options. '<option style="color:black !important" '.($service_id==$row["id"]?'selected="selected"':"").' value="'.$row["id"].'">'.$row["type"].'</option>';
          }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Request</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Fonts from google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap libraries. -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img style="max-width: 55px;" src="images/logo.png" />
                <a href="Employee.php" class="signout-btn" style=" margin-top:15px;  margin-right:80px;"> <i class="fa fa-user"></i> Employee </a>
            </div>
           
            <div class="col-md-3">
                <h1 class="text-center" style="color:#FFF5CC; margin-left:40px;">Request Form</h1>
            </div>
            <div class="col-md-5">
                <a class="signout-btn" style="margin-top:8px; margin-right:20px;" href="Logout.php">Sign out</a>
            </div>
        </div> <br><br>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="form-body">
                    <div class="row">
                        <div class="form-holder" style=" background-color: beige; border-radius: 20px;">
                            <div class="form-content">
                                <div class="form-items">
                                    <hr />
                                    <form action="Update-request.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?php echo $request_id ?>" />
                                    <input type="hidden" name="attachmentFile1" id="attachmentFile1" value="<?php echo $attachmentFile1 ?>" />
                                    <input type="hidden" name="attachmentFile2" id="attachmentFile2" value="<?php echo $attachmentFile2 ?>" />
                                        <div class="col-md-12">
                                            <div class=" " style="color:darkslateblue; font-size:17px;">Service Type : </div>
                                            <select name="serviceType" id="serviceType" style="color:black !important">
                                           <?php echo $service_options; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="" style="margin-top:18px; margin-bottom:10px; color:darkslateblue; font-size:17px;">Request Desciption :</div>
                                            <textarea class="descriptionBox" style="color:black" type="text" id="description" name="description" placeholder="description"><?php echo $description ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="" style="margin-top:15px; color:darkslateblue; font-size:17px;">Attachment #1: <a href="<?php echo $attatchment1 ; ?>"></a></div>
                                            <input type="file" id="fileUpload1" style="color:black !important" name="fileUpload1" placeholder="attachment 1">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="" style="margin-top:10px; color:darkslateblue; font-size:17px;">Attachment #2: <a href="<?php echo $attatchment2 ; ?>"> </a></div>
                                            <input type="file" id="fileUpload2" style="color:black !important" name="fileUpload2" placeholder="attachment 2"><br><br>
                                        </div>
                                        <div class="form-button mt-3">
                                            <button id="btnSubmit" formmethod="post" style="margin-top:12px; margin-left:350px; margin-top:30px; font-size:18px;" id="submit" type="submit"   class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <footer class="stickyfooter" style="margin-top:120px;"> Copyright 2022 - Tech MS ALL Rights Reserved </footer>
        </div>
    </div>
</body>
</html>