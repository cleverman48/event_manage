<?php
session_start();

// Include necessary files
require_once 'config.php';
require_once 'functions.php';
require_once __DIR__ . '/controllers/LoginController.php';
require_once __DIR__ . '/controllers/RegistrationController.php';

// Handle routing
$action = $_GET['action'] ?? 'login';

// Handle routing
$action = $_GET['action'] ?? 'login';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    switch ($action) {
        case 'login':
            // Handle GET request for login page
            // Display login form
            break;
        case 'register':
            // Handle GET request for registration page
            // Display registration form
            break;
        default:
            // Handle invalid GET request
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'login':
            // Handle POST request for login
            // Process login form submission
            break;
        case 'register':
            // Handle POST request for registration
            // Process registration form submission
            break;
        default:
            // Handle invalid POST request
            break;
    }
} else {
    // Handle other request methods (e.g., PUT, DELETE, etc.)
}

?>
