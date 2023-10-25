<?php
// Helper functions

function sanitizeInput($input)
{
    $input = trim($input);

    // Remove backslashes
    $input = stripslashes($input);

    // Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    return $input;
}

function hashPassword($password)
{
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    return $hashedPassword;
}
?>
