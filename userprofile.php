<?php
include('eguideheader.php');
$userid=$_SESSION["uid"];


$sql = "select * from user where id = '$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
if ($count == 1)
{
   $phoneno=$row["phoneno"];
   $pwd=$row["pwd"];
   $username=$row["username"];
$email=$row["email"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><BR>

    <h3><center>MY PROFILE</center></h3><BR>
    <div class="container">
    <div class="row " >
    <div class="col-md-2">&nbsp</div>
    <div class="col-md-8 border border-secondary rounded pt-3 pb-3 pr-3 pl-3">
    <h4>USER ID:<?PHP echo $userid;?><h4>
        <h4>USER NAME:<?PHP echo $username;?><h4><BR>
        <h6>PHONE NUMBER:<?PHP echo $phoneno;?></h6><BR>
        <h6>EMAIL:<?PHP echo $email;?></h6><BR>

        <h6>PASSWORD:<?PHP echo $pwd;?></h6><BR>
        <form action="edituserprofile.php" method="POST">
            
             <CENTER> <button type="submit" class="btn btn-success " name="edit">EDIT PROFILE</button></CENTER>
              </form>

    </div>
    <div class="col-md-2">&nbsp</div>

</div>
</div>
<?php


$getbooking="SELECT * FROM bookinglisted WHERE userid='$userid'";
$result3=mysqli_query($con,$getbooking);
$countlisted = mysqli_num_rows($result3);

$getbooking2="SELECT * FROM bookingnotlisted WHERE userid='$userid'";
$result4=mysqli_query($con,$getbooking2);
$countnotlisted = mysqli_num_rows($result4);
?>

<br>
<br>

<?php
if($countlisted>0)
{
?>
<hr> 
<br>
<center><h3><u>MY BOOKINGS</u></h3></center><br>
<div class="container">
       
    <div class="row" >
      <div class="col-md-12 border border-secondary rounded pt-3 pb-3 pr-1 pl-1">
      <h3>CURRENT BOOKINGS:APPROVED BY GUIDE</h3><br>
<table align="center" border="2px" style="width:1125px; line-height:50px;">
    <tr>
          <th>BOOKING ID</th>        
         
          <th>PLACE NAME</th>
          <th>GUIDE NAME</th>
          
          <th>ARRIVAL DATE</th>
          <th>ARRIVAL TIME</th>
          <th>DEPARTURE DATE</th>
          <th>DEPARTURE TIME</th>
          </tr>
    <?php
    while($row = mysqli_fetch_assoc($result3))
    {
        ?>
        <tr>
        
            <td><?php echo $row['bookingid']?></td>
           
            <td><?php echo $row['placename']?></td>
            <td><?php echo $row['guidename']?></td>
           
            <td><?php echo $row['ad']?></td>
            <td><?php echo $row['at']?></td>
            <td><?php echo $row['dd']?></td>
            <td><?php echo $row['dt']?></td>
           </tr>
        <?php
        
    }
    
    ?>
    </table>
    <BR><BR>
    </div>
    
</div>
</div>
<?php
}

if($countnotlisted>0)
{
?>
<br>

<div class="container">
       
    <div class="row" >
      <div class="col-md-12 border border-secondary rounded pt-3 pb-3 pr-1 pl-1">
      <h3><?php echo $countnotlisted ?> BOOKING WAITING FOR APPROVAL FROM GUIDE</h3><br>
<table align="center" border="2px" style="width:1125px; line-height:50px;">
    <tr>
          <th>BOOKING ID</th>        
          
          
          <th>PLACE NAME</th>
          <th>GUIDE NAME</th>
          
          
          <th>ARRIVAL DATE</th>
          <th>ARRIVAL TIME</th>
          <th>DEPARTURE DATE</th>
          <th>DEPARTURE TIME</th>
          </tr>
    <?php
    while($rowx = mysqli_fetch_assoc($result4))
    {
        ?>
        <tr>
        
            <td><?php echo $rowx['bookingid']?></td>
           
            <td><?php echo $rowx['placename']?></td>
            <td><?php echo $rowx['guidename']?></td>
            
            <td><?php echo $rowx['ad']?></td>
            <td><?php echo $rowx['at']?></td>
            <td><?php echo $rowx['dd']?></td>
            <td><?php echo $rowx['dt']?></td>
           </tr>
        <?php
        
    }
    
    ?>
    </table>
    <BR><BR>
    </div>
    <?php
}
elseif($countlisted==0 && $countnotlisted==0)
{
    ?>
    </div>
</div>
    <div class="container">
<div class="container col-md-12 border border-secondary rounded pt-3 pb-3 pr-1 pl-1">
    <center><h3>YOU HAVE NO BOOKINGS TO SHOW</h3></center><br>
</div>
</div>
    <?php
}
?>



<br>
</body>
</html>