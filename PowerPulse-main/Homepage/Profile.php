<?php
session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Include the database name username password
include '../../username_database_password_server.php';

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['email'];
$username = $_SESSION['username'];

// Create the SQL query with placeholders
$stmt = $conn->prepare("SELECT * FROM user WHERE UserName=? AND Email=?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $gender = $row["Gender"];
    $age = $row["Age"];
    $weight = $row["Current_Weight"];
    $goal_weight = $row["Goal_Weight"];
    $height = $row["Height"];
    $bmi = $row["Bmi"];
    $plan = $row["Plan"];
} else {
    echo "No user found.";
}


// Fetch calories log
$sql_calorie = "SELECT * FROM calorie WHERE email='$email'";
$result_cal = mysqli_query($conn, $sql_calorie);

$calories_log = [];
if (mysqli_num_rows($result_cal) > 0) {
    while ($calories_row = mysqli_fetch_assoc($result_cal)) {
        $calories_log[] = $calories_row;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calories_consumed = $_POST['calories_consumed'];
    $calories_burnt = $_POST['calories_burnt'];
    $timestamp = date("Y-m-d ");
    $day = date("l"); // Get the current day of the week

    $insert_stmt = $conn->prepare("INSERT INTO calorie ( email, Calories_consumed, Calories_burnt, Timestamp) VALUES ( ?, ?, ?, ?)");
    $insert_stmt->bind_param("sdds", $email, $calories_consumed, $calories_burnt, $timestamp);
    $insert_stmt->execute();
    
    // Refresh the page to update the calorie log
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="Profile_style.css">
</head>
<body>
<nav>    
    <div class="navBackground"></div>    
    <a href="http://localhost/PowerPulse-main/Homepage/Home.php" target="_self"><div class="logo">PWRpulse</div></a>
    <div class="nav-items">
        <a href="http://localhost/PowerPulse-main/Homepage/Exercise.php">Exercises</a>
        <a href="http://localhost/PowerPulse-main/Homepage/Quiz.php">Quiz</a>
        <a href="http://localhost/PowerPulse-main/Homepage/Diets.php">Diets</a>
        <?php if (isset($_SESSION['logged_in'])) { ?>
            <a href="http://localhost/PowerPulse-main/Homepage/logout_PWRplus.php">Log out</a>
            <a href="http://localhost/PowerPulse-main/Homepage/Profile.php">
                <input type="image" src="images/Profile.png" width="40px" height="40px" style="align-self: center;  border-radius: 30px;">
            </a>
        <?php } else { ?>
            <a href="sign_in.html">
                <input type="image" src="images/Profile.png" width="40px" height="40px" style="align-self: center;  border-radius: 30px;">
            </a>
        <?php } ?>
    </div>
</nav>
<br><br><br>
<div class="profile-wrapper">
    <div class="Profile-container">
        <h2>Your information</h2>
        <form>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $username ?>" readonly>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo $email ?>" readonly>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo $gender ?>" readonly>

            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value="<?php echo $age ?>" readonly>

            <label for="weight">Current Weight:</label>
            <input type="text" id="weight" name="weight" value="<?php echo $weight ?>kg" readonly>

            <label for="goal_weight">Goal Weight:</label>
            <input type="text" id="goal_weight" name="goal_weight" value="<?php echo $goal_weight ?>kg" readonly>

            <label for="height">Height:</label>
            <input type="text" id="height" name="height" value="<?php echo $height ?>cm" readonly>

            <label for="bmi">BMI:</label>
            <input type="text" id="bmi" name="bmi" value="<?php echo $bmi ?>" readonly>

            <label for="plan">Plan:</label>
            <input type="text" id="plan" name="plan" value="<?php echo $plan ?>" readonly>
        </form>
    </div>
    <div class="Profile-container">
        <h2>Calorie log</h2>
        <div class="calories-entry">
            <h3>Enter Calories</h3>
            <form id="caloriesForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input-group">
                    <label for="calories_consumed">Calories Consumed:</label>
                    <input type="number" id="calories_consumed" name="calories_consumed" required>
                </div>
                <div class="input-group">
                    <label for="calories_burnt">Calories Burnt:</label>
                    <input type="number" id="calories_burnt" name="calories_burnt" required>
                </div>
                <button type="submit" class="submitBtn">Submit</button>
            </form>
        </div>
        <table style="text-align: center; width: 100%; padding-top: 30px;">
    <thead>
        <tr style="font-size: 20px; background-color: #f2f2f2; color: #333;">
            <th style="padding: 5px; border: 1px solid #ddd;">Calories Consumed</th>
            <th style="border: 1px solid #ddd;">Calories Burnt</th>
            <th style="border: 1px solid #ddd;">Timestamp</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($calories_log as $log) { ?>
            <tr style="font-size: 20px; background-color: #fff;">
                <td style="padding: 5px; border: 1px solid #ddd;"><?php echo isset($log['Calories_consumed']) ? $log['Calories_consumed'] : 'N/A'; ?></td>
                <td style="border: 1px solid #ddd;"><?php echo isset($log['Calories_burnt']) ? $log['Calories_burnt'] : 'N/A'; ?></td>
                <td style="border: 1px solid #ddd;"><?php echo isset($log['Timestamp']) ? $log['Timestamp'] : 'N/A'; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    </div>
</div>
</body>
</html>
