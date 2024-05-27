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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "<script>
                alert('Passwords do not match. Please try again.');
                window.history.back();
              </script>";
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Registered successfully');
                window.location.href = 'register.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.history.back();
              </script>";
    }

    $conn->close();
}
?>
