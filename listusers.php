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