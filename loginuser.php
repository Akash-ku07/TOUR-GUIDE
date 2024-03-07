<?php
include('eguideheader.php');
$_SESSION["log"] = 0;
if (isset($_POST['submit'])) {
  $email= $_POST["email"];
  $pwd = $_POST["pwd"];
  $sql = "select * from user where email = '$email' and pwd = '$pwd'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $count = mysqli_num_rows($result);
  $acc_type = $row["admin"];

  if ($count == 1 && $acc_type == 1)
   {
    $_SESSION["log"] =2;
    $_SESSION["uid"] = $row["id"];
    $_SESSION["name"] = $row["username"];
    $_SESSION["email"] = $row["email"];
    echo "<h4><center> Login successful </center></h4>";
    header("Location:index.php");

  }
   elseif ($count == 1)
    {
    $_SESSION["log"] =1;
    $_SESSION["uid"] = $row["id"];
    $_SESSION["name"] = $row["username"];
    $_SESSION["email"] = $row["email"];
    echo "<h1><center> Login successful </center></h1>";
    header("Location:index.php");
    }
    else
    {
        
        echo"<h4><center>LOGIN FAILED,TRY AGAIN</center></h4>";
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
    <h3 class="text-center">USER/ADMIN LOGIN</h3><br><br>
<label for="email">Email Address:</label>
  <input type="email" name="email" class="form-control" id="email"><br><br>
  <label for="pwd">Password:</label>
  <input type="password" name="pwd" class="form-control" id="pwd"><br> <br>
  <button type="submit" class="btn btn-success " onclick="return myFunction()" name="submit">LOGIN</button>
  <br><br>

  <a class=" text-center" href="signupuser.php">  <p><b><u>NEW HERE,CLICK HERE TO SIGNUP</u></b></p></a>
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