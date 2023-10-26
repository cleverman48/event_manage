<?php

class RegistrationController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $lastName = sanitizeInput($_POST['lastName']);
            $firstName = sanitizeInput($_POST['firstName']);
            $email = sanitizeInput($_POST['email']);
            $password = sanitizeInput($_POST['password']);
            
            // Validate and register new user
            if ($this->validateRegistration($lastName, $firstName, $email, $password)) {
                $user = new UserModel();
                $result = $user->register( $lastName, $firstName, $email, $password );
                if ( $result ){
                    if( $result === 'exist_email' ){
                        header('Location: index.php?action=register&register_err=exist_email&lastName=' . $lastName. '&firstName=' . $firstName.  '&email=' . $email . '&password=' . $password);
                        exit;
                    }
                    // // Redirect to login page or desired page
                    header('Location: index.php?action=login');
                    exit;
                }else{
                    $result = 'fault_register';
                    header('Location: index.php?action=register&register_err='. $result . '&lastName=' . $lastName. '&firstName=' . $firstName.  '&email=' . $email . '&password=' . $password);
                    exit;
                }
            } else {
                // Display registration error message
                echo 'Registration failed';
            }   
        } else {
            // Display registration form
            require 'views/registration.php';
        }
    }

    private function validateRegistration($lastName, $firstName, $email, $password)
    {
        $lastName_err = '';
        $firstName_err = '';
        $email_err = '';
        $password_err = '';
        
        if( $lastName === '' ){
            $lastName_err = 'empty_lastName';
        }
        
        if( $firstName === '' ){
            $firstName_err = 'empty_firstName';
        }
        
        if( $email === '' ){
            $email_err = 'empty_email';
        }elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
            $email_err = 'invalid_email';
        }
        
        if( $password === '' ){
            $password_err = 'empty_password';
        }
        
        if (empty($lastName_err) && empty($firstName_err) && empty($email_err) && empty($password_err)) {
            return true;
        }else{
            header('Location: index.php?action=register&lastName_err=' . $lastName_err . '&firstName_err=' . $firstName_err . '&email_err=' . $email_err . '&password_err=' . $password_err . '&lastName=' . $lastName. '&firstName=' . $firstName. '&email=' . $email . '&password=' . $password);
            exit;
        }
    }
}
?>
