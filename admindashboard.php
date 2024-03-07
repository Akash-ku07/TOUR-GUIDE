<?php
include('eguideheader.php');

$log=$_SESSION["log"];
if($log!=2)
{
    header("Location:index.php");
    echo "<script>window.location = 'index.php'; </script>";
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
<div class="drawer-side">
    <label for="my-drawer" class="drawer-overlay"></label>
    <ul class="menu p-4 overflow-y-auto w-80 bg-dblue-300 text-white">
      <!-- Sidebar content here -->
      <h5 class="text-dark">PLACE:</h5>
      <li><a href="addplace.php">ADD PLACE</a></li>
      <li><a href="removeplace.php">REMOVE PLACE</a></li>
      <br>
      <h5 class="text-dark">GUIDE:</h5>
      <li><a href="guiderequests.php">NEW GUIDE REQUESTS</a></li>
      
    <li><a href="removeguide.php">REMOVE GUIDES</a></li>
      <br>
      <h5 class="text-dark">USER:</h5>
      <li><a href="listusers.php">LIST USERS</a></li>
      <li><a href="removeusers.php">REMOVE USERS</a></li>
      <br>
      <h5 class="text-dark">BOOKINGS:</h5>
      <li><a href="managebooking.php">MANAGE BOOKINGS</a></li>
      <br>
      <h5 class="text-dark">BLOG:</h5>
      <li><a href="removeblog.php">REMOVE BLOG</a></li>
      <br>
    </ul>
    
  </div>
</body>
</html>