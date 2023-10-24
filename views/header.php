<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <!-- Add your CSS and other head elements here -->
    
</head>
<body>

<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
<link rel="stylesheet" href="assets/libs/css/style.css">
<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
<link rel="stylesheet" href="assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
<link rel="stylesheet" href="assets/vendor/inputmask/css/inputmask.css" />
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
<div class="my-h-wrapper">
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="index.php">Event Manage</a>            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">          
                <ul class="navbar-nav ml-auto navbar-right-top">        
                    <div class="head_bt_pan mr-3 d-flex align-items-center">
                        <a href="#" class="btn btn-primary mr-3" >参加イベント</a>
                        <a href="#" class="btn btn-primary mr-3" >お気に入りイベント</a>           
                    </div>              
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="public/image/avatar/3.png" alt="" class="user-avatar-md rounded-circle">
                            <i class="fas fa-chevron-down mr-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">                   
                            <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>マイページ</a>
                            <a class="dropdown-item" href="index.php?action=oganizer_menu"><i class="fas fa-users mr-2"></i>主催者メニュー</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>通知設定</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>ログアウト</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>