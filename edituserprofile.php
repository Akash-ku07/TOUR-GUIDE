<?php
include('eguideheader.php');
 $userid=$_SESSION["uid"];
    ?>
    


    <div class="container">
        <br>
        <div  class="row">
            <div class="col-md-2">&nbsp</div>
            <div class="col-md-8 border border-secondary rounded pt-3 pb-3 pr-3 pl-3 ">
<form action=" " method="POST">
    <h3 class="text-center">EDIT USER PROFILE</h3>

  <label for="fname">First name:</label>
  <input type="text" id="username" name="username" class="form-control" value=""><br>
 

  <label for="phonenumber">Phone Number:</label>
  <input type="text" id="phno" name="phno"  class="form-control" value=""><br>
  
  <label for="email">Email Address:</label>
  <input type="email" name="email" class="form-control" id="email"><br>

  <label for="pwd">Password:</label>
  <input type="password" name="password" class="form-control" id="pwd"><br>

  <button type="submit" class="btn btn-danger" onclick="return myFunction()" name="submit">Submit</button>
</form> 
</div>
<div  class="col-md-2"> &nbsp  </div>
</div>
</div>


 <?php
  if(isset($_POST['submit']))     
  {   
    $username=$_POST['username'];
            $phno=$_POST['phno'];
            $email=$_POST['email'];  
            $pwd=$_POST['password'];

            $sql="UPDATE user SET username='$username',phoneno='$phno',email='$email',pwd='$pwd' WHERE id='$userid'";                                  //sql query for finding matching row
            $result=mysqli_query($con,$sql);
            header("Location:userprofile.php");

    
  
     }
     
     
    
    

?>
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