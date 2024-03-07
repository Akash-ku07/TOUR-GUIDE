<?php
include('eguideheader.php');
if (isset($_POST['submit'])) {
  $email= $_POST["email"];
  $pwd = $_POST["pwd"];
  $sql1 = "select *from guidenotlisted where email = '$email' and pwd = '$pwd'";
  $result1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $notlistedcount = mysqli_num_rows($result1);

  $sql2="select *from guidelisted where email = '$email' and pwd = '$pwd'";
  $result2 = mysqli_query($con, $sql2);
  $row2 = mysqli_fetch_assoc($result2);
  $listedcount = mysqli_num_rows($result2);
}
if(isset($notlistedcount)||isset($listedcount))
{
    
 if ($listedcount>0)
    {
    $_SESSION["log"] = 3;
    $_SESSION["placeid"]=$row2["placeid"];
    $_SESSION["uid"] = $row2["guideid"];
    $_SESSION["name"] = $row2["guidename"];
    $_SESSION["email"] = $row2["email"];
    echo "<h1><center> Login successful </center></h1>";
    header("Location: index.php");
    }
    elseif($notlistedcount>0)
    {
        echo"<h3><center>YOUR PROFILE VERIFICATION IS UNDER PROCESS,PLEASE TRY  AFTER SOME TIME</center></h3>";
    }
    else
    {
        echo"<h2><center>LOGIN FAILED,SIGN UP FIRST</center></h2>";
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
    <div class="row"> &nbsp </div>
        <div  class="row">
            <div class="col-md-4">&nbsp</div>
            <div class="col-md-4">
<form  action="" method="POST">
    <h3 class="text-center">GUIDE LOGIN</h3><br><br>
<label for="email">Email Address:</label>
  <input type="email" name="email" class="form-control" id="email"><br><br>
  <label for="pwd">Password:</label>
  <input type="password" name="pwd" class="form-control" id="pwd"><br> <br>
  <button type="submit" class="btn btn-success " onclick="return myFunction()" name="submit">LOGIN</button>
  <br><br>

  <a class=" text-center" href="signupguide.php">  <p><b><u>NEW HERE,CLICK HERE TO SIGNUP</u></b></p></a>
  </div>
  <div class="col-md-4">&nbsp</div>
</div>
</form>
    

<script type="text/javascript">
function myFunction() {
    var email=document.getElementById('email').value     
    if(email=='')
    {
        alert("email cannot be null")
        return false
    } 
   

    var pwd=document.getElementById('pwd').value           
    if(pwd=='')
    {
        alert("password cannot be null")
        return false
    } 

}
    </script>

    </body>
    </html>