<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    .filter {
      display: none;
    }

    .show {
      display: flex;
    }

    .container {
      margin-top: 50px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .btn {
      border: none;
      border-radius: 10px;
      justify-content: center;
      outline: none;
      padding: 10px 20px;
      background-color: #d6d6d6;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #ddd;
      justify-content: center;
    }

    .btn.active {
      background-color: #060606;
      color: white;
      justify-content: center;
    }

    .card {
      width: 200px;
      margin: 10px;
      border: 1px solid #ccc;
      border-radius: 10px;
      overflow: hidden;
      cursor: pointer;
      transition: transform 0.3s ease;
      display: flex;
      flex-direction: column;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: auto;
      border-radius: 10px 10px 0 0;
    }

    .card-text {
      padding: 10px;
      text-align: center;
    }

    body {
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    h1, h2 {
      text-align: center;
    }

    .myBtnContainer {
      text-align: center;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .navBackground {
      filter: blur(7px) hue-rotate(90deg);
      background: url(images/nav_background5.gif);
      z-index: -1;
      position: absolute;
      width: 100%;
      height: 80px;
    }

    nav {
      height: 80px;
      background-size: cover;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav a {
      text-decoration: none;
      color: #ffffff;
      font-size: larger;
      padding: 20px;
    }

    nav a input[type="image"] {
      vertical-align: middle;
    }

    nav a:hover {
      color: #838383;
    }

    .logo {
      color: #ffffff;
      font-size: 1.5rem;
      font-weight: bold;
      font-style: italic;
      padding: 0 2rem;
    }
  </style>
</head>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PWRpulse</title>
</head>
<body>
<div class="navBackground"></div>
<nav>        
<a href="http://localhost/PowerPulse-main/Homepage/Home.php" target="_self"><div class="logo">PWRpulse</div></a>
        <div class="nav-items">
        <a href="http://localhost/PowerPulse-main/Homepage/Exercise.php">Exercises</a>
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
<br>
<h1>Recipes</h1>
<br>
<h2>Filter according to your preference</h2>
<br>

<div class="myBtnContainer">
  <button class="btn active" onclick="filterSelection('all')">Show all</button>
  <button class="btn" onclick="filterSelection('Breakfast')">Breakfast</button>
  <button class="btn" onclick="filterSelection('Lunch')">Lunch</button>
  <button class="btn" onclick="filterSelection('Dinner')">Dinner</button>
  <button class="btn" onclick="filterSelection('Snacks')">Snacks</button>
  <button class="btn" onclick="filterSelection('Drinks')">Drinks</button>
</div>

<div class="container">
  <div class="filter Breakfast" onclick="redirectToRecipe('Gluten-Free Pancake')">
    <div class="card">
      <img src="images/gluten-free-pancakes-20.jpg" alt="Gluten-Free Pancake">
      <div class="card-text">Gluten-Free Pancake</div>
    </div>
  </div>

  <div class="filter Breakfast" onclick="redirectToRecipe('Granola Bowl')">
    <div class="card">
      <img src="images/Granola-Yogurt-Bowls-4-Ways-Insta-3-1024x1536.jpg" alt="Granola Bowl">
      <div class="card-text">Granola Bowl</div>
    </div>
  </div>
  
  
  
  <div class="filter Lunch" onclick="redirectToRecipe('Lettuce Burger')">
    <div class="card">
      <img src="images/Spinach-Sauce-Bunless-Burger-Recipe-Primavera-Kitchen-1.jpg" alt="Lettuce Burger">
      <div class="card-text">Lettuce Burger</div>
    </div>
  </div>
  
  <div class="filter Snacks" onclick="redirectToRecipe('Banana Oat Cookie')">
    <div class="card">
      <img src="images/4-ingredient-banana-oatmeal-cookies.webp" alt="Banana Oat Cookie">
      <div class="card-text">Banana Oat Cookie</div>
    </div>
  </div>
  
  <div class="filter Lunch" onclick="redirectToRecipe('Tuna Protein Bowl')">
    <div class="card">
      <img src="images/tuna-rice-recipe-6-scaled.jpg" alt="Tuna Protein Bowl">
      <div class="card-text">Tuna Protein Bowl</div>
    </div>
  </div>
  
  <div class="filter Lunch" onclick="redirectToRecipe('Chicken Wrap')">
    <div class="card">
      <img src="images/Chicken-Caesar-Wraps-14.jpg" alt="Chicken Wrap">
      <div class="card-text">Chicken Wrap</div>
    </div>
  </div>
  
  <div class="filter Dinner" onclick="redirectToRecipe('Caesar Salad')">
    <div class="card">
      <img src="images/220905_DD_Chx-Caesar-Salad_051-1024x1536.jpg.webp" alt="Caesar Salad">
      <div class="card-text">Caesar Salad</div>
    </div>
  </div>
  
  <div class="filter Dinner" onclick="redirectToRecipe('Quinoa Salad')">
    <div class="card">
      <img src="images/ThaiQuinoaSalad_Styled1.jpg" alt="Quinoa Salad">
      <div class="card-text">Quinoa Salad</div>
    </div>
  </div>
  
  <div class="filter Dinner" onclick="redirectToRecipe('Steak & Steamed Rice')">
    <div class="card">
      <img src="images/Sheet-Pan-Marinated-Steak-and-Broccoli-8-768x1152.jpg" alt="Steak & Steamed Rice">
      <div class="card-text">Steak & Steamed Rice</div>
    </div>
  </div>
  
  <div class="filter Snacks" onclick="redirectToRecipe('Baked Sweet Potatoes')">
    <div class="card">
      <img src="images/baked-sweet-potato-fries-12-768x1149.jpg" alt="Baked Sweet Potatoes">
      <div class="card-text">Baked Sweet Potatoes</div>
    </div>
  </div>
  
  <div class="filter Snacks" onclick="redirectToRecipe('Fruit Salad')">
    <div class="card">
      <img src="images/Salade-de-fruits-44-1024x1536.jpg" alt="Fruit Salad">
      <div class="card-text">Fruit Salad</div>
    </div>
  </div>
  
  <div class="filter Snacks" onclick="redirectToRecipe('Tuna Lettuce Bites')">
    <div class="card">
      <img src="images/avocado-tuna-lettuce-wraps-4.jpg" alt="Tuna Lettuce Bites">
      <div class="card-text">Tuna Lettuce Bites</div>
    </div>
  </div>
  
  <div class="filter Drinks" onclick="redirectToRecipe('Berries Smoothie')">
    <div class="card">
      <img src="images/frozen-fruit-smoothie-3.jpg" alt="Berries Smoothie">
      <div class="card-text">Berries Smoothie</div>
    </div>
  </div>
  
  <div class="filter Drinks" onclick="redirectToRecipe('Dates Smoothie')">
    <div class="card">
      <img src="images/Date-Shake-4.jpg" alt="Dates Smoothie">
      <div class="card-text">Dates Smoothie</div>
    </div>
  </div>
   
  <div class="filter Drinks" onclick="redirectToRecipe('Green Juice')">
    <div class="card">
      <img src="images/Avocado-Banana-Smoothie-1.jpg" alt="Green Juice">
      <div class="card-text">Green Juice</div>
    </div>
  </div>
  
</div>

<script>
  window.onload = function() {
    filterSelection('all');
  };

  function filterSelection(c) {
    var i;
    var filters = document.getElementsByClassName("filter");
    
    if (c === "all") {
      for (i = 0; i < filters.length; i++) {
        filters[i].classList.add("show");
      }
    } else {
      for (i = 0; i < filters.length; i++) {
        if (filters[i].classList.contains(c)) {
          filters[i].classList.add("show");
        } else {
          filters[i].classList.remove("show");
        }
      }
    }

    var btns = document.getElementsByClassName("btn");
    for (i = 0; i < btns.length; i++) {
      btns[i].classList.remove("active");
    }
    event.currentTarget.classList.add("active");
  }

  function redirectToRecipe(mealName) {
  // Here you can define the URLs for each recipe
  const recipeUrls = {
    "Gluten-Free Pancake": "diet_pages/glutenfreepancake.html",
    "Granola Bowl":"diet_pages/granolabowl.html",
    "Tuna Protein Bowl":"diet_pages/tunaproteinbowl.html",
    "Chicken Wrap":"diet_pages/chickenwrap.html",
    "Caesar Salad":"diet_pages/caesarsalad.html",
    "Quinoa Salad": "diet_pages/quinoasalad.html",
    "Steak & Steamed Rice":"diet_pages/steak.html",
    "Fruit Salad":"diet_pages/fruitsalad.html",
    "Tuna Lettuce Bites":"diet_pages/tunabites.html",
    "Dates Smoothie":"diet_pages/datesmoothie.html",
    "Green Juice":"diet_pages/greenjuice.html",
    "Lettuce Burger":"diet_pages/lettuceburger.html",
    "Berries Smoothie":"diet_pages/berriessmoothie.html",
    "Baked Sweet Potatoes":"diet_pages/bakedsweetpotato.html",
    "Banana Oat Cookie":"diet_pages/bananaoatcookie.html",
    
  };

    const recipeUrl = recipeUrls[mealName];
    if (recipeUrl) {
      window.location.href = recipeUrl;
    }
  }
</script>

</body>
</html>

