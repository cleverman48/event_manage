<?php
session_start();

// Include necessary files
require_once 'library/functions.php';
require_once 'library/config.php';

function requireFiles($directory)
{
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

function checkSesson($action)
{
    if ($action == 'welcome') {
        $controller = new WelcomeController();
        $controller->index();
        return;
    }
    if ($action == 'login') {
        $controller = new LoginController();
        $controller->login();
        return;
    }
    if ($action == 'register') {
        $controller = new RegistrationController();
        $controller->register();
        return;
    }
    if (!isset($_SESSION['login_userID'])) {
        header("Location: index.php?action=login");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle routing
    $action = $_GET['action'] ?? 'welcome';
    checkSesson($action);
    switch ($action) {
        /*START ognaizer menu GET*////////////////////////////////////////////////////////////////
        case 'event_list':
            $controller = new WelcomeController();
            $controller->event_list();
            break;
        case 'event_regist':
            $controller = new WelcomeController();
            $controller->event_regist();
            break;
        case 'event_detail':
            $controller = new WelcomeController();
            $controller->event_detail();
            break;
        case 'oganizer_participants':
            $controller = new WelcomeController();
            $event_id = $_GET['event_id'] ?? 'all';
            $controller->getParticipants($event_id);
            break;
        case 'attender_detail_public_setting':
            $controller = new WelcomeController();
            $controller->publicSettingPage();
            break;
        case 'organizer_info':
            $controller = new WelcomeController();
            $controller->organizerInfoPage();
            break;
        case 'staff_manage':
            $controller = new WelcomeController();
            $controller->staffManagePage();
            break;
        case 'inform_setting':
            $controller = new WelcomeController();
            $controller->informSettingPage();
            break;
        //*END ognaizer menu  GET*/////////////////////////////////////////////////////////////////////   
        case 'logout':
            $controller = new LoginController();
            $controller->logout();
            break;
        case 'reset':
            $controller = new LoginController();
            $controller->reset();
            break;
        case 'attend_event':
            $controller = new AttendController();
            $controller->attend_event();
            break;
        case 'attender_list':
            $controller = new AttendController();
            $controller->attender_list();
            break;
        case 'my_page':
            $controller = new AttendController();
            $controller->my_page();
            break;
        case 'attendEvent':
            $controller = new AttendController();
            $controller->attendEvent();
            header("Location: index.php?action=attend_event");
            break;
        case 'attenderPage':
            $controller = new AttendController();
            $controller->attenderPage();
            break;
        case 'matchAttender':
            $controller = new AttendController();
            $controller->matchAttender();
            header("Location: index.php?action=attender_list&event=".$_GET['event']);
            break;
        default:
            // Handle invalid action
            break;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle routing
    $action = $_POST['action'] ?? 'login';
    checkSesson($action);
    switch ($action) {
        /*START oganizer menu POST*///////////////////////////////////////////////////////////////////
        case 'event_insert':
            $controller = new OganizerController();
            $controller->event_insert();
            break;
        case 'event_update':
            $controller = new OganizerController();
            $controller->event_update();
            break;
        case 'get_eventlist':
            $controller = new OganizerController();
            $controller->get_eventlist();
            break;
        case 'get_attenderlist':
            $controller = new AttenderManageController();
            $controller->get_attenderlist();
            break;
        /*END oganizer menu POST*//////////////////////////////////////////////////////////////////////
        case 'updateAttender':
            $controller = new AttendController();
            $controller->attender_update();
            header("Location: index.php?action=my_page");
            break;
        case 'updateNoti':
            $controller = new AttendController();
            $controller->attender_update();
            header("Location: index.php");
            break;
        case 'previewProfile':
            $controller = new AttendController();
            $controller->previewProfile();
            break;
        case 'returnMypage':
            $controller = new AttendController();
            $controller->my_page();
            break;
        case 'add_favorite':
            $controller = new AttendController();
            $controller->add_favorite();

        default:
            // Handle invalid POST request
            break;
    }
} else {
    // Handle other request methods (e.g., PUT, DELETE, etc.)
}

?>