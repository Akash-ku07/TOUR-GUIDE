<?php
include('eguideheader.php');
        if(isset($_POST['submit']))     
        {   
            $username=$_POST['username'];
            $phno=$_POST['phno'];
            $email=$_POST['email'];  
            $pwd=$_POST['password'];

            $sql="INSERT INTO user (username,phoneno,email,pwd) VALUES ('$username','$phno','$email','$pwd')";                                  //sql query for finding matching row
            $result=mysqli_query($con,$sql); 
        
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

<div class="container">
        <br>
        <br>
        <br>
        <div  class="row">
            <div class="col-md-2">&nbsp</div>
            <div class="col-md-8 ">
<form action="" method="POST">
    <h3 class="text-center">USER SIGN-UP</h3>

  <label for="fname">First name:</label>
  <input type="text" id="username"   name="username" class="form-control" value=""><br>
 

  <label for="phonenumber">Phone Number:</label>
  <input type="text" id="phno"  name="phno"  class="form-control" value=""><br>
  
  <label for="email">Email Address:</label>
  <input type="email"  name="email" class="form-control" id="email"><br>

  <label for="pwd">Password:</label>
  <input type="password"  name="password" class="form-control" id="pwd"><br>

  <button type="submit" class="btn btn-danger" onclick="return myFunction()" name="submit">Submit</button>
</form> 
<a class=" text-center" href="loginuser.php">  <p><b><u>ALREADY AN E-GUIDE USER,CLICK HERE TO LOGIN</u></b></p></a>
</div>
<div  class="col-md-2"> &nbsp  </div>
</div>
</div>
<BR>
<BR>
    

<script type="text/javascript">
function myFunction() {
    var fname=document.getElementById('username').value     
    if(username=='')
    {
        alert("name cannot be null")
        return false
    } 
   

    var phno=document.getElementById('phno').value           
    if(phno=='')
    {
        alert("phone number name cannot be null")
        return false
    } 

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