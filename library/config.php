<?php
// Database configuration
$dbHost = 'localhost';
$dbName = 'event_manage';
$dbUser = 'root';
$dbPass = '';

// Create a connection to the MySQL server
$conn = new mysqli($dbHost, $dbUser, $dbPass);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the CREATE DATABASE query
$query = "CREATE DATABASE IF NOT EXISTS $dbName 
          DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";
// Execute the query
if ($conn->query($query) === TRUE) {
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
$event_db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
?>