<?php
include('eguideheader.php');

//$stat=0;
//$stat=$_GET['stat'];


$query="SELECT * FROM guidenotlisted";
$result=mysqli_query($con,$query);
$count = mysqli_num_rows($result);

if(isset($stat))
{
   
if($stat==1)
{
    echo '<div class="alert alert-success">
       <span>GUIDE APPROVAL COMPLETED SUCCESSFULLY</span><br>
        </div>';
}
elseif($stat==2)
{
    echo '<div class="alert alert-danger">
    <span>GUIDE VERIFICATION DECLINED SUCCESSFULLY</span><br>
     </div>';
}
}

if($count==0)
{
    echo"<br><h3><center>NO NEW REQUESTS</center></h3>";
}
else{
    echo"<br><h3><center>YOU HAVE $count NEW REQUESTS</center></h3>";
}
?>






<?php

if(isset($_POST['approve']))
        {
            $stat=1;
            $guideid=$_POST['guideid'];
            $queryretreive="SELECT * from guidenotlisted WHERE id='$guideid'";
          
            $result1 = mysqli_query($con,$queryretreive);
            $row1 = mysqli_fetch_assoc($result1);
            $count = mysqli_num_rows($result1);

            $guideid=$row1['id'];
            $guidename=$row1['guidename'];
            $phoneno=$row1['phoneno'];
            $email=$row1['email'];
            $pwd=$row1['pwd'];
            $placeno=$row1['placeno'];
            $gender=$row1['gender'];
            $firstlanguage=$row1['firstlanguage'];
            $secondlanguage=$row1['secondlanguage'];
            $yoe=$row1['yoe'];
            $about=$row1['about'];
            $image=$row1['image'];
            $age=$row1['age'];
            $price=$row1['price'];

            

            $queryinsert="INSERT into guidelisted (guideid,placeid,guidename,phoneno,email,pwd,gender,firstlanguage,secondlanguage,yoe,about,image,age,price)
            VALUES ('$guideid','$placeno','$guidename','$phoneno','$email','$pwd','$gender','$firstlanguage','$secondlanguage','$yoe','$about','$image','$age','$price')"; 
            $answer=mysqli_query($con,$queryinsert);

            

if($answer==1)
{
$querydelete="DELETE from guidenotlisted where id='$guideid'";
mysqli_query($con,$querydelete);
header("Location:guiderequests.php?stat=$stat");
}
 }

?>
<?php
    if(isset($_POST['decline']))
 {
    $stat=2;
    $guideid=$_POST['guideid'];
    $querydelete="DELETE from guidenotlisted where id='$guideid'";
    mysqli_query($con,$querydelete);
    header("Location:guiderequests.php?stat=$stat ");
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
    
    <table align="center" border="2px" style="width:1125px; line-height:50px;">
    <tr>
<th>ID</th>        
          <th>NAME</th>
          <th>PHONE_NO</th>
          <th>EMAIL</th>
          <th>PLACE NO</th>
          <th>GENDER</th>
          <th>FIRST_LANGUAGE</th>
          <th>SECOND_LANGUAGE</th>
          <th>EXPERIENCE</th>
          <th>AGE</th>
          <th>PRICE</th>
          </tr>
    <?php
    while($row = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
        <td><?php echo $row['id']?></td>
            <td><?php echo $row['guidename']?></td>
            <td><?php echo $row['phoneno']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['placeno']?></td>
            <td><?php echo $row['gender']?></td>
            <td><?php echo $row['firstlanguage']?></td>
            <td><?php echo $row['secondlanguage']?></td>
            <td><?php echo $row['yoe']?></td>
            <td><?php echo $row['age']?></td>
            <td><?php echo $row['price']?></td>
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
            <center><h5>APPROVE GUIDE REQUEST</h5></center><br>
            <form  action="" method="POST">
   <label for="guideid">Enter Guide ID:</label>
  <input type="text" id="guideid" name="guideid"  class="form-control" value=""><br>
  
            
<button type="submit" class="btn btn-success" value="submit" name="approve">APPROVE</button>
</form>

</div>

        <div class="container col-md-4 border border-danger rounded pt-5 pb-5 pr-5 pl-5">
        <center><h5>DECLINE GUIDE REQUEST</h5></center><br>
        <form  action="" method="POST">
        <label for="guideid">Enter Guide ID:</label>
  <input type="text" id="guideid" name="guideid"  class="form-control" value=""><br>
  <button type="submit" class="btn btn-danger" value="submit" name="decline">DECLINE</button>
    </form>
    
        </div>
</div>
<?php
    }
    ?>
</body>
</html>


 