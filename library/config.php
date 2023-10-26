<?php
// Database configuration
$dbHost = 'localhost';
$dbName = 'event_manage';
$dbUser = 'root';
$dbPass = '';

// Establish database connection
 $event_db = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
?>
