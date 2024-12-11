<?php
$servername = "mysql";   // Use the service name for the MySQL container in Docker Compose
$username = "root";      // MySQL username
$password = "root_password";  // MySQL root password
$dbname = "csc226";  // Your database name
$port = 3306;            // Internal port for MySQL (within the Docker container)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>