<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script >


        var showCategory = true;
        var showDuration = true;

        var currentCat = "all";
        var currentDur = "all";

        function cyclePhotos() {
            var Pushups = document.getElementById('pushup-Image');
            var PushupsDetails = document.getElementById('detailsImage-pushups');


            var feetElevatedPushups = document.getElementById('feetElevatedPushups-Image');
            var feetElevatedPushupsDetails = document.getElementById('detailsImage-feetElevatedPushups');


            var handsElevatedPushups = document.getElementById('handsElevatedPushups-Image');
            var handsElevatedPushupsDetails = document.getElementById('detailsImage-handsElevatedPushups');

            var benchDip = document.getElementById('benchDip-Image');
            var benchDipDetails = document.getElementById('detailsImage-benchDip');

            var airSquats = document.getElementById('airSquats-Image');
            var airSquatsDetails = document.getElementById('detailsImage-airSquats');

            var forwardLunge = document.getElementById('forwardLunge-Image');
            var forwardLungeDetails = document.getElementById('detailsImage-forwardLunge');

            var butterflySitups = document.getElementById('butterflySitups-Image');
            var butterflySitupsDetails = document.getElementById('detailsImage-butterflySitups');

            var delayInSeconds = 1;


            var pushupsImages = ['Assets/aimations/Pushups/pic1.png', 'Assets/aimations/Pushups/pic2.png'];
            var feetElevatedPushupsImages = ['Assets/aimations/feetElevatedPushups/pic1.png', 'Assets/aimations/feetElevatedPushups/pic2.png'];
            var handsElevatedPushupsImages = ['Assets/aimations/handsElevatedPushups/pic1.png', 'Assets/aimations/handsElevatedPushups/pic2.png'];
            var benchDipImages = ['Assets/aimations/benchDip/pic1.png', 'Assets/aimations/benchDip/pic2.png'];
            var airSquatsImages = ['Assets/aimations/air-squat/pic1.png', 'Assets/aimations/air-squat/pic2.png'];
            var forwardLungeImages = ['Assets/aimations/forwardLunge/pic1.png', 'Assets/aimations/forwardLunge/pic2.png'];
            var butterflySitupsImages = ['Assets/aimations/butterflySitup/pic1.png', 'Assets/aimations/butterflySitup/pic2.png'];

            var num = 0;
            var changeImage = function() {


                num++;
                Pushups.src = pushupsImages[num];
                PushupsDetails.src = pushupsImages[num];
                feetElevatedPushups.src = feetElevatedPushupsImages[num];
                feetElevatedPushupsDetails.src = feetElevatedPushupsImages[num];
                handsElevatedPushups.src = handsElevatedPushupsImages[num];
                handsElevatedPushupsDetails.src = handsElevatedPushupsImages[num];
                benchDip.src = benchDipImages[num];
                benchDipDetails.src = benchDipImages[num];
                airSquats.src = airSquatsImages[num];
                airSquatsDetails.src = airSquatsImages[num];
                forwardLunge.src = forwardLungeImages[num];
                forwardLungeDetails.src = forwardLungeImages[num];
                butterflySitups.src = butterflySitupsImages[num];
                butterflySitupsDetails.src = butterflySitupsImages[num];

                if (num === 1) {
                    num = -1;
                }
            }

            setInterval(changeImage, delayInSeconds * 1000);
        }

        function showDetails(exercise) {
            document.getElementById(exercise).style.visibility = "visible";
            document.getElementById("blackBackground").style.visibility = "visible";
        }

        function hide(exercise) {
            document.getElementById(exercise).style.visibility = "hidden";
            document.getElementById("blackBackground").style.visibility = "hidden";
        }


        function toggleFilter(filterToShow) {
            if(filterToShow === "Category" && showCategory) {
                document.getElementById("Category").style.visibility = "visible";
                document.getElementById("Duration").style.visibility = "hidden";
                showCategory = false;
                showDuration = true;
            } else if(filterToShow === "Duration" && showDuration) {
                document.getElementById("Category").style.visibility = "hidden";
                document.getElementById("Duration").style.visibility = "visible";
                showDuration = false;
                showCategory = true;
            } else if(filterToShow === "Order" && showOrder) {
                document.getElementById("Category").style.visibility = "hidden";
                document.getElementById("Duration").style.visibility = "hidden";
                showDuration = true;
                showCategory = true;
            } else {
                document.getElementById("Category").style.visibility = "hidden";
                document.getElementById("Duration").style.visibility = "hidden";
                showCategory = true;
                showDuration = true;
            }
        }


        function categorySelection(c) {
            var i;
            var filterDivs = document.getElementsByClassName("exercise");
            currentCat = c;
            if (c === "all") {
                for (i = 0; i < filterDivs.length; i++) {
                    filterDivs[i].style.display = "grid";
                }
            } else {
                for (i = 0; i < filterDivs.length; i++) {
                    if (filterDivs[i].classList.contains(c)) {
                        filterDivs[i].style.display = "grid";
                    } else {
                        filterDivs[i].style.display = "none";
                    }
                }
            }
        }

        function durationSelection(c) {
            var i;
            var filterDivs = document.getElementsByClassName("exercise");
            currentDur = c;
            if (c === "all") {
                for (i = 0; i < filterDivs.length; i++) {
                    filterDivs[i].style.display = "grid";
                }
            } else {
                for (i = 0; i < filterDivs.length; i++) {
                    if (filterDivs[i].classList.contains(c)) {
                        filterDivs[i].style.display = "grid";
                    } else {
                        filterDivs[i].style.display = "none";
                    }
                }
            }
        }




        window.onload=function() {
            categorySelection('all');
        }
        
        $(document).ready(function() {
            $(".exercise").animate({opacity: 1, marginLeft: '10%'});
            cyclePhotos();
        });

    </script>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }     

        .welcomeDiv{
            font-size: 70px;
            width: auto;
            height: 100px;
            margin-left: 10%;
            padding-top:35px;
            color: white;
            background-size: cover;
        }

        .welcomeBackground {
            filter: blur(7px) hue-rotate(45deg);
            background: url("images/nav_background6.gif");
            z-index: -1;
            position: absolute;
            width: 100%;
            height: 240px;
            background-size: cover;
        }

        .todaysText{
            font-size: 30px;
            margin-left: 10%;
            margin-top: 2%;
            padding-top:35px;
            margin-bottom: 1%;
            color: white;
            background-size: cover;
        }

        .filter{
            margin-left: 10%;
        }

        .filterButton{
            display: inline-block;
            width: 200px;
            height: 30px;
            margin-right: 25px;
            background-color: #d7d7d7;
            border-radius: 50px;
        }

        .filterButton:hover{
            cursor: pointer;
            background-color: #b1b1b1;
        }

        .filterButton:active{
            background-color: #6b6a6a;
        }

        .filterLabel{
            position: relative;
            left: 10%;
            top: 50%;
            transform: translate(0, -50%);
            color: black;
            
        }

        .filterIcon{
            width: 25px;
            position: relative;
            left: 80%;
            bottom: 56%;
        }

        .filterOption{
            text-align: center;
            padding: 7px;
            margin: 10px;
            background-color: #d7d7d7;
            border-radius: 100px;

        }

        .Category, .Duration{
            background-color: #b1b1b1;
            width: 200px;
            height: 185px;
            position: absolute;
            visibility: hidden;
            z-index: 2;
            border-radius: 20px;
        }

        .Duration{
            left: calc(10% + 235px);
            height: 200px;
        }

        .Order{
            left: calc(10% + 465px);
            height: 145px;
        }

        .filterOption:hover{
            cursor: pointer;
            background-color: #b1b1b1;
        }

        .filterOption:active{
            background-color: #9b9b9b;
        }

        .exercise{
            background-color: #b1b1b1;
            width: 80%;
            height: 100px;
            border: 2px #b1b1b1 solid;
            border-radius: 5px;
            margin-left: 0;
            display: none;
            grid-template-columns: 25% 25% 25% 25%;
            margin-bottom: 15px;
            opacity: 0;
        }

        .exercise:hover{
            cursor: pointer;
            background-color: #8d8d8d;
        }

        .exercise:active{
            background-color: #9b9b9b;
            color: rgb(0, 0, 0);
        }

        .exerciseDetails{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 75%;
            height: 75%;
            background-color: white;
            border-radius: 40px;
            visibility: hidden;
            z-index: 4;
        }


        .exerciseImg{
            height: 96px;
            position: relative;
            top: 0%;
            z-index: 0;
            border-radius: 5px;
        }

        .exerciseLabel, .exerciseCount, .exercieSets{
            align-self: center;
            color: white;
        }

        .blackBackground{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            opacity: 0.6;
            background-color: black;
            z-index: 3;
            visibility: hidden;
        }

        .detailsImage-pushups{
            height: 100%;
            position: relative;
            left: 50px;
            top: 50%;
            transform: translateY(-50%);
            
        }

        .details{
            position: absolute;
            z-index: 3;
            right: 30px;
            background-color: #9b9b9b;
            width: 400px;
            height: 80%;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            border-radius: 25px;
        }


        .details h1{
            text-align: center;
            margin-top: 50px;
        }

        .details p{
            font: size 10px;;
            padding: 30px;
            text-align: center;
        }

        .exitButton{
            background-color: white;
            border-radius: 100px;
            width: 50px;
            height: 50px;
            position: absolute;
            top: -2vh;
            right: -2vh;
            border: 2px solid black;
        }

        .exitButton:hover{
            background-color: #b1b1b1;
            cursor: pointer;
        }

        .exitButton:active{
            background-color: #6b6a6a;
        }

        .exitButton img{
            width: 80%;
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        nav {
            height: 80px;
            background-size: cover;
            display: flex;
            justify-content: space-between;
            align-items: center;
           
        }
          .navBackground {
            filter: blur(7px) saturate(0) contrast(1);
            background: url("images/nav_background5.gif");
            z-index: -1;
            position: absolute;
            width: 100%;
            height: 80px;
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
<nav>        
<div class="navBackground"></div>
<a href="http://localhost/PowerPulse-main/Homepage/Home.php" target="_self"><div class="logo">PWRpulse</div></a>
        <div class="nav-items">
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
<div class="blackBackground" id="blackBackground"></div>
    
<body>
<div class="welcome_container">
<div class="welcomeBackground"></div>
    <div class="welcomeDiv">
        Ready To Exercies?
    </div>
    <div class="todaysText">
        Here's the training plan for today:
    </div>
    </div>
    <br><br><br>
    <div class="filter">
        <div class="filterButton" onclick="toggleFilter('Category')"><div class="filterLabel">Category</div><img class="filterIcon" src="Assets/icons/category.png" alt="category Icon"></div>
        <div class="Category" id="Category">
            <div class="filterOption" onclick="categorySelection('arm');" >Arm workouts</div>
            <div class="filterOption" onclick="categorySelection('leg');" >Leg workouts</div>
            <div class="filterOption" onclick="categorySelection('chest');" >Chest workouts</div>
            <div class="filterOption" onclick="categorySelection('all');" >Show all</div>
        </div>
        <div class="filterButton" onclick="toggleFilter('Duration')"><div class="filterLabel">Duration</div><img class="filterIcon" src="Assets/icons/clock.png" alt="clock Icon"></div>
        <div class="Duration" id="Duration">
            <div class="filterOption" onclick="durationSelection('5min');" >less than 5 minutes</div>
            <div class="filterOption" onclick="durationSelection('10min');" >5 - 10 minutes</div>
            <div class="filterOption" onclick="durationSelection('max');" >more than 10 minutes</div>
            <div class="filterOption" onclick="durationSelection('all');" >Show all</div>
        </div>
    </div>
        <!-- pushups -->
        <div class="exercise arm 5min" onclick="showDetails('pushups')">
        <img class="exerciseImg" id="pushup-Image" src="Assets/aimations/Pushups/pic1.png" alt="Pushups">
        <div class="exerciseLabel">Push Ups</div>
        <div class="exerciseCount">x15</div>
        <div class="exercieSets">4 min</div>
    </div>
    
    <div class="exerciseDetails" id="pushups">
        <img class="detailsImage-pushups" id="detailsImage-pushups" src="Assets/aimations/Pushups/pic1.png" alt="pushupImage">
        <div class="details">
            <h1>Push Ups <br> x15 - 4 min
            </h1>
            <p>
                Assume a strong plank position, hands stacked directly below elbows and shoulders (A), bend your elbows to slowly lower your chest to the floor (B). Keep your upper arms from flaring as you push back up explosively to a straight arm position. Repeat.
            </p>
        </div>
        <div class="exitButton">
            <img src="Assets/icons/cross.png" alt="cross icon" onclick="hide('pushups');">
        </div>
    </div>
</div>
<!-- feetElevatedPushups -->
<div class="exercise arm 10min" onclick="showDetails('feetElevatedPushups')">
    <img class="exerciseImg" id="feetElevatedPushups-Image" src="Assets/aimations/feetElevatedPushups/pic1.png" alt="feetElevatedPushupsImage">
    <div class="exerciseLabel">Feet Elevated Pushups</div>
    <div class="exerciseCount">x15</div>
    <div class="exercieSets">9 mins</div>
</div>

<div class="exerciseDetails" id="feetElevatedPushups">
    <img class="detailsImage-feetElevatedPushups" id="detailsImage-feetElevatedPushups" src="Assets/aimations/feetElevatedPushups/pic1.png" alt="feetElevatedPushupsImage">
    <div class="details">
        <h1>Feet Elevated Pushups <br> x15 - 9 mins
        </h1>
        <p>
            Kick both feet up onto a box or bench. Place your hands on the floor, shoulder width apart, and create a strong plank position (A). Bend your elbows to slowly lower your nose to the ground, pause here (B), keep your upper arms from flaring out as you push back up explosively. Raise or lower the box height to increase or decrease the difficulty, respectively.
        </p>
    </div>
    <div class="exitButton">
        <img src="Assets/icons/cross.png" alt="cross icon" onclick="hide('feetElevatedPushups');">
    </div>
</div>
    <!-- handsElevatedPushups -->
<div class="exercise arm 5min" onclick="showDetails('handsElevatedPushups')">
    <img class="exerciseImg" id="handsElevatedPushups-Image" src="Assets/aimations/handsElevatedPushups/pic1.png" alt="handsElevatedPushupsImage">
    <div class="exerciseLabel">Hand Elevated Pushups</div>
    <div class="exerciseCount">x15</div>
    <div class="exercieSets">2 min</div>
</div>

<div class="exerciseDetails" id="handsElevatedPushups">
    <img class="detailsImage-handsElevatedPushups" id="detailsImage-handsElevatedPushups" src="Assets/aimations/handsElevatedPushups/pic1.png" alt="handsElevatedPushupsImage">
    <div class="details">
        <h1>Feet Elevated Pushups <br> x15 - 2 min
        </h1>
        <p>
            Place your hands shoulder-width apart on a bench or box, assuming a strong plank position (A), bend your elbows to slowly lower your chest to the bench, pause here (B). Keep your upper arms from flaring out as you push back up explosively to a straight arm position. Repeat. Raise or lower the box height to decrease or increase the difficulty, respectively.
        </p>
    </div>
    <div class="exitButton">
        <img src="Assets/icons/cross.png" alt="cross icon" onclick="hide('handsElevatedPushups');">
    </div>
</div>
    <!-- benchDip -->
<div class="exercise arm max" onclick="showDetails('benchDip')">
    <img class="exerciseImg" id="benchDip-Image" src="Assets/aimations/benchDip/pic1.png" alt="benchDipImage">
    <div class="exerciseLabel">Bench Dip</div>
    <div class="exerciseCount">x15</div>
    <div class="exercieSets">12 min</div>
</div>

<div class="exerciseDetails" id="benchDip">
    <img class="detailsImage-benchDip" id="detailsImage-benchDip" src="Assets/aimations/benchDip/pic1.png" alt="benchDipImage">
    <div class="details">
        <h1>Feet Elevated Pushups <br> x15 - 12 min
        </h1>
        <p>
            Place your hands shoulder-width apart on a bench or box, assuming a strong plank position (A), bend your elbows to slowly lower your chest to the bench, pause here (B). Keep your upper arms from flaring out as you push back up explosively to a straight arm position. Repeat. Raise or lower the box height to decrease or increase the difficulty, respectively.
        </p>
    </div>
    <div class="exitButton">
        <img src="Assets/icons/cross.png" alt="cross icon" onclick="hide('benchDip');">
    </div>
</div>
    <!-- airSquats -->
<div class="exercise leg 5min" onclick="showDetails('airSquats')">
    <img class="exerciseImg" id="airSquats-Image" src="Assets/aimations/air-squat/pic1.png" alt="airSquatsImage">
    <div class="exerciseLabel">Air Squats</div>
    <div class="exerciseCount">x15</div>
    <div class="exercieSets">3 min</div>
</div>

<div class="exerciseDetails" id="airSquats">
    <img class="detailsImage-airSquats" id="detailsImage-airSquats" src="Assets/aimations/air-squat/pic1.png" alt="airSquatsImage">
    <div class="details">
        <h1>Feet Elevated Pushups <br> x15 - 3 min
        </h1>
        <p>
            Standing tall with your chest up (A), sink your hips back and bend at the knees, squatting down until the crease of your hips passes below your knee (B). Drive back up explosively and repeat, try to keep your heels on the ground and torso upright.
        </p>
    </div>
    <div class="exitButton">
        <img src="Assets/icons/cross.png" alt="cross icon" onclick="hide('airSquats');">
    </div>
</div>
<!-- forwardLunge -->
<div class="exercise legs 10min" onclick="showDetails('forwardLunge')">
    <img class="exerciseImg" id="forwardLunge-Image" src="Assets/aimations/forwardLunge/pic1.png" alt="forwardLungeImage">
    <div class="exerciseLabel">Forward Lunge</div>
    <div class="exerciseCount">x15</div>
    <div class="exercieSets">7 min</div>
</div>

<div class="exerciseDetails" id="forwardLunge">
    <img class="detailsImage-airSquats" id="detailsImage-forwardLunge" src="Assets/aimations/forwardLunge/pic1.png" alt="forwardLungeImage">
    <div class="details">
        <h1>Feet Elevated Pushups <br> x15 - 7 min
        </h1>
        <p>
            Stand tall with your chest up (A), take a step forward with one leg, bending the at the knee until the back knee gently touches the ground (B). Stand up explosively, pause and repeat with the opposite leg. Alternate legs unless otherwise other stated.
        </p>
    </div>
    <div class="exitButton">
        <img src="Assets/icons/cross.png" alt="cross icon" onclick="hide('forwardLunge');">
    </div>
</div>
<!-- butterflySitups -->
<div class="exercise chest 5min" onclick="showDetails('butterflySitups')">
    <img class="exerciseImg" id="butterflySitups-Image" src="Assets/aimations/butterflySitup/pic1.png" alt="butterflySitupsImage">
    <div class="exerciseLabel">Butterfly Sit Up</div>
    <div class="exerciseCount">x15</div>
    <div class="exercieSets">4 min</div>
</div>

<div class="exerciseDetails" id="butterflySitups">
    <img class="detailsImage-airSquats" id="detailsImage-butterflySitups" src="Assets/aimations/butterflySitup/pic1.png" alt="butterflySitupsImage">
    <div class="details">
        <h1>Feet Elevated Pushups <br> x15 - 4 min
        </h1>
        <p>
            Lay flat on your back with your legs bent, the soles of your feet together and your hands behind your head (A). Tense your abs as you sit up and forward, touching your hands to your feet (B). Reverse the move, touching the floor behind your head on each rep.
        </p>
    </div>
    <div class="exitButton">
        <img src="Assets/icons/cross.png" alt="cross icon" onclick="hide('butterflySitups');">
    </div>
</div>
    
</body>
</html>