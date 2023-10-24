<?php
class LoginController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $email = sanitizeInput($_POST['email']);
            $password = sanitizeInput($_POST['password']);
            $email_err = '';
            $password_err = '';
            
            if( $email === '' ){
                $email_err = 'empty_email';
            }elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
                $email_err = 'invalid_email';
            }

            if( $password === '' ){
                $password_err = 'empty_password';
            }

            if( empty($email_err) && empty($password_err) ){
                // Validate user credentials
                if ($this->validateCredentials($email, $password)) {
                    // Set user session
                    $_SESSION['email'] = $email;
                    // Redirect to dashboard or desired page
                    header('Location: dashboard.php');
                    exit;
                } else {
                    header('Location: index.php?login_err=err&email='. $email . '&password=' . $password);
                    exit;
                }
            }else{
                header('Location: index.php?email_err='. $email_err .'&password_err='. $password_err .'&email='. $email . '&password=' . $password);
                exit;
            }
        } else {
            // Display login form
            require 'views/login.php';
        }
    }

    private function validateCredentials($email, $password)
    {
        // Implement logic to validate user credentials against the database
        // Query the database using prepared statements and compare the stored password hash
        // Return true if the credentials are valid, false otherwise
    }
}
?>
