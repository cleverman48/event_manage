<?php
session_start();

// Include necessary files
require_once 'config.php';
require_once 'functions.php';

spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);

    if (strpos($className, 'Controller') !== false) {
        $classPath = __DIR__ . '/controllers/' . $className . '.php';

        if (file_exists($classPath)) {
            require_once $classPath;
        } else {
            if (strpos($className, 'Attend') !== false) {
                $classPath = __DIR__ . '/controllers/attender/' . $className . '.php';
            }
            if (file_exists($classPath)) {
                require_once $classPath;
            }
        }
    } elseif (strpos($className, 'Model') !== false) {
        // Load model class
        require_once __DIR__ . '/models/' . $className . '.php';
    } elseif (strpos($className, 'Table') !== false) {
        // Load tabel class
        require_once __DIR__ . '/migrations/' . $className . '.php';
    }
});

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle routing
    $action = $_GET['action'] ?? 'welcome';
    switch ($action) {
        case 'welcome':
            $controller = new WelcomeController();
            $controller->index();
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
        case 'event_list':
            $controller = new AttendController();
            if (!isset($_SESSION['login_userID'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $controller->event_list();
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
        case 'previewProfile':
            $controller = new AttendController();
            if (!isset($_SESSION['login_userID'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $controller->previewProfile();
            break;
        case 'oganizer_menu':
            $controller = new WelcomeController();
            if (!isset($_SESSION['login_userID'])) {
                header("Location: index.php?action=login");
                exit;
            }
            $controller->oganizer_menu();
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
            break;
        case 'register':
            $controller = new RegistrationController();
            $controller->register();
            break;
        case 'attender_update':
            $controller = new AttendController();
            $controller->attender_update();
            header("Location: index.php?action=my_page");
            break;
        default:
            // Handle invalid POST request
            break;
    }
} else {
    // Handle other request methods (e.g., PUT, DELETE, etc.)
}

?>