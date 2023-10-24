<?php
class WelcomeController
{
    public function index()
    {
        require 'views/header.php';
        require 'views/welcome.php';
        require 'views/footer.php';
    }

    public function oganizer_menu()
    {
        require 'views/header.php';
        require 'views/oganizer/menu.php';
        require 'views/footer.php';
    }
}
?>
