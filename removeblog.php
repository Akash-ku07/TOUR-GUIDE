<?php
include('eguideheader.php');




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
   


    <div class="container col-md-6 border border-danger rounded pt-5 pb-5 pr-5 pl-5">
<center><h5>REMOVE BLOG</h5></center><br>
<form  action="" method="POST">
<label for="guideid">Enter Blog ID:</label>
<input type="text" id="blogid" name="blogid" required  class="form-control" value=""><br>
<button type="submit" class="btn btn-danger" value="submit" name="decline">REMOVE</button>
</form>
</div>

<?php
if(isset($_POST['decline']))
{
$blogid=$_POST['blogid'];
$querydelete="DELETE from blog where id='$blogid'";
mysqli_query($con,$querydelete);
header("Location:removeblog.php");
}
?>
 <br>



    <?php
    while($row = mysqli_fetch_assoc($result))
   {
       $username=$row['username'];
       $content=$row['content'];
       $blogid=$row['id'];
       
      
       ?>
    <div class="container">
<div class="row">
<div class="col-md-2">&nbsp</div>
<div class="col-md-8 border border-info rounded pt-3 pb-3 pr-2 pl-2">
        <center><p><?php echo $content ?></p></center>
        <h5><?php echo $username ?></h5>
        <h5><?php echo $blogid ?></h5>
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