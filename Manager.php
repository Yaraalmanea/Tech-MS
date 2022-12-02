<?php

include("session.php");
include("db-connect.php");


if($_SESSION["role"]==="Employee"){
    header("location: Employee.php");
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Tech MS </title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    </head>
    
    <body> 
        
        <?php  
        if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $sql1 = "SELECT * FROM `Manager` WHERE id='$id'";
        $result1 = mysqli_query($connection, $sql1) ;
        $row = mysqli_fetch_assoc($result1); }
        ?>
        
        <header>
        <div class="header" >
            <div class="small-logo">
                <img style="max-width: 55px;" src="images/logo.png" />
            </div>
        <div class="left">
        <div class="title"> 
        <h1>  Welcome <?php echo $_SESSION['username']; ?> ! </h1> </div>
    </div>
        <div class="right">
       <a href="Logout.php"><input type="button" class="signout-btn" value="Sign out"></a>
        </div>
    </div> 
        </header>
        <main>
<div class="content">


    
    
<!-- PROMOTION  -->
<table class="center">
<caption> <strong> Requests </strong></caption>
<thead>
<tr><th  style="background: #263d4b;;" colspan="4">PROMOTION</th></tr>
<tr><th style="background: #3c515f;;" colspan="2">Request</th>
<th style="background: #3c515f;;" colspan="2">Status</th></tr>
</thead>
<tbody>

    <?php                 
    $sql2="SELECT * FROM `request` WHERE service_id='1' ORDER BY status='In Progress' DESC";
    $result2 = $connection->query($sql2);
    while($row= mysqli_fetch_array($result2)){
    $emps = $row['emp_id'];
    $reqID = $row['id'];
    $sql3="SELECT * FROM `employee` WHERE id='$emps'";
    $result3 = $connection->query($sql3); 
    $row3= mysqli_fetch_array($result3);
    ?>

<?php if ($row['status']=='Approved') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php  echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>

<td colspan="2"><a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr> <?php } ?>


    
<?php if ($row['status']=='In Progress') { ?>
<tr style="background: #a2a2a2">
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>

<td colspan="2">
    <a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a> <span class="divider">|</span> 
    <a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>

    


<?php if ($row['status']=='Declined') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2"><a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>





<!-- ALLOWANCE  -->
<table class="center">
<thead>
<tr><th  style="background: #263d4b;;" colspan="4">ALLOWANCE</th></tr>
<tr><th style="background: #3c515f;;" colspan="2">Request</th>
<th style="background: #3c515f;;" colspan="2">Status</th></tr>
</thead>
<tbody>

    
<?php                 
$sql2="SELECT * FROM `request` WHERE service_id='2' ORDER BY status='In Progress' DESC";
$result2 = $connection->query($sql2);

while($row= mysqli_fetch_array($result2)){
$emps = $row['emp_id'];
$reqID = $row['id'];

$sql3="SELECT * FROM `employee` WHERE id='$emps'";
$result3 = $connection->query($sql3); 
$row3= mysqli_fetch_array($result3);
?>

    
    
<?php if ($row['status']=='Approved') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2"><a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>





<?php if ($row['status']=='In Progress') { ?>
<tr style="background: #a2a2a2">
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2">
    <a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a> <span class="divider">|</span> 
    <a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>





<?php if ($row['status']=='Declined') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2"><a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>






<!-- RESIGNATION  -->
<table class="center">
<thead>
<tr><th  style="background: #263d4b;;" colspan="4">RESIGNATION </th></tr>
<tr><th style="background: #3c515f;;" colspan="2">Request</th>
<th style="background: #3c515f;;" colspan="2">Status</th></tr>
</thead>
<tbody>

    
<?php                 
$sql2="SELECT * FROM `request` WHERE service_id='3' ORDER BY status='In Progress' DESC";
$result2 = $connection->query($sql2);


foreach ($result2 as $key => $row) {
$emps = $row['emp_id'];
$reqID = $row['id'];

$sql3="SELECT * FROM `employee` WHERE id='$emps'";
$result3 = $connection->query($sql3); 
$row3= mysqli_fetch_array($result3);
?>

    
    
<?php if ($row['status']=='Approved') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?> 
</a>
</td>
<td colspan="2"><a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>






<?php if ($row['status']=='In Progress') { ?>
<tr style="background: #a2a2a2">
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>"  href="Request-info.php?id=<?php echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2">
    <a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a> <span class="divider">|</span>
    <a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>






<?php if ($row['status']=='Declined') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2"><a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>





<!-- LEAVE   -->
<table class="center">
<thead>
<tr><th  style="background: #263d4b;;" colspan="4">LEAVE</th></tr>
<tr><th style="background: #3c515f;;" colspan="2">Request</th>
<th style="background: #3c515f;;" colspan="2">Status</th></tr>
</thead>
<tbody>

    
<?php                 
$sql2="SELECT * FROM `request` WHERE service_id='4' ORDER BY status='In Progress' DESC";
$result2 = $connection->query($sql2);


while($row= mysqli_fetch_array($result2)){
$emps = $row['emp_id'];
$reqID = $row['id'];

$sql3="SELECT * FROM `employee` WHERE id='$emps'";
$result3 = $connection->query($sql3); 
$row3= mysqli_fetch_array($result3);
?>


    
    
<?php if ($row['status']=='Approved') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2"><a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>



<?php if ($row['status']=='In Progress') { ?>
<tr style="background: #a2a2a2">
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2">
    <a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a> <span class="divider">|</span> 
    <a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>




<?php if ($row['status']=='Declined') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2"><a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>




<!-- HEALTH INSURANCE   -->
<table class="center">
<thead>
<tr><th  style="background: #263d4b;;" colspan="4">HEALTH INSURANCE</th></tr>
<tr><th style="background: #3c515f;;" colspan="2">Request</th>
<th style="background: #3c515f;;" colspan="2">Status</th></tr>
</thead>
<tbody>

<?php                 
$sql2="SELECT * FROM `request` WHERE service_id='5' ORDER BY status='In Progress' DESC";
$result2 = $connection->query($sql2);

while($row= mysqli_fetch_array($result2)){
$emps = $row['emp_id'];
$reqID = $row['id'];

$sql3="SELECT * FROM `employee` WHERE id='$emps'";
$result3 = $connection->query($sql3); 
$row3= mysqli_fetch_array($result3);
?>


    
<?php if ($row['status']=='Approved') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2"><a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a></td>
<td class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>


    
    
<?php if ($row['status']=='In Progress') { ?>
<tr style="background: #a2a2a2">
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2">
<a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a> <span class="divider">|</span> 
<a class="decline" href="decline.php?id=<?php echo $row['id']?>">Decline</a>
</td>
<td class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>





<?php if ($row['status']=='Declined') { ?>
<tr>
<td>
<a class="reqinfo" data-id="<?php  echo $reqID; ?>" href="Request-info.php?id=<?php  echo $reqID; ?> " >
    <?php echo $reqID ."-".$row3['first_name'].' '.$row3['last_name'];?>
</a>
</td>
<td colspan="2"><a class="approve" href="approve.php?id=<?php echo $row['id']?>">Approve</a></td>
<td  class="status" colspan="2"><?php echo $row['status']?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>



</div> 
</main>




        <div class="footer"></div>
        <footer class="stickyfooter"> Copyright 2022 - Tech MS ALL Rights Reserved </footer>
        
        <div id="tooltip"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
        
        <script>
        
            $(function(){

            var tooltipSpan= $('#tooltip');
              
             //get request id from data-id attribute
             $(".reqinfo").mouseenter (function (e) {
           
                var thisId= $(this).attr('data-id');
                
                 // add delay to open tooltip; to avoid mouse over accidantally.
                // user should be able to keep mouse over for more than 500ms to view tooltip.
                
                setTimeout(function(){
                    
                    $.ajax ({
                       
                       data:'id='+ thisId,
                       dataType:'json',
                       url:'Request-info-ajax.php',
                      
                       //add description to tooltip  
                       success:function(data) {
                          tooltipSpan.html(data.description);
                          tooltipSpan.show(); }
                        
                        }) 
                        
               //get mouse position
                  var x = e.pageX;
                  var y = e.pageY;
                
              //set tooltip style top and left   
                  tooltipSpan.css( { top: y + 'px', left: x + 'px' } );

                     } , 500);

                } ) .mouseleave(function() { 
                     tooltipSpan.hide();   } );


            //prevent default event ( disable link click )  
            $( document ).on('click',".decline",function(e) {
            e.preventDefault();

                var ths= $(this);
                    
                    $.ajax( {
                        dataType:'json',
                        url: ths.attr('href'),
                        
                        //update decline.php to approve.php in href  
                        success:function(data){
                          
                            var newurl = ths.attr('href').replace('decline','approve');
                            ths.attr('href',newurl);

                            
                            //get parent <tr> to find status tab inside it and change status
                            var parentTR = ths.closest('tr')
                            $('.status',parentTR).html('Declined')
        
                            //remove if both have approve <span class="divider">|</span> decline
                            $('.approve',parentTR).remove()
                            $('.divider',parentTR).remove()
        
                            //set html to Approve
                            ths.html('Approve');

                            //switch class
                            ths.removeClass('decline');
                            ths.addClass('approve');
                           
                            } 
                            
                     } ) 
            } );

            
            //prevent default event ( disable link click ) 
            $( document ).on('click',".approve",function(e) {
            e.preventDefault();
           
                var ths=$(this);
                
                    $.ajax( {
                        dataType:'json',
                        url:ths.attr('href'),
                        
                        //update approve.php to decline.php in href 
                        success:function(data){
                          
                            var newurl = ths.attr('href').replace('approve','decline');
                            ths.attr('href',newurl);

                            
                            //get the parent <tr> to find status tab inside it and change status
                            var parentTR = ths.closest('tr')
                            $('.status',parentTR).html('Approved')


                            //remove if both have approve <span class="divider">|</span> decline
                            $('.decline',parentTR).remove()
                            $('.divider',parentTR).remove()


                            //set html to Approve
                            ths.html('Decline');

                            //switch class
                            ths.removeClass('approve');
                            ths.addClass('decline');

                           
                            } 
                            
                     } ) 
            } );
            
            
            
         } );

        </script>

        
    </body>
    </html>
    
    
    
    
    
    
    
    
    
    
