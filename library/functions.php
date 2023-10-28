<?php
function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
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
    global $event_db;

    $userID = isset($_SESSION['login_userID']) ? $_SESSION['login_userID'] : '';
    if ($userID != '') {
        $sql = "SELECT avatar FROM users WHERE userID = :userID";
        $stmt = $event_db->prepare($sql);
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
    $pattern = '/(https?:\/\/\S+|[\w.-]+@[\w.-]+\.[\w]+)/';
    $replacement = '<a href="$1" style="color:blue;">$1</a>';

    $linkedText = preg_replace($pattern, $replacement, $text);

    return $linkedText;
}
function uploadImage($file)
{
    $targetDirectory = 'public/image/upload/';
    $originalFilename = basename($file['name']);
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    $userID = $_SESSION['login_userID'];
    $targetFilename = uniqid() . '_' . $userID . '.' . $extension;
    $targetPath = $targetDirectory . $targetFilename;
    move_uploaded_file($file['tmp_name'], $targetPath);

    return $targetPath;
}
?>