<link rel="stylesheet" href="public/css/oganizer/menu.css">

<div class="page-wrapper">
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">          
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">      
                        <li class="nav-divider">主催者メニュー</li>                  
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?action=event_list" ><i class="fa fa-fw fa-rocket"></i>イベント一覧 </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=oganizer_participants" ><i class=" fas fa-users"></i>参加者一覧</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=attend_event" ><i class="fas fa-list"></i>参加者メニュー</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fas fa-cog"></i>各種設定</a>
                            <div id="submenu-4" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?action=attender_detail_public_setting">参加者詳細公開設定</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?action=organizer_info">主催者情報</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?action=staff_manage">スタッフ管理</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?action=inform_setting">通知設定</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=logout" ><i class="fas fa-power-off"></i>ログアウト</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>  
</div>