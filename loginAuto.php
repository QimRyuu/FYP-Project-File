<!DOCTYPE html>
<html>
<head>
    <title>Login Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            text-align: center;
            margin-top: 100px;
        }
        
        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        h2 {
            color: #333;
        }

        p {
            color: #777;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }

        .redirect-link {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            background-color: #04AA6D;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .redirect-link:hover {
            background-color: #21825c;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $servername="localhost"; // Host name
        $username="root"; // Mysql username
        $password=""; // Mysql password
        $dbName="db_login"; // Database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbName);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Define $myusername and $mypassword
        $email = $_POST['email'];
        $password = $_POST['password'];
        $uType = $_POST['uType'];

        $sql = "SELECT email, password, uType FROM admin WHERE email='$email' AND password='$password' AND uType='$uType'";

        $result = $conn->query($sql);

        // Check if user exists
        if ($result->num_rows > 0) {
            echo "<h2>Login Successful!</h2>";
            echo "<p>Welcome back, $email!</p>";
            echo "<a href='adminpanel.html' class='redirect-link'>Continue to Search</a>";
        } else {
            echo "<h2>Login Failed</h2>";
            echo "<p class='error-message'>Wrong Username or Password. Please try again.</p>";
            echo "<a href='index.html' class='redirect-link'>Back to Login</a>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
