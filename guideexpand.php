<?php
include('eguideheader.php');

$guideid=$_GET['guideid'];


  

$query="SELECT * from guidelisted where guideid='$guideid'";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if($count!=0)
{
    
    $guidename=$row['guidename'];
    $placeid=$row['placeid'];
    $gender=$row['gender'];
    $age=$row['age'];
    $price=$row['price'];
    $firstlanguage=$row['firstlanguage'];
    $secondlanguage=$row['secondlanguage'];
    $yoe=$row['yoe'];
    $about=$row['about'];
    $image=$row['image'];

    $placename0="SELECT placename from place where placeno='$placeid'";
$placename1= mysqli_query ($con,$placename0);
$placerow = mysqli_fetch_assoc($placename1);

$placename=$placerow['placename'];


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
   
<br><br>
<div  class="container border border-secondary rounded pt-5 pb-5 pr-5 pl-5">
<br>
        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color"><?php echo "$guidename" ?></h3>
                            <h6 class="theme-color lead">A Lead GUIDE in <?php echo "$placename" ?></h6>
                            <p><?php echo "$about" ?></p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                    
                                    <div class="media">
                                        <label>Age</label>
                                        <p><?php echo "$age" ?>yr</p>
                                    </div>
                                    <div class="media">
                                        <label>Mother tongue :</label>
                                        <p><?php echo "$firstlanguage" ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Second Language:</label>
                                        <p><?php echo "$secondlanguage" ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Residence:</label>
                                        <p>India</p>
                                    </div>
                                    
                                
                                
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <center><img  src="uploads/<?php echo"$image" ?>"height="400px" width="300px" ></center>
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                    <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">&nbsp;</h6>
                                <p class="m-0px font-w-600">&nbsp;</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150">&nbsp;</h6>
                                <p class="m-0px font-w-600">&nbsp;</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500">Rs.<?PHP ECHO $price ?></h6>
                                <p class="m-0px font-w-600">PRICE-PER-HOUR</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150"><?PHP ECHO $yoe ?></h6>
                                <p class="m-0px font-w-600">YEARS OF EXPERIENCE</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <?php if(isset($_SESSION["log"])) { if( $_SESSION["log"] == 1) 
              { ?>
              <a href='booking.php?guideid= <?php echo $guideid ?> '>
              <center><button type="" class="btn btn-warning" value="" name="">BOOK GUIDE</button></center></a>
              <?php } } ?>
</div>
<br><br><br>
</body>
</html>