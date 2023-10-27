<?php
class WelcomeController
{
    public function index()
    {
        require 'views/attender/header.php';
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
}
?>
