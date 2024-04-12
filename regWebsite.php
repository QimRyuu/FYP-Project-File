<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "register_2"; 

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$message = ''; // Initialize message variable
$error_message = ''; // Initialize error message variable

if (isset($_POST['save'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $uType = $_POST['uType'];

    // Check if the email already exists in the database
    $check_query = "SELECT * FROM regfyp WHERE email='$email'";
    $result = mysqli_query($conn, $check_query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        // If a duplicate email is found, prevent the user from accessing the website
        die("Duplicate Account: This email is already registered.");
    } else {
        // Proceed with registration if the email is unique
        $sql_query = "INSERT INTO regfyp (email, password, uType)
            VALUES ('$email', '$password', '$uType')";

        if (mysqli_query($conn, $sql_query)) {
            $message = "Registered successfully!";
        } else {
            $error_message = "Error: " . $sql_query . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
        .success {
            color: #4caf50;
        }
        .error {
            color: #f44336;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($message)): ?>
            <h2 class="success"><?php echo $message; ?></h2>
        <?php elseif (isset($error_message)): ?>
            <h2 class="error"><?php echo $error_message; ?></h2>
        <?php endif; ?>
        <form action="search.html" method="post">
            <h2>Hye, Welcome To Our Website !!</h2>
            <p style="text-align:center;"><img src="feha.jpeg"width="400"height="150"></p>
            <p>Click the button below to access our website:</p>
            <input type="submit" name="go" value="Access Website">
        </form>
    </div>
</body>
</html>
