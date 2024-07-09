<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Data sanitization and validation
$username = mysqli_real_escape_string($conn, $_POST['name']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

// Validate input
if (empty($username) || empty($pass)) {
    die("Please fill all fields.");
}

// Hash the password
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Insert data into the database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
