<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cakeshopdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful";
            // Start a session and save user info here
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with this email";
    }

    $conn->close();
}
?>
