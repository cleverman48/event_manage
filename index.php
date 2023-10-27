<?php
session_start();

require_once 'library/functions.php';
require_once 'library/config.php';
function requireFiles($directory) {
    $files = glob($directory . '/*.php'); // Get PHP files in the current directory
    foreach ($files as $file) {
        require_once $file;
    }
    $subdirectories = glob($directory . '/*', GLOB_ONLYDIR); // Get subdirectories
    foreach ($subdirectories as $subdirectory) {
        requireFiles($subdirectory); // Recursively require files in subdirectories
    }
    
}
$directory = __DIR__ . '/controllers'; // Specify the directory path
requireFiles($directory);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle routing
    $action = $_GET['action'] ?? 'welcome';
    switch ($action) {
        case 'welcome':
            $controller = new WelcomeController();
            $controller->index();
            break;
        case 'event_list':
            $controller = new WelcomeController();
            $controller->event_list();
            break;
        case 'event_regist':
            $controller = new WelcomeController();
            $controller->event_regist();
            break;
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
        case 'event_insert':
            $controller = new OganizerController();
            $controller->event_insert();
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
