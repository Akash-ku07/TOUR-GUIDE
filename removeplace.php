<?php
include('eguideheader.php');

$query="SELECT * FROM place";
$result=mysqli_query($con,$query);
$count = mysqli_num_rows($result);


if($count!=0)
{
    echo"<br><h3><center>YOU HAVE $count PLACES LISTED IN YOUR WEBSITE</center></h3>";

?>

<?php
if($count!=0)
{
?>



<div class="container col-md-6 border border-danger rounded pt-5 pb-5 pr-5 pl-5">
<center><h5>REMOVE PLACE</h5></center><br>
<form  action="" method="POST">
<label for="guideid">Enter Place ID:</label>
<input type="text" id="placeid" name="placeid" required  class="form-control" value=""><br>
<button type="submit" class="btn btn-danger" value="submit" name="decline">REMOVE</button>
</form>
</div>

<?php
if(isset($_POST['decline']))
{
$placeid=$_POST['placeid'];
$querydelete="DELETE from place where placeno='$placeid'";
mysqli_query($con,$querydelete);
header("Location:removeplace.php");
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
          <th>IMAGE</th>
          <th>PLACENAME</th>        
          <th>PLACE ID</th>
          
          <th>BEST TIME TO VISIT</th>
          <th>TOURIST ATTRACTIONS</th>
          
          <th>WEATHER</th>
          
          
          </tr>
    <?php
    while($row = mysqli_fetch_assoc($result))
    {
        
        $image=$row['image'];
        
        ?>
        <tr>
        <td><img src='uploads/<?php echo $image ?>'  height='200px' width='200px'></td>
            <td><?php echo $row['placename']?></td>
            <td><?php echo $row['placeno']?></td>
            
            <td><?php echo $row['btv']?></td>
           
            <td><?php echo $row['nrs']?></td>
            <td><?php echo $row['weather']?></td>
           </tr>
        <?php
        
    }
    ?>
    </table>
    <BR><BR>


<br>
<br>
<?php
}
else{
    echo"<h3><center>NO PLACES LISTED TO REMOVE</center></h3>";
   
}
?>

</body>
</html>