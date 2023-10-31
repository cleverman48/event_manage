<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Tokyo');

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

$query = "CREATE DATABASE IF NOT EXISTS $dbName 
          DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

if ($conn->query($query) === TRUE) {
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
$event_db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
?>