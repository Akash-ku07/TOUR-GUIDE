<?php
include('connection.php');

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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="places.php">PLACES</a>
    </li>
    <li class='nav-item'>
      <a class='nav-link' href='guides.php'>GUIDES</a> 
    </li>

<li class="nav-item">
      <a class="nav-link" href="blog.php">BLOGS</a>
    </li>
    
    <?php

    if(isset($_SESSION["log"])) 
    {

if ( $_SESSION["log"] == 1){
 
  echo"<li class='nav-item'><a class='nav-link' href='userprofile.php'>PROFILE</a> </li>";
    echo"<li class='nav-item'><a class='nav-link' href='logout.php'>LOGOUT</a> </li>";        //user loggined
      }
      elseif ( $_SESSION["log"] == 3){

        echo "<li class='nav-item'><a class='nav-link' href='guideprofile.php'>PROFILE</a> </li>";
        echo "<li class='nav-item'><a class='nav-link' href='bookingverification.php'>BOOKINGS</a> </li>";
        echo "<li class='nav-item'><a class='nav-link' href='logout.php'>LOGOUT</a> </li>";   //GUIDE LOGINNED
      }
      elseif ( $_SESSION["log"] == 2){

        echo "<li class='nav-item'><a class='nav-link' href='admindashboard.php'>DASHBOARD</a> </li>";
        echo "<li class='nav-item'><a class='nav-link' href='logout.php'>LOGOUT</a> </li>";   //Admin LOGINNED
       }
   

      else {
        echo "<li class='nav-item'><a class='nav-link' href='loginhome.php'>LOGIN</a></li>";      //default,without login
      }
    }
    else {
      echo "<li class='nav-item'><a class='nav-link' href='loginhome.php'>LOGIN</a></li>";      //default,without login
    }
    
      ?>
    <li class="nav-item">
      <a class="nav-link" href="#">ABOUT-US</a>
    </li>
    <li class='nav-item'>
      <a class='nav-link' href='contact.php'>CONTACT-US</a> 
    </li>
  </ul>
</nav>

</body>
</html>