<!DOCTYPE html>
<html>

<head>
    <title>イベント</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <link rel="stylesheet" href="public/css/style.css">
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <style>
    .my-h-wrapper {
        position: fixed;
        top:0;
        width: 100%;
        z-index: 100;
    }
    .my-b-wrapper {
        /* position: absolute; */
        margin-top:60px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 800px;
    }
    .my-f-wrapper {
        position:fixed;
        bottom: 0;
        width: 100%;
    }   
</style>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top d-flex justify-content-between">
                <a class="navbar-brand" href="index.php"><img class="logo" src="public/image/logo.png" alt=""></a>
                <div class="" id="navbarSupportedContent">
                    <ul class="d-flex pl-0 mb-0 list-unstyled ml-auto navbar-right-top">
                        <div class="head_bt_pan mr-3 d-flex align-items-center">
                            <a href="index.php?action=attend_event" id="attend_event-btn"
                                class="btn btn-primary mr-3">参加イベント</a>
                            <a href="#" id="favourite_event-btn" class="btn btn-primary mr-3">お気に入りイベント</a>
                        </div>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo my_avatar(); ?>" alt="" class="user-avatar-md rounded-circle">
                                <i class="fas fa-chevron-down mr-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <a class="dropdown-item" href="index.php?action=my_page"><i
                                        class="fas fa-user mr-2"></i>マイページ</a>
                                <a class="dropdown-item" href="index.php?action=attend_event" id="attend_event-drop"><i
                                        class=" fas fa-ticket-alt mr-2"></i>参加イベント</a>
                                <a class="dropdown-item" href="#" id="favourite_event-drop"><i
                                        class="fas fa-heart mr-2"></i>お気に入りイベント</a>
                                <a class="dropdown-item" href="index.php?action=event_list"><i
                                        class="fas fa-users mr-2"></i>主催者メニュー</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>通知設定</a>
                                <a class="dropdown-item" href="index.php?action=logout"><i
                                        class="fas fa-power-off mr-2"></i>ログアウト</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>