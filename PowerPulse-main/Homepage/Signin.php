<?php
session_start(); // Start the session at the beginning

// Include the database name username password
include '../../username_database_password_server.php';

$conn = new mysqli($db_host, $db_user, $db_pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'], $_POST['password'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

     // Hash the password using MD5
     $hashed_password = md5($password);

    
     $email = $conn->real_escape_string($email);
     $hashed_password = $conn->real_escape_string($hashed_password);
 
     // Create the SQL query
     $sql = "SELECT * FROM user WHERE Email = '$email' AND Password = '$hashed_password'";
     $result = mysqli_query($conn,$sql);
    
     if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);   

       
        $_SESSION['email'] = $row['Email'];
        $_SESSION['username'] = $row['UserName'];
        $_SESSION['logged_in'] = true;
         header("Location: Home.php");
         exit();
     } else {
         echo "Wrong Username or Password";
     }
 }
$conn->close();
?>