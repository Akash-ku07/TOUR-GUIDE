<?php
include('eguideheader.php');

$placeno=$_GET['placeid'];


$query="SELECT * from place where placeno='$placeno'";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if($count!=0)
{
    //$placeno
    $placename=$row['placename'];
    $placedescription=$row['placedescription'];
    $placeno=$row['placeno'];
    $btv=$row['btv'];
    $touristattractions=$row['touristattractions'];
    $nrs=$row['nrs'];
    $weather=$row['weather'];
    $image=$row['image'];
}
else{
    echo "error in loading data";
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
<div class="container border border-secondary rounded pt-5 pb-5 pr-5 pl-5" >
    
      <div class="row">
      <div><h2><u><?php echo "$placename" ?></u></h2></div>

         <div class="col-md-12">
            <br>
         <img  src="uploads/<?php echo"$image" ?>" height="350px" width="600px"><br>
         </div>
         
         <div class="col-md-12">
         <br>
         <label style="color:#E359F6;">DESCRIPTION:</label>
         <label><?php echo "$placedescription" ?></label>
         </div>
         <div class="col-md-12">
         <label style="color:#95EC2C;">BEST TIME TO VISIT:</label><br>
         <label><?php echo "$btv" ?></label>
         </div>
         <div class="col-md-12">
         <label style="color:#FD6C5D">TOURIST ATTRACTIONS:</label>
         <label><?php echo "$touristattractions" ?></label>
         </div>
         <div class="col-md-12">
         <label style="color:#4D6AFB ">NEAREST RAILWAY STATION:</label><br>
         <label><?php echo "$nrs" ?></label>
         </div>
         <div class="col-md-12">
         <label style="color:#F1C40F ;">WEATHER:</label><br>
         <label><?php echo "$weather" ?></label>
         </div>
         <BR>
         <BR>
        </div>
        <hr>
        
        <div class="border border-secondary rounded pt-5 pb-5 pr-5 pl-5">
            <h2>Guides Available in <?PHP echo "$placename" ?>:</h2><br>
            <hr>
            
        <?php
       








        $guidemagnet="SELECT * FROM `guidelisted` WHERE placeid='$placeno'";
        $guideresult=mysqli_query($con,$guidemagnet);
        
        $guidecount= mysqli_num_rows($guideresult);
        if($guidecount!=0)
        {
            while($guiderow = mysqli_fetch_assoc($guideresult))
            {
                $guideimage=$guiderow['image'];
                $guidename=$guiderow['guidename'];
                $price=$guiderow['price'];
                $guideid=$guiderow['guideid'];
                ?>
           
          
           <div class="row">
               <div class='col-md-3 border border-secondary rounded pt-3 mr-2'>
              <img style="align:center;" src="uploads/<?php echo"$guideimage" ?>" height="250px" width="200px" ><br><br>
              <h4 class="text-dark"><?php echo"$guidename" ?></h4>
              <h5 class="text-dark">Rs.<?php echo"$price" ?>/hr</h5>
              <br>
             
             
              <a href='guideexpand.php?guideid= <?php echo $guideid ?> '>
              <center><button type="" class="btn btn-warning" value="" name="">VIEW PROFILE</button></center></a><br>
              <?php if(isset($_SESSION["log"])) { if( $_SESSION["log"] == 1) 
              { ?>
              <a href='booking.php?guideid= <?php echo $guideid ?> '>
              <center><button type="" class="btn btn-warning" value="" name="">BOOK GUIDE</button></center></a><br>
              <?php } } ?>
              
              </div>
       
            </a> </div><hr>
           
               <?php
              
        }

?>
<br>
<br>
            <?php
        }
        else
        { 
            ?>
            
           <br>
           
           <h3 class="text-center">Sorry,No Guides Available for this destination right now!</h3>
           <br>
           <br> 
           </div>
           <?php
        }
        ?>

</div>
       



</body>
</html>