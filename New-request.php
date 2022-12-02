
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
        <div class="header">

          <div class="small-logo">
            <img style="max-width: 55px;" src="images/logo.png">
        </div>

            <div class="left">
                <h1> New Request</h1>
            </div>
            <div  class="right">
              <a class="signout-btn" style="margin-top:8px; margin-right:20px;" href="Logout.php">Sign out</a>
              </div>
        </div>
        
          <div class="add-new-req-form">
        
            <form  action="Insert-request.php"  enctype="multipart/form-data" method="POST">
                <div class="select"  > 
                <label for="serviceType">Service Type</label>
                <select id="serviceType" name="serviceType" style="color:black">
                    
                   <?php include 'db-connect.php' ?>

<?php
    $sql_services = "SELECT * FROM `service` ";
$services = $connection->query($sql_services);
$service_options="";
if ($services->num_rows > 0) {
        while($row = $services->fetch_assoc()) {
            $service_options = $service_options. '<option style="color:black !important" value="'.$row["id"].'">'.$row["type"].'</option>';
          }
        }
?>
                  <?php
                 echo $service_options;
                  ?>
                </select>
              </div>
              <br>
                <div class="desc">
              <label for="description">Description</label>
              <textarea class="descriptionBox" style="color:black" type="text" id="description" name="description" placeholder="description"></textarea>
            </div>
              <br>
              <br>
              <b>Please attach the required documents</b>
              <br>
              <br>
            <div > 
              <label for="fileUpload1">Attachment 1</label>
              <input type="file" id="fileUpload1" name="fileUpload1" placeholder="attachment 1"><br><br>
              <label for="fileUpload2">Attachment 2</label>
              <input type="file" id="fileUpload2" name="fileUpload2" placeholder="attachment 2">
              <button id="btnSubmit" style="margin-top:12px; margin-left:350px; margin-top:30px; font-size:18px;" type="submit" class="btn btn-primary">submit</button>
              </div>
            </div>  
            </form>
          </div><br><br>
        </dvi>
          <footer class="stickyfooter"> Copyright 2022 - Tech MS ALL Rights Reserved </footer>
    </body>

   
  </html>