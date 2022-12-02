<?php 
include("session.php");
include("db-connect.php");

$requestId= 0;
                    
if(isset($_GET['id']) ) {
 $requestId=$_GET['id'];
                        }
                             
                            
if(isset($_SESSION['request_id']) &&  !isset($_GET['id']) ) {
   $requestId= $_SESSION['request_id'];
                                                            }
                              
                            
$query= "select * FROM Request JOIN Employee on Request.emp_id=Employee.id JOIN Service on Request.service_id=Service.id WHERE Request.id='$requestId'" ;
$result = mysqli_query($connection, $query);
      
   if ( $result ){
         
      $row = mysqli_fetch_array($result);
      $data['description']=$row['description']; 
      echo json_encode($data);      
    }
                          
 
   ?>