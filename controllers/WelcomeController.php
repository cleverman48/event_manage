<?php
require_once 'models/EventModel.php';
class WelcomeController
{
    public function index()
    {
        require 'views/header.php';
        require 'views/welcome.php';
        require 'views/footer.php';
    }
    public function event_list()
    {
        require 'views/header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/event_list.php';
        require 'views/footer.php';
    }
    public function event_regist()
    {
        require 'views/header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/event_regist.php';
        require 'views/footer.php';
    }
    public function event_detail()
    {
        $event_model = new EventModel();
        $event_id = $_GET['event_id'];
        $event = $event_model->getEventById($event_id);
        require 'views/header.php';
        require 'views/oganizer/menu.php';
        require 'views/oganizer/event_detail.php';
        require 'views/footer.php';
    }
}
?>
