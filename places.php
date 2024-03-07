<?php
include('eguideheader.php');

$query="SELECT * FROM place";
$result=mysqli_query($con,$query);

$count = mysqli_num_rows($result);


if($count!=0)
{
    echo"<br><h3><center>WELCOME,$count DESTINATIONS AVAILABLE</center></h3>";

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
    <div class="container ">
        <div class="row">
 <?php
     while($row = mysqli_fetch_assoc($result))
        {
            $image=$row['image'];
            $placename=$row['placename'];
            $placeid=$row['placeno'];
           
            ?>
           
          
           <a href='placeexpand.php?placeid= <?php echo $placeid ?> '>
               <div class='col-md-4 border border-secondary rounded pt-5 pb-5 pr-5 pl-5 '>
              <img  src="uploads/<?php echo"$image" ?>" height="200px" width="300px" ><br>
              <h4 class='text-center'><?php echo"$placename" ?></h4>
       
            </a> </div>
           
               <?php
              
        }

?>
    
    </div>
    </div>
    
<?php
}
   
else
{
    echo"<h3><center>NO PLACES LISTED</center></h3>";
}
?>
 <br>
               <br>
</body>
</html>

