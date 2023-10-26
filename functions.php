<?php
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
function my_avatar()
{
    global $db;
    $userID = isset($_SESSION['login_userID']) ? $_SESSION['login_userID'] : '';
    if ($userID !== '') {
        $sql = "SELECT avatar FROM attenders WHERE userID = :userID";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['avatar'];
    } else {
        return 'public/image/upload/user.png';
    }
}
function url2link($text)
{
    $pattern = '/(http:\/\/\S+)/';
    $replacement = '<a href="$1">$1</a>';

    $linkedText = preg_replace($pattern, $replacement, $text);

    return $linkedText;
}
?>