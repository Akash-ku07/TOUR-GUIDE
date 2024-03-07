<?php
include('eguideheader.php');

if (isset($_SESSION['uid'])) {
    $userid=$_SESSION['uid'];
    $isok="SELECT * from bookinglisted WHERE userid='$userid'";
    $resultbooking=mysqli_query($con,$isok);
    $countbooking= mysqli_num_rows($resultbooking);
}


$sql="SELECT * from blog";  
$result=mysqli_query($con,$sql);
$count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-image: url('images/blogbg.jpg');">
    <br>
    <center><h2>BLOGS</h2></center>
    <br>
    <?php
    if (isset($_SESSION['uid'])) {
        
    
    if($countbooking>0)
{
?>
<?php
if (isset($_SESSION['uid'])) {
   echo '<div class="container">
   <div class="row">
   <div class="col-md-2">&nbsp</div>
   <div class="col-md-8 border border-info rounded pt-3 pb-3 pr-2 pl-2">
       <form method="POST">
   <label for="blog content">Wtite your Blog:</label>
       <textarea  type="text" name="content" class="form-control" id="content" value="" rows="2"></textarea><br>
       <button type="submit" class="btn btn-success" value="submit" name="blogon">Post Blog</button>
   </form>
   </div>
   <div class="col-md-2">&nbsp</div>
   
   </div>
    </div>';
}
?>

 <br>


<?php
if(isset($_POST['blogon']))
{
    $content=$_POST['content'];
   
    $username=$_SESSION["name"];

    $insquery="INSERT into blog (userid,username,content) VALUES('$userid','$username','$content')";
    $insertblog=mysqli_query($con,$insquery);
    header("Location:blog.php");
}
}
}
?>
    <?php
    while($row = mysqli_fetch_assoc($result))
   {
       $username=$row['username'];
       $content=$row['content'];
       
      
       ?>
    <div class="container">
<div class="row">
<div class="col-md-2">&nbsp</div>
<div class="col-md-8 border border-info rounded pt-3 pb-3 pr-2 pl-2">
        <center><p><?php echo $content ?></p></center>
        <h5><?php echo $username ?></h5>
</div>
<div class="col-md-2">&nbsp</div>

</div>
 </div>
 <br>
 <?php
   }
   ?>
</body>
</html>