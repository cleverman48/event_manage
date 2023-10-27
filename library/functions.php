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
    global $event_db;

    $userID = isset($_SESSION['login_userID']) ? $_SESSION['login_userID'] : '';
    if ($userID != '') {
        $sql = "SELECT avatar FROM attenders WHERE userID = :userID";
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
    $pattern = '/(https?:\/\/\S+)/';
    $replacement = '<a href="$1">$1</a>';

    $linkedText = preg_replace($pattern, $replacement, $text);

    return $linkedText;
}
function file2Uri($file)
{
    $fileTmpPath = $file['tmp_name'];
    $fileMimeType = mime_content_type($fileTmpPath);
    $fileContents = file_get_contents($fileTmpPath);
    $fileBase64 = base64_encode($fileContents);
    $dataUri = 'data:' . $fileMimeType . ';base64,' . $fileBase64;

    return $dataUri;
}

?>