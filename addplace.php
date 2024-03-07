<?php
include('eguideheader.php');

$log=$_SESSION["log"];
if($log!=2)
{
    header("Location:index.php");
    echo "<script>window.location = 'index.php'; </script>";
}




    $target_dir="uploads/";
    $status=2;

if(isset($_POST['upload']))     
{   
    $image = $_FILES['placeimage']['name']; 

   

    $placename = mysqli_real_escape_string($con,$_POST['placename']);
    $placeno = mysqli_real_escape_string($con,$_POST['placeno']);
    $placedescription = mysqli_real_escape_string($con,$_POST['placedescription']);
    $btv= mysqli_real_escape_string($con,$_POST['btv']);
    $touristattractions =  mysqli_real_escape_string($con,$_POST['touristattractions']);
    $nrs= mysqli_real_escape_string($con,$_POST['nrs']);
    $weather= mysqli_real_escape_string($con,$_POST['weather']);

    $target = $target_dir.basename($image);

    $sql="INSERT INTO place (placename,placeno,placedescription,btv,touristattractions,nrs,weather,image)
    VALUES (' $placename','$placeno','$placedescription','$btv',' $touristattractions',' $nrs','$weather','$image')";      
   
    if(move_uploaded_file($_FILES['placeimage']['tmp_name'], $target)) 
    {
        mysqli_query($con,$sql) ;
        $status=1;
    }
    else {
        $status=0;
      }
}     
   

   

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Document</title>
    </head>
    <body>

    <?php 
    if($status==1)
    {
        echo '<div class="alert alert-success">
       
          <span>Image has been uploaded succesfully</span><br>
          <span> Place added successful </span>
        </div>';
    }
    elseif($status==0)
    {
        echo '<div class="alert alert-error ">
        
          <span>Error! Failed to upload image.</span>
         </div>';
    }

    ?>


    <div class="container">
        
        <div  class="row">
            <div class="col-md-8">
           
<form action="" method="POST" enctype="multipart/form-data">
    <h3 class="text-center">ADD PLACE</h3>

  <label for="place name">Place name:</label>
  <input type="text" id="placename" name="placename" class="form-control" value="">
 

  <label for="placenumber">placeno:</label>
  <input type="text" id="placeno" name="placeno"  class="form-control" value=""><br>

  
    <label for="Placedescription:">Place description:</label>
    <textarea  type="text" name="placedescription" class="form-control" id="placedescription" value="" rows="4"></textarea>

    <label for="Best Time To Visit">Best Time To Visit:</label>
    <input type="text" id="btv" name="btv"  class="form-control" value=""><br>
  
    <label for="Tourist Attractions">Tourist Attractions:</label>
    <textarea  type="text" name="touristattractions" class="form-control" id="touristattractions" value="" rows="5"></textarea>

    <label for="Nearest Railway Station">Nearest Railway Station:</label>
    <textarea  type="text" name="nrs" class="form-control" id="nrs" value="" rows="2"></textarea><br>

    
<label for="Weather">Weather:</label>
    <textarea  type="text" name="weather" class="form-control" id="weather" value="" rows="1"></textarea><br>



<input  type="file" name="placeimage" id="placeimage" value="place image">
<label for="file-upload" class="btn btn-primary m-2" >Upload thumbnail</label> 

<br>
<br>

  <button type="submit" class="btn btn-success" onclick="return myFunction()" value="submit" name="upload">Submit</button>
  
</form> 
<br><br><br>

</div>

</div>




<script type="text/javascript">
function myFunction() {
    var placename=document.getElementById('placename').value     
    if(placename=='')
    {
        alert("placename cannot be null")
        return false
    } 
   

    var placeno=document.getElementById('placeno').value           
    if(placeno=='')
    {
        alert("placeno cannot be null")
        return false
    } 

    var placedescription=document.getElementById('placedescription').value            
    if(placedescription=='')
    {
        alert("placedescription cannot be null")
        return false
    } 
    var btv=document.getElementById('btv').value                     
    if(btv=='')
    {
        alert("Best Time To Visit cannot be null")
        return false
    } 

    var nrs=document.getElementById('nrs').value                     
    if(nrs=='')
    {
        alert("best time to visit cannot be null")
        return false
    } 
    var nrs=document.getElementById('nrs').value                     
    if(nrs=='')
    {
        alert("nearest railway station cannot be null")
        return false
    } 

    var weather=document.getElementById('weather').value                     
    if(weather=='')
    {
        alert("weather cannot be null")
        return false
    } 
    var placeimage=document.getElementById('placeimage').value                     
    if(placeimage=='')
    {
        alert("placeimage cannot be null")
        return false
    } 

}
    </script>


        
    </body>
    </html>