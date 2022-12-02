<?php 
include("db-connect.php"); 




    $id= $_GET['id'];
    $sq = "UPDATE request SET status='Declined' WHERE id=$id";
    mysqli_query($connection, $sq);
    if (mysqli_query($connection, $sq)){
        // hedear("Location : Manager.php");
        // rdi('Manager.php');
        echo 1;
    }
    else {
        echo 'Fail to Decline the request'. mysqli_query($connection, $sq) ;
    }
    
    ?>
