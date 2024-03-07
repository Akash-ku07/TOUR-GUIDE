<?php
include('eguideheader.php');

$status=2;
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
    $guidephno=$row['phoneno'];
    $guideemail=$row['email'];

    $placename0="SELECT placename from place where placeno='$placeid'";
$placename1= mysqli_query ($con,$placename0);
$placerow = mysqli_fetch_assoc($placename1);

$placename=$placerow['placename'];


}
else{
    echo "error in loading data";
}
?>
<?php
$userid=$_SESSION["uid"];
$username=$_SESSION["name"];
if(isset($_POST['book']))
{
    $ad=$_POST['arrivaldate'];
    $at=$_POST['arrivaltime'];
    $dd=$_POST['departuredate'];
    $dt=$_POST['departuretime'];

$boookingredirect="INSERT into bookingnotlisted (placeid,guideid,placename,guidename,userid,username,guidephno,guideemail,ad,at,dd,dt) 
values ('$placeid','$guideid','$placename','$guidename','$userid','$username','$guidephno','$guideemail','$ad','$at','$dd','$dt')";
mysqli_query($con,$boookingredirect);
$status=1;
}

if($status==1)
{
    echo"<h4><center>____________________________</center></h4>";
    echo"<h4><center>YOUR BOOKING IS SUCCESSFUL</center></h4>";
    echo"<h4><center>PLEASE CHECK FOR CONFIRMATION FROM OUR GUIDE'S SIDE</center></h4>";
    echo"<h4><center>------____________________________ -----</center></h4>";
}
elseif($status==0){
    echo"<h4><center>BOOKING NOT SUCCESSFUL,TRY AGAIN AFTER SOME TIME</center></h4>";
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

<div class="container border border-secondary rounded">
    <br><br>
<h3 class="text-center">GUIDE BOOKING</h3>   
        <div  class="row">
      
            <div class="col-md-4 pl-5" ><BR>
                <img src="images/booking1.jpg " width="310" height="470" class="rounded"></div>
            <div class="col-md-8 pl-5 pr-5 ">
           <br>
           <div class="border border-secondary rounded pl-4 pr-2 pt-3 pb-3">
            <h6>DESTINATION:<?PHP echo $placename?></h6>
            <h6>GUIDE NAME:<?PHP echo $guidename?></h6>
            <h6>PRICE PER HOUR:Rs.<?PHP echo $price?></h6>
            
           </div>
           <br>
<form action="" method="POST" >
   

  <label for="place name">ARRIVAL DATE:</label>
    <input type="date" id="arrivaldate" name="arrivaldate" class="form-control" value="">
    
    <label for="place name">ARRIVAL TIME:</label>
    <input type="time" id="arrivaltime" name="arrivaltime" class="form-control" value=""><br><br>
    <label for="placenumber">DEPARTURE DATE:</label>

    <input type="DATE" id="departuredate" name="departuredate"  class="form-control" value="">
    
    <label for="placenumber">DEPARTURE TIME:</label>
    <input type="time" id="departuretime" name="departuretime"  class="form-control" value="">

<br>
<br>
</div>
</div>
<center> <button type="submit" class="btn btn-success" onclick="return myFunction()" value="submit" name="book">BOOK GUIDE</button></center>  
  </form> 


<br><br>
<hr>


<script type="text/javascript">
function myFunction() {
    var arrivaldate=document.getElementById('arrivaldate').value     
    if(arrivaldate=='')
    {
        alert("Arrival Date cannot be null")
        return false
    } 
   

    var arrivaltime=document.getElementById('arrivaltime').value           
    if(arrivaltime=='')
    {
        alert("Arrival Date cannot be null")
        return false
    } 

    var departuredate=document.getElementById('departuredate').value            
    if(departuredate=='')
    {
        alert("Departure Date cannot be null")
        return false
    } 
    var departuretime=document.getElementById('departuretime').value                     
    if(departuretime=='')
    {
        alert("Departure Time cannot be null")
        return false
    } 
}
    </script>
</body>
</html>