<?php
require_once 'models/UserModel.php';
require_once 'models/EventModel.php';
require_once 'models/Event2UserModel.php';
class WelcomeController
{
    public function index()
    {
        $eventModel = new EventModel();
        $events = $eventModel->getAllEvents();

        $userModel = new UserModel();
        $users = $userModel->all();
        
        $event2userModel = new Event2UserModel();
        $event2users = $event2userModel->all();
        require 'views/attender/header.php';
        require 'views/welcome.php';
        require 'views/footer.php';
    }
    public function event_list()
    {
        require 'views/oganizer/org_header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/event_list.php';
        require 'views/footer.php';
    }
    public function event_regist()
    {
        require 'views/oganizer/org_header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/event_regist.php';
        require 'views/footer.php';
    }
    public function event_detail()
    {
        $event_model = new EventModel();
        $event_id = $_GET['event_id'];
        $event = $event_model->getEventById($event_id);
        require 'views/oganizer/org_header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/event_detail.php';
        require 'views/footer.php';
    }
    public function getParticipants($event_id)
    {
        require 'views/oganizer/org_header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/participants.php';
        require 'views/footer.php';
    }
    public function publicSettingPage()
    {
        require 'views/oganizer/org_header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/attender_detail_public_setting.php';
        require 'views/footer.php';
    }
    public function organizerInfoPage()
    {
        require 'views/oganizer/org_header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/organizer_info.php';
        require 'views/footer.php';
    }
    public function staffManagePage()
    {
        require 'views/oganizer/org_header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/staff_manage.php';
        require 'views/footer.php';
    }
    public function informSettingPage()
    {
        require 'views/oganizer/org_header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/inform_setting.php';
        require 'views/footer.php';
    }
}
?>
