<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "db_login"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$myemail = $_POST['email'];
$mypassword = $_POST['password'];
$userType = $_POST['user_type'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement to insert user details into the database
$stmt = $conn->prepare("INSERT INTO users (email, password, user_type) VALUES (email, password, uType)");
$stmt->bind_param("sss", $email, $hashedPassword, $userType);
$stmt->execute();

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect to login page
header("Location: index.html");
exit();
?>
