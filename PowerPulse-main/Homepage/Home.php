<?php
session_start(); // Start the session at the beginning
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWRpulse</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<!--nav banner-->
<body>
<div class="navBackground"></div>
  <nav>
    <a><div class="logo">PWRpulse</div></a>  
    <div class="nav-items">
    <a href="http://localhost/PowerPulse-main/Homepage/Exercise.php">Exercises</a>
    <a href="http://localhost/PowerPulse-main/Homepage/Diets.php">Diets</a>
      <?php
      if(isset($_SESSION['logged_in'])) {
      ?>
       
        <a href="http://localhost/PowerPulse-main/Homepage/logout_PWRplus.php">Log out</a>
        <a href="http://localhost/PowerPulse-main/Homepage/Profile.php"><input type="image" src="images/Profile.png" width="40px" height="40px" style="align-self: center;  border-radius: 30px;"></a>
       <?php
      }else{      
       ?>
            <a href="sign_in.html"><input type="image" src="images/Profile.png" width="40px" height="40px" style="align-self: center;  border-radius: 30px;"></a>
            <?php
      }
            ?>
    </div>
</nav>
  <!--  uiz secotion-->
  <section class="hero">
    <div class="hero-container">
      <div class="column-left">
        <br><br><br><br><br><br><br><br><br>
        <h1>Go beyond!</h1>
        <p>
          Unlock your path to wellness with our comprehensive healthcare platform.  <br> Personalized tools, expert guidance, and a supportive community await <br> as you embark on your journey to a healthier you.
        </p>
        <a href="http://localhost/PowerPulse-main/Homepage/Quiz.php" target="_self"><button>Get Started by Taking the Quiz</button> </a>
        
      </div>
      <div class="column-right">
        <div class="logo"> <br> "Don't count the days make the days count"</div>
    </div>
  </section>
  
  <section class="about">
    <div class="about-container">
      <h2>About Us</h2> 
      <p>
        At PWRpulse, we believe in empowering individuals to take control of their health and wellness journey. Our team of experts curates personalized diet and exercise plans tailored to your specific needs and goals. Whether you're looking to lose weight, build muscle, or simply improve your overall well-being, we're here to support you every step of the way.
      </p>
    </div>
  </section>

  <section class="services">
    <h2 style="font-size: 50px; padding: 30px; font-family: Arial, Helvetica, sans-serif;">Our Services</h2>
    <br><br>
    
    <div class="services-container">
      
      <div class="service">
        <img src="images/diet-food-icon.svg" alt="diet-icon" class="service-icon">
        <div>
          <h3>Diet Plans</h3>
          <p>Discover nutritious and delicious meal plans designed to fuel your body and promote optimal health.</p>
        </div>
      </div>
      <div class="service">
        <img src="images/run.svg" alt="exercise-icon" class="service-icon">
        <div>
          <h3>Exercise Routines</h3>
          <p>Explore a variety of workout routines suitable for all fitness levels, from beginners to advanced athletes.</p>
        </div>
      </div>
    </div>
    
  </section>
  <hr style="border-top: 4px solid black; width: 100%; ">


  <section class="Customer_feedback">
    <h2 style="font-size: 50px; padding: 30px; font-family: Arial, Helvetica, sans-serif;">Customer feedbacks</h2>
    <div class="Customer_feedback-container">
    
      <div class="Customer_feedback-card">
        <img src="images/user-128.svg" alt="Customer_feedback-1" class="Customer_feedback-image">
        <p>"Good fortrack of my progress."</p>
        <p class="Customer_feedback-author">- Sarah</p>
      </div>
      <br>
      <div class="Customer_feedback-card">
        <img src="images/user-128.svg" alt="Customer_feedback-2" class="Customer_feedback-image">
        <p>"It makes diets easy"</p>
        <p class="Customer_feedback-author">- John</p>
      </div>
      <br>
      <div class="Customer_feedback-card">
        <img src="images/user-128.svg" alt="Customer_feedback-2" class="Customer_feedback-image">
        <p>"I highly recommend this website."</p>
        <p class="Customer_feedback-author">- mike</p>
      </div>
      <br>
      <div class="Customer_feedback-card">
        <img src="images/user-128.svg" alt="Customer_feedback-2" class="Customer_feedback-image">
        <p>"it has a nice feel, good diets."</p>
        <p class="Customer_feedback-author">- jake</p>
      </div>
    </div>
  </section>

  
</body>
</html>
