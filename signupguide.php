<?php
include('eguideheader.php');


            $target_dir="uploads/";
            $status=2;

           

         if(isset($_POST['upload']))     
        {   
            $image=$_FILES['guideimage']['name']; 
        
           
        
            $guidename =$_POST['guidename'];
            $phoneno = $_POST['phoneno'];
            $email =$_POST['email'];
            $pwd=$_POST['pwd'];
            $placeno =$_POST['placecode'];
            $gender=$_POST['gender'];
            $firstlanguage=$_POST['firstlanguage'];
            $secondlanguage=$_POST['secondlanguage'];
            $yoe=$_POST['yoe'];
            $about=$_POST['about'];
            $age=$_POST['age'];
            $price=$_POST['price'];
        
$target = $target_dir.basename($image);

            
            
            
        
            $sqll="INSERT INTO guidenotlisted (guidename,phoneno,email,pwd,placeno,gender,firstlanguage,secondlanguage,yoe,about,image,age,price)
            VALUES ('$guidename','$phoneno','$email','$pwd','$placeno','$gender','$firstlanguage','$secondlanguage','$yoe','$about','$image','$age','$price')";
         
                
         
      
         
            if(move_uploaded_file($_FILES['guideimage']['tmp_name'], $target)) 
            {
                $queryrry= mysqli_query ($con,$sqll);
                $status=1;
            }
            else
             {
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
         <span>Your Application for joining as our E-Guide has been submitted successfully</span><br>
         <span>verification of your Application by Admin is under process  </span>
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
        <br>
        <br>
        <br>
        <div  class="row">
            <div class="col-md-2">&nbsp</div>
            <div class="col-md-8 ">
<form action="" method="POST" enctype="multipart/form-data">
    <h3 class="text-center">GUIDE SIGN-UP</h3>

  <label for="fname">Name:</label>
  <input type="text" id="guidename" name="guidename" class="form-control" value=""><br>
 

  <label for="phonenumber">Phone Number:</label>
  <input type="text" id="phoneno" name="phoneno"  class="form-control" value=""><br>
  
  <label for="email">Email Address:</label>
  <input type="email" name="email" class="form-control" id="email"><br>

  <label for="pwd">Password:</label>
  <input type="password" name="pwd" class="form-control" id="pwd"><br>

<hr>
<label for="destination code"><U>ENTER THE PLACE-CODE OF THE DESTINATION WHICH YOU ARE WILLING TO WORK FOR  :</U></label>
<table  border="1px" style="width:300px; line-height:25px;">
<tr>
      <th>PLACE-NAME</th>
      <th>PLACE-CODE</th>
      
      </tr>
<?php
$querypassplaceid="SELECT * FROM place";
$result6=mysqli_query($con,$querypassplaceid);
$count6 = mysqli_num_rows($result6);
while($row6 = mysqli_fetch_assoc($result6))
{
    
    ?>
    <tr>
    
        <td><?php echo $row6['placename']?></td>
        <td><?php echo $row6['placeno']?></td>
       
       </tr>
    <?php
    
}
?>
</table><br>
<label>ENTER CODE HERE:</label> 
  <input type="text" id="placecode" name="placecode"  class="form-control" value=""><hr><br>

  <label for="gender">Gender:</label><br>
  <input type="radio" id="gender" name="gender"  value="Male">MALE<br>
  <input type="radio" id="gender" name="gender"  value="Female">FEMALE<br><br>

  <label for="firstlanguage">First Language:</label>
  <input type="text" id="firstlanguage" name="firstlanguage"  class="form-control" value=""><br>

  <label for="secondlanguage">Second Language:</label>
  <input type="text" id="secondlanguage" name="secondlanguage"  class="form-control" value=""><br>

  <label for="yearsofexperience">Years of Experience in Guiding:</label>
  <input type="text" id="yoe" name="yoe"  class="form-control" value=""><br>

  <label for="About yourself:">About Myself:</label>
    <textarea  type="text" name="about" class="form-control" id="about" value="" rows="4"></textarea><br>

    <label for="Your Age:">Your Age:</label>
    <input  type="text" name="age" class="form-control" id="age" value="" rows="4"><br>
    <label for="Price per Hour:">Price per Hour for your guiding:</label>
    <input   type="text" name="price" class="form-control" id="price" value="" rows="4"><br>



  <input  type="file" name="guideimage" id="guideimage" value="guideimage">
<label for="file-upload" class="btn btn-primary m-2" >Upload thumbnail</label> 

<br>
<br>

  <button type="submit" class="btn btn-success"   value="submit" onclick="return myFunction()" name="upload">Submit</button>

</form> 
<br>
<br>
<br>
</div>
<div  class="col-md-2"> &nbsp  </div>
</div>
</div>
    

<script type="text/javascript">
function myFunction() {
    var username=document.getElementById('username').value     
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

    var placecode=document.getElementById('placecode').value                     
    if(placecode=='')
    {
        alert("placecode cannot be null")
        return false
    } 
    var gender=document.getElementById('gender').value                     
    if(gender=='')
    {
        alert("gender cannot be null")
        return false
    } 
    var firstlanguage=document.getElementById('firstlanguage').value                     
    if(firstlanguage=='')
    {
        alert("firstlanguage cannot be null")
        return false
    } 
    var secondlanguage=document.getElementById('secondlanguage').value                     
    if(secondlanguage=='')
    {
        alert("secondlanguage cannot be null")
        return false
    } 
    var yoe=document.getElementById('yoe').value                     
    if(yoe=='')
    {
        alert("year of experience cannot be null")
        return false
    } 
    var about=document.getElementById('about').value                     
    if(about=='')
    {
        alert("about cannot be null")
        return false
    } 
    var age=document.getElementById('age').value                     
    if(age=='')
    {
        alert("age cannot be null")
        return false
    } 
    
    var price=document.getElementById('price').value                     
    if(price=='')
    {
        alert("price cannot be null")
        return false
    } 
    
    var guideimage=document.getElementById('guideimage').value                     
    if(guideimage=='')
    {
        alert("guideimage cannot be null")
        return false
    } 
}
    </script>
    
</body>
</html>