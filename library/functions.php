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
    } else {
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
function where($data, $conditions)
{
    $filteredData = [];

    foreach ($data as $item) {
        $match = true;

        foreach ($conditions as $key => $value) {
            $keys = explode(':', $key);
            $field = $keys[0];
            $operator = $keys[1] ?? '=';
            if (!isset($item[$field]) || !compareValue($item[$field], $operator, $value)) {
                $match = false;
                break;
            }
        }
        if ($match) {
            $filteredData[] = $item;
        }
    }

    return $filteredData;
}
function compareValue($value, $operator, $compare)
{
    switch ($operator) {
        case '>=':
            return $value >= $compare;
        case '<=':
            return $value <= $compare;
        case '>':
            return $value > $compare;
        case '<':
            return $value < $compare;
        case '=':
            return $value == $compare;
        default:
            return false;
    }
}
function isFavoriteExists($user_id, $event_id)
{
    $user_id = (int)$user_id;
    $event_id = (int)$event_id;
    global $event_db;
    $stmt = $event_db->prepare("SELECT * FROM event2users WHERE user_id = '$user_id' AND event_id = '$event_id' ");
    $stmt->execute();
    $event2user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($event2user){
        return $event2user[0]['favorite'];
    }
    return 0;
}
function isPartIn($user_id, $event_id)
{
    $user_id = (int)$user_id;
    $event_id = (int)$event_id;
    global $event_db;
    $stmt = $event_db->prepare("SELECT * FROM event2users WHERE user_id = '$user_id' AND event_id = '$event_id' ");
    $stmt->execute();
    $event2user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($event2user){
        return $event2user[0]['part_in'];
    }
    return 0;
}
function isMatch($match, $bematch)
{
    $match = explode(',', $match);
    $bematch = explode(',', $bematch);
    $user_id = $_SESSION['login_user'];
    if(in_array($user_id, $match) && in_array($user_id, $bematch)){
        return '<span class="far fa-heart text-danger"></span>';
    }else if(in_array($user_id, $match)){
        return '<span class="far fa-thumbs-up text-primary"></span>';
    }else if(in_array($user_id, $bematch)){
        return '<span class="far fa-thumbs-up text-success flipped-icon"></span>';
    }else{
        return '';
    }
}
?>