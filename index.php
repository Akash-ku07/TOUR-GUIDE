<?php
include('eguideheader.php');


    
   if(isset($_SESSION["log"]))
   {
    if($_SESSION["log"]==1 || $_SESSION["log"]==3){
        echo"<h3><center>Hello There,".$_SESSION["name"]."</center></h3>";
    }
    else if($_SESSION["log"]==2)
    {
    echo"<h3><center>Hello There,Admin</center></h3>";
    }
    else{
        echo"<h3><center>Hello There,Welcome to E-Guide</center></h3>";
    }
}
    else{
        echo"<h3><center>Hello There,Welcome to E-Guide</center></h3>";
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="with=device-width, initial-scale=1.0">
            <title>E-Guide website design</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        </head>
        <body>
            <section class="headerdup">
               
                <div class="text-box">
                    <h1>E-Guide helps you to have better travel experiance</h1>
                    <p>Tourism comprises the activities of persons travelling to and 
                    staying in places <br>outside their usual environment for not more than one consecutive yearfor leisure,<br>
                     business or other purposes.</p>
                     <a href="aboutus.php" class="hero-btn">Visit Us to know More</a>
                </div>
    
            </section>
            <!---E-Guide Advntages----->
            <section class="advantage">
                <h1>Advantages we offer</h1>
                <p>Tourism comprises the activities of persons travelling</p>
    
                <div class="row">
                    <div class="course-col">
                        <h3>Local Guide</h3>
                        <p>Tourism comprises the activities of persons travelling to and 
                            staying in places outside their usual environment for not more than one consecutive yearfor leisure,
                             business or other purposes.</p>
                    </div>
                    <div class="course-col">
                        <h3>Easy to use</h3>
                        <p>Tourism comprises the activities of persons travelling to and 
                            staying in places outside their usual environment for not more than one consecutive yearfor leisure,
                             business or other purposes.</p>
                    </div>
                    <div class="course-col">
                        <h3>Language Preference</h3>
                        <p>Tourism comprises the activities of persons travelling to and 
                            staying in places outside their usual environment for not more than one consecutive yearfor leisure,
                             business or other purposes.</p>
                    </div>
    
                </div>
            </section>
    
            <!-----most preferred places----->
    
            <section class="destination">
                <h1>Top 3 Preferred Place</h1>
                <p>Tourism comprises the activities of persons travelling</p>
                <div class="row">
                    <div class="destination-col">
                        <img src="images/wayanad.png">
                        <div class="layer">
                        <a href='placeexpand.php?placeid=1001 '><h3>Wayanad</h3></a>
                        </div>
                    </div>
                        <div class="destination-col">
                        
                         <img src="images/kochi.png">
                            <div class="layer">
                            <a href='placeexpand.php?placeid=1002 '> <h3>Kochi</h3></a>
                            </div>
                        </div>
                            <div class="destination-col">
                                <img src="images/munnar.png">
                                <div class="layer">
                                <a href='placeexpand.php?placeid=1003 '> <h3>Munnar</h3></a>
                                </div>
                            </div>
                </div>
    
            </section>
    
            <!-----Travel plan------>
            <section class="plan">
                <h1>Our Travel Plan</h1>
                <p>Tourism comprises the activities of persons travelling.</p>
                <div class="row">
                    <div class="plan-col"><img src="images/banner1.png">
                        <h3>Explore the Place</h3>
                        <p>With the help of our guide,we make assure you visit 
                        the places which will give a meaning to your journey </p>
                        </div>
                    <div class="plan-col"><img src="images/banner2.png">
                    <h3>Visit the Finest Restuarent </h3>
                    <p>Most places are known for their foods ,so with help of our guide
                     who is a local to that place make sure you visit the finest restuarent. </p>
                    </div>
                    <div class="plan-col"><img src="images/banner3.png">
                        <h3>Explore the Culture</h3>
                        <p>Most journey in our life is to know people,
                            that why knowing each culture is important when visit that place</p>
                        </div>
                </div>
    
            </section>
    
            <!----Reviews------>
            <section class="reviews">
                <h1>What our Users Says</h1>
                <p>Tourism comprises the activities of persons travelling.</p>
                <div class="row">
                    <div class="reviews-col">
                        <img src="images/people1.jpg">
                        <div>
                            <p> Had an amazing trip with E-Guide. Loved the way everything was organised.
                             Our guide Mr. Salim was very kind & co-operative and made us feel really homely </p>
                             <h3>Robert Patt</h3>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star"></i>
                        </div>
                    </div>
                    <div class="reviews-col">
                        <img src="images/people2.jpg">
                        <div>
                            <p>We are regular customers of E-Guide. Earlier, we have visited places
                                 like Thrissur, Munnar, Kochi etc. This time, we have chosen Wayanad tour 
                                 in the Kumaon region. </p>
                             <h3>Sana Fernandez</h3>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-fill"></i>
                             <i class="bi bi-star-half"></i>
                        </div>
                    </div>
                </div>
                
    
            </section>
    
    
            <!-------call to Action----(cta)-->
    
            <section class="cta">
           <h1>CheckOut on US</h1>
           <a href="contact.html" class="hero-btn">Contact US</a>
            </section>
            
             \
            
    
           <!----------JavaScript for open&close bars in  smartphone size---------->
    
    
            <script>
                var navLinks = document.getElementById("navLinks");
                function showMenu(){
                    navLinks.style.right="0";
                }
                function hideMenu(){
                    navLinks.style.right="-200px";
                }
            </script>
    
       <?php 
    include('footer.php');
    ?>

</body>
</html>