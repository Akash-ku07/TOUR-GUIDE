<?php
include('eguideheader.php');

$query="SELECT * FROM user where admin='0'and pwd!=''";
$result=mysqli_query($con,$query);
$count= mysqli_num_rows($result);


if($count!=0)
{
    echo"<br><h3><center>YOU HAVE $count USERS LISTED IN YOUR WEBSITE</center></h3>";

?>

<br>

<br>
<?php
if($count!=0)
{
?>







<?php
if(isset($_POST['decline']))
{
$userid=$_POST['userid'];
$querydelete="DELETE from user where id='$userid'";
mysqli_query($con,$querydelete);
header("Location:removeusers.php");
}
}
?>
<br>

<br>


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
          <th>USER ID</th>
          <th>USERNAME</th>        
          <th>PHONE NUMBER </th>
          <th>EMAIL</th>
          <th>PASSWORD</th>
           </tr>
    <?php
    while($row = mysqli_fetch_assoc($result))
    {
    ?>
        <tr>
       
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['phoneno']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['pwd']?></td>
           </tr>
        <?php
        
    }
    ?>
    </table>
    <BR><BR>
    <div class="container col-md-6 border border-danger rounded pt-5 pb-5 pr-5 pl-5">
<center><h5>REMOVE USER</h5></center><br>
<form  action="" method="POST">
<label for="guideid">Enter USER ID:</label>
<input type="text" id="userid" name="userid" required class="form-control" value=""><br>
<button type="submit" class="btn btn-danger" value="submit" name="decline">REMOVE</button>
</form>
</div>

<br>
<br>
<?php
}
else{
    echo"<h3><center>NO USERS AVAILABLE</center></h3>";
   
}
?>

</body>
</html>