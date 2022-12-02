<?php 
include("session.php");
include("db-connect.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Request Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Fonts from google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap libraries. -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img style="max-width: 55px;" src="images/logo.png" />
            </div>
            
            <?php  
                        $role=$_SESSION["role"];
                       if($role==="Manager" ) {
						 ?>		   
             <div class="col-md-2">
                <a href="Manager.php" class="signout-btn" style=" margin-top:15px; margin-right:50px;"> <i class="fa fa-user"></i> Manager</a>
            </div>
                         <?php						 
					  }
                        ?>
            
            
              
            <?php  
                        $role=$_SESSION["role"];
                       if($role==="Employee" ) {
						 ?>		   
             <div class="col-md-2">
                <a href="Employee.php" class="signout-btn" style=" margin-top:8px; margin-right:50px;"> <i class="fa fa-user"></i> Employee </a>
            </div>
                         <?php						 
					  }
                        ?>
            
            
           
            <div class="col-md-6">
                <h1 class="text-center" style="color:#FFF5CC;" >Request Information</h1>
            </div>
            <div class="col-md-2">
                <a class="signout-btn" style="margin-top:10px;" href="Homepage.php">Sign out</a>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                   
            <div>   
                
                </div>
            </div>
            </div>
                        
                      <?php 
                          
                             $requestId=0;
                             if(isset($_GET['id'])){
                                            $requestId=$_GET['id'];
                                }
                                if(isset($_SESSION['request_id']) &&  !isset($_GET['id'])){
                                            $requestId= $_SESSION['request_id'];
                                }
                            $query="select * FROM Request JOIN Employee on Request.emp_id=Employee.id JOIN Service on Request.service_id=Service.id WHERE Request.id='$requestId'" ;
                            $result = mysqli_query($connection, $query);
                         
                          
                          if ( $result ){
                          
                           while ($row = mysqli_fetch_array($result) ) {
                                
                            ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div>
                    <div class="request-white request-text" style="border-radius:3px; height:320px !important;">
                        <div class="child-box">
                        </div>
                        <h1 class="text-center" style="color: #0F222D; padding-top:15px; padding-bottom:25px;"> <?php echo $row['type']; ?> <br><span style="font-size:0.55em; align-items:center; margin-top: 0.2px; " class="badge bg-secondary"> <?php echo $row['status']; ?> </span></h1>
                       
                        <?php  
                        $role=$_SESSION["role"];
                       if($role==="Manager" && $row['status']=="In Progress")
					  {
						 ?>
						    <div class="text-center">
                           <form  method="post"  action="ApproveRequest.php?id=<?php echo $requestId ?>">
                                <button class="card-btn approve-btn">Approve </button>
                            </form>
                            </div>

                        <div class="text-center">
                           <form  method="post"  action="DeclineRequest.php?id=<?php echo $requestId ?>">
                                <button class="card-btn decline-btn">Decline </button>
                            </form>
                        </div>

                         <?php						 
					  }
                        ?>

                         <?php  
                        $role=$_SESSION["role"];
                       if($role==="Manager" && $row['status']=="Approved")
					  {
						 ?>
                        <div class="text-center">
                             <form  method="post"  action="DeclineRequest.php?id=<?php echo $requestId ?>">
                                <button class="card-btn decline-btn">Decline </button>
                            </form>
                        </div>
                         <?php						 
					  }
                        ?>

                          <?php  
                        $role=$_SESSION["role"];
                       if($role==="Manager" && $row['status']=="Declined")
					  {
						 ?>
                        <div class="text-center">
                            <form  method="post"  action="ApproveRequest.php?id=<?php echo $requestId ?>">
                                <button class="card-btn approve-btn">Approve </button>
                            </form>
                            </div>
                         <?php						 
					  }
                        ?>


                        

                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="request-hover-text" style="background:#79BDEB; border-radius:3px; height:320px;">
                    <div style="float:right;">
                        <form action="Edit-request.php?id=<?php echo $requestId ?>"> 
                        <?php  
                        $role=$_SESSION["role"];
                       if($role==="Employee")
					  {
						 ?>
                          
                            <br> 			   
                <a href="Edit-request.php?id=<?php echo $requestId ?>" class="edit-btn" > Click to edit </a>
            
                                           
                                                
                                                   
                         <?php						 
					  }
                        ?>
                        </form>
                    </div>
                    <h1 class="display-6" style="color:beige;padding:12px"> <?php echo $row['first_name']. " " . $row['last_name']; ?> </h1>
                    <ul class="request-D">
                        <li style="font-size:16px;" > <?php echo $row['description']; ?> </li>
                    </ul> <br /> <br/>
                   
				   <?php 
				   $ext = pathinfo($row['attachment1'], PATHINFO_EXTENSION);
					   $ext1 = trim($ext);
					 if($ext1=="pdf")
					  {
						 ?>
						   <a  style="color:lightgrey; font-size:17px; padding-left:10px;" href="<?php echo $row['attachment1'] ?>" download>Click to Download Attachment</a>
                         <?php						 
					  }
				     if ($ext1!=="" && $ext1!=="pdf")
                      {
						  ?>
						    <img src="<?php echo $row['attachment1'] ?>" alt="Image not Found" width="104" height="142">
						 <?php 
					  }
				   ?>
				  
				   <?php 
				   $ext3 = pathinfo($row['attachment2'], PATHINFO_EXTENSION);
					   $ext2 = trim($ext3);
					 if($ext2=="pdf")
					  {
						 ?>
						   <a  style="color:lightgrey; font-size:17px; padding-left:10px;" href="<?php echo $row['attachment2'] ?>" download>Click to Download Attachment</a>
                         <?php						 
					  }
				     else if ($ext2!=="" && $ext2!=="pdf")
                      {
                       
						  ?>
						    <img src="<?php echo $row['attachment2'] ?>" alt="Image not Found" width="104" height="142">
						 <?php 
					  }
				   ?>
				  
                </div>
            </div>
        </div>
    </div>
                          <?php   }
                          }
                          
                            ?>
                     
            
                
                <div class="row">
        <div class="col-md-12">
            <footer class="stickyfooter" style="margin-top: 230px;"> Copyright 2022 - Tech MS ALL Rights Reserved </footer>
        </div>
    </div>
</body>
</html>

   
                       