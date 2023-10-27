<?php
session_start();

// Include necessary files
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
        case 'logout':
            $controller = new LoginController();
            $controller->logout();
            break;
        case 'register':
            $controller = new RegistrationController();
            $controller->register();
            break;
        case 'reset':
            $controller = new LoginController();
            $controller->reset();
            break;
        case 'attend_event':
            $controller = new AttendController();
            if (!isset($_SESSION['login_userID'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $controller->attend_event();
            break;
        case 'attender_list':
            $controller = new AttendController();
            if (!isset($_SESSION['login_userID'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $controller->attender_list();
            break;
        case 'my_page':
            $controller = new AttendController();
            if (!isset($_SESSION['login_userID'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $controller->my_page();
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
        case 'event_insert':
            $controller = new OganizerController($event_db);
            $controller->event_insert();
            break;
        case 'register':
            $controller = new RegistrationController();
            $controller->register();
            break;
        case 'updateAttender':
            $controller = new AttendController();
            $controller->attender_update();
            header("Location: index.php?action=my_page");
            break;
        case 'previewProfile':
            $controller = new AttendController();
            $controller->previewProfile();
            break;
        case 'returnMypage':
            $controller = new AttendController();
            $controller->my_page();
            break;
        default:
            // Handle invalid POST request
            break;
    }
} else {
    // Handle other request methods (e.g., PUT, DELETE, etc.)
}

?>