
<?php 
include("db-connect.php");  



    $id= $_GET['id'];
    $sq = "UPDATE request SET status='Approved' WHERE id=$id";
    mysqli_query($connection, $sq);
    if (mysqli_query($connection, $sq)){
       // rdi('Manager.php');
        echo 1;
    }
    else {
        echo 'Fail to Approve the request'. mysqli_query($connection, $sq);
    }

    ?>
