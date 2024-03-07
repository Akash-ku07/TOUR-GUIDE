<?php
include('eguideheader.php');

$query="SELECT * FROM guidelisted";
$result=mysqli_query($con,$query);

$count = mysqli_num_rows($result);
if($count!=0)
{
    echo"<br><h3><center>YOU HAVE $count ACTIVE GUIDES IN YOUR WEBSITE</center></h3>";

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
          <th>ID</th>        
          <th>NAME</th>
          <th>PHONE_NO</th>
          <th>EMAIL</th>
          <th>PLACE ID</th>
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
        <td><?php echo $row['guideid']?></td>
            <td><?php echo $row['guidename']?></td>
            <td><?php echo $row['phoneno']?></td>
            <td><?php echo $row['email']?></td>
            <td><?php echo $row['placeid']?></td>
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
  
  </div>

<div class="container col-md-6 border border-danger rounded pt-5 pb-5 pr-5 pl-5">
<center><h5>REMOVE GUIDE</h5></center><br>
<form  action="" method="POST">
<label for="guideid">Enter Guide ID:</label>
<input type="text" id="guideid" name="guideid" required class="form-control" value=""><br>
<button type="submit" class="btn btn-danger" value="submit" name="decline">REMOVE</button>
</form>

<?php
if(isset($_POST['decline']))
{
$guideid=$_POST['guideid'];
$querydelete="DELETE from guidelisted where guideid='$guideid'";
mysqli_query($con,$querydelete);
header("Location:removeguide.php");
}
    }
?>
</div>
<br>
<br>
<?php
}
else{
    echo"<h3><center>NO GUIDES LISTED TO REMOVE</center></h3>";
   
}
?>

</body>
</html>