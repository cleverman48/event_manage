<?php
require_once 'models/UserModel.php';
class LoginController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $email = sanitizeInput($_POST['email']);
            $password = sanitizeInput($_POST['password']);
            
            // Validate user credentials
            if ($this->validateCredentials($email, $password)) {
                $userModel = new UserModel();
                $loggedIn = $userModel->authentication($email, $password);
                if( $loggedIn ){
                    $_SESSION['email'] = $email;
                    header('Location: index.php');
                    exit;
                }else{
                    header('Location: index.php?action=login&login_err=err&email=' . $email . '&password=' . $password);
                    exit;
                }
            } 
        } else {
            // Display login form
            require 'views/login.php';
        }
    }
    public function logout(){
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
    public function reset()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $email = sanitizeInput($_POST['email']);
            // Validate email credentials
            if ($email === '') {
                $email_err = 'empty_email';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = 'invalid_email';
            }

            if( empty($email_err) ){
                $userModel = new UserModel();
                $reset = $userModel->reset($email);
            }else{
                header('Location: index.php?action=reset&email_err=err&email=' . $email);
                exit;
            }
        } else {
            // Display login form
            require 'views/resetPassword.php';
        }
    }
    private function validateCredentials($email, $password)
    {
        $email_err = '';
        $password_err = '';
        if ($email === '') {
            $email_err = 'empty_email';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = 'invalid_email';
        }

        if ($password === '') {
            $password_err = 'empty_password';
        }

        if (empty($email_err) && empty($password_err)) {
            return true;
        }else{
            header('Location: index.php?action=login&email_err=' . $email_err . '&password_err=' . $password_err . '&email=' . $email . '&password=' . $password);
            exit;
        }
    }
}
?>