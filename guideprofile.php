<?php
include('eguideheader.php');

$guideid=$_SESSION["uid"];
$guidename=$_SESSION["name"];
$guideemail=$_SESSION["email"];

//$guideid=$_SESSION["uid"];
//$guideplaceno= $_SESSION["placeid"];


$query="SELECT * from guidelisted where guidename='$guidename' And email='$guideemail'";
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
    $phoneno=$row['phoneno'];
    $password=$row['pwd'];

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
                                        <label>Password:</label>
                                        <p><?php echo "$password    " ?></p>
                                    </div>
                                <div class="media">
                                        <label>Email:</label>
                                        <p><?php echo "$guideemail" ?></p>
                                    </div>
                                <div class="media">
                                        <label>Phone number:</label>
                                        <p><?php echo "$phoneno" ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Age:</label>
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
       
             <br>
              <form action="" method="POST">
              <center><button type="submit" class="btn btn-success " name="submit">EDIT PROFILE</button></center>
              </form>
              <hr>
              <br>
             
              <?php
              $getbooking="SELECT * FROM bookinglisted WHERE guideid='$guideid'";
$result=mysqli_query($con,$getbooking);
$countlisted = mysqli_num_rows($result);

if($countlisted>0)
{
?>
<h3>ACTIVE BOOKINGS:</h3>
<hr> 
<br>

<div class="container">
       
    <div class="row" >
      
      
<table align="center" border="2px" style="width:1000px; line-height:50px;">
    <tr>
          <th>BOOKING ID</th>        
         
          <th>PLACE NAME</th>
          <th>GUIDE NAME</th>
          <th>USER NAME</th>
          <th>USER ID</th>
          
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
           
            <td><?php echo $row['placename']?></td>
            <td><?php echo $row['guidename']?></td>
            <td><?php echo $row['username']?></td>
            <td><?php echo $row['userid']?></td>
           
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

<?php
}
elseif($countlisted==0)
{ ?>
    <center><h4>YOU HAVE NO ACTIVE BOOKINGS</h4></center>
    <?php
}
?>
             
</div>
<br><br><br>
</body>
</html>