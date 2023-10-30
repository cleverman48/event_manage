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
function sns2icon($link)
{
    if (strpos($link, 'facebook') !== false) {
        return 'fa-facebook-f facebook-color';
    } elseif (strpos($link, 'twitter') !== false) {
        return 'fa-twitter twitter-color';
    } elseif (strpos($link, 'youtube') !== false) {
        return 'fa-youtube youtube-color';
    } elseif (strpos($link, 'linkedin') !== false) {
        return 'fa-linkedin-in linkedin-color';
    }
    else {
        return 'Unknown';
    }
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
function find($array, $condition)
{
    foreach ($array as $item) {
        $matchesCondition = true;
        
        foreach ($condition as $key => $value) {
            if (!isset($item[$key]) || $item[$key] != $value) {
                $matchesCondition = false;
                break;
            }
        }
        
        if ($matchesCondition) {
            return $item;
        }
    }

    return null;
}
function where($array, $condition)
{
    $filteredArray = [];

    foreach ($array as $item) {
        $matchesCondition = true;

        foreach ($condition as $key => $value) {
            if (!isset($item[$key]) || $item[$key] !== $value) {
                $matchesCondition = false;
                break;
            }
        }

        if ($matchesCondition) {
            $filteredArray[] = $item;
        }
    }

    return $filteredArray;
}
?>