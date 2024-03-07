<?php
include('eguideheader.php');
$guideid= $_SESSION["uid"];
$query="SELECT  * FROM bookingnotlisted WHERE guideid='$guideid'";
$result=mysqli_query($con,$query);
$count = mysqli_num_rows($result);
if($count==0)
{
    echo"<h3><center>NO NEW REQUESTS</center></h3>";
}
else{
    echo"<h3><center>YOU HAVE $count NEW REQUESTS</center></h3>";
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
<body>
    <br>
    <br>
    <table align="center" border="2px" style="width:1125px; line-height:50px;">
    <tr>
          <th>BOOKING ID</th>        
          <th>PLACE ID</th>
          <th>GUIDE ID</th>
          <th>PLACE NAME</th>
          <th>GUIDE NAME</th>
          <th>USER ID</th>
          <th>USER'S NAME</th>
          <th>ARRIVAL DATE</th>
          <th>ARRIVAL TIME</th>
          <th>DEPARTURE DATE</th>
          <th>DEPARTURE TIME</th>
          </tr>
    <?php
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
        
            <td><?php echo $row['bookingid']?></td>
            <td><?php echo $row['placeid']?></td>
            <td><?php echo $row['guideid']?></td>
            <td><?php echo $row['placename']?></td>
            <td><?php echo $row['guidename']?></td>
            <td><?php echo $row['userid']?></td>
            <td><?php echo $row['username']?></td>
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
    <?php
    if($count!=0)
    {
?>
  
    <div class="row " >
        <div class="container col-md-4 border border-success rounded pt-5 pb-5 pr-5 pl-5">
            <center><h5>APPROVE BOOKING</h5></center><br>
            <form  action="" method="POST">
   <label for="bookingid">ENTER BOOKING ID:</label>
  <input type="text" id="bookingid" name="bookingid"  class="form-control" value=""><br>
  
            
<button type="submit" class="btn btn-success" value="submit" name="approve">APPROVE</button>
</form>
<?php
$log=$_SESSION["log"];

if(isset($_POST['approve']))
        {
            $bookingid=$_POST['bookingid'];
            $queryretreive="SELECT * from bookingnotlisted WHERE bookingid='$bookingid'";
          
            $result1 = mysqli_query($con,$queryretreive);
            $row1 = mysqli_fetch_assoc($result1);
            $countx = mysqli_num_rows($result1);

            $bookingid=$row1['bookingid'];
            $placeid=$row1['placeid'];
            $guideid=$row1['guideid'];
            $placename=$row1['placename'];
            $guidename=$row1['guidename'];
            $userid=$row1['userid'];
            $username=$row1['username'];
            $guidephoneno=$row1['guidephoneno'];
            $guideemail=$row1['guideemail'];
            $ad=$row1['ad'];
            $at=$row1['at'];
            $dd=$row1['dd'];
            $dt=$row1['dt'];
            
            echo $bookingid;

            

            $queryinsert="INSERT into bookinglisted (bookingid,placeid,guideid,placename,guidename,userid,username,guidephno,guideemail,ad,at,dd,dt) 
            values ('$bookingid','$placeid','$guideid','$placename','$guidename','$userid','$username','$guidephno','$guideemail','$ad','$at','$dd','$dt')"; 
            $answer=mysqli_query($con,$queryinsert);

            

if($answer==1)
{
$querydelete="DELETE from bookingnotlisted where bookingid='$bookingid'";
mysqli_query($con,$querydelete);
header("Location:bookingverification.php");
}
 }

?>
</div>

        <div class="container col-md-4 border border-danger rounded pt-5 pb-5 pr-5 pl-5">
        <center><h5>DECLINE BOOKING </h5></center><br>
        <form  action="" method="POST">
        <label for="bookingid">ENTER BOOKING ID:</label>
  <input type="text" id="bookingid" name="bookingid"  class="form-control" value=""><br>
  <button type="submit" class="btn btn-danger" value="submit" name="decline">DECLINE</button>
    </form>
    <?php
    if(isset($_POST['decline']))
 {
    $bookingid=$_POST['bookingid'];
    $querydelete="DELETE from bookingnotlisted where bookingid='$bookingid'";
    mysqli_query($con,$querydelete);
   header("Location:bookingverification.php");
 }
 ?>
        </div>
</div>
<?php
    }
    ?>
    <br><br>
</body>
</html>


 