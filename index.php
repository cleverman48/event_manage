<?php
session_start();

// Include necessary files
require_once 'config.php';
require_once 'functions.php';

spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    require_once __DIR__ . '/controllers/' . $className . '.php';
});

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle routing
    $action = $_GET['action'] ?? 'login';
    switch ($action) {
        case 'login':
            $controller = new LoginController();
            $controller->login();
            break;
        case 'register':
            $controller = new RegistrationController();
            $controller->register();
            break;
        default:
            // Handle invalid action
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle routing
    $action = $_POST['action'] ?? 'login';
    switch ($action) {
        case 'login':
            $controller = new LoginController();
            $controller->login();
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