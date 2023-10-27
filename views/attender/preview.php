<div class="dashboard-wrapper mx-auto mt-2">
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 pr-1">
                    <div class="card mb-1">
                        <div class="card-body text-center">
                            <img src="<?php echo $avatar; ?>" alt="avatar" class="rounded-circle img-fluid"
                                style="width: 150px;">
                            <div class="row">
                                <div class="col-8">
                                    <p class="text-muted mb-2">イベント参加数</p>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted mb-2">1</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <p class="text-muted mb-2">マッチングオファー数</p>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted mb-2">1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body">
                            <div class="row col-11">
                                <div class="col-sm-5">
                                    <p class="mb-0">性別</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0 text-center">
                                        <?php echo $user['gender']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row col-11">
                                <div class="col-sm-5">
                                    <p class="mb-0">年齢</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0 text-center">
                                        <?php echo $user['years']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row col-11">
                                <div class="col-sm-5">
                                    <p class="mb-0">活動エリア</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0 text-center">
                                        <?php echo $user['area']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row col-11">
                                <div class="col-sm-5">
                                    <p class="mb-0">業種</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0 text-center">
                                        <?php echo $user['sector']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row col-11">
                                <div class="col-sm-5">
                                    <p class="mb-0">組織規模</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0 text-center">
                                        <?php echo $user['employee_size']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row col-11">
                                <div class="col-sm-5">
                                    <p class="mb-0">部署名</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0 text-center">
                                        <?php echo $user['depart']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row col-11">
                                <div class="col-sm-5">
                                    <p class="mb-0">役職</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-muted mb-0 text-center">
                                        <?php echo $user['position']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pl-1">
                    <div class="card mb-1">
                        <!-- <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-globe fa-lg text-warning"></i>
                                    <p class="mb-0">https://mdbootstrap.com</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                    <p class="mb-0">@mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                    <p class="mb-0">mdbootstrap</p>
                                </li>
                            </ul>
                        </div> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">企業名</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $user['company']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">姓　名</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $username; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="" class="mb-0"><i class="fas fa-home fa-lg" style="color: black;"></i></a>
                                </div>
                                <div class="col-sm-9">
                                    <a href="<?php echo $user['homepage']; ?>" class="mb-0">
                                        <?php echo $user['homepage']; ?>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="" class="mb-0"><i class="fab fa-facebook-f fa-lg"
                                            style="color: #3b5998;"></i></a>
                                </div>
                                <div class="col-sm-9">
                                    <a href="https://www.facebook.com/*****"
                                        class="mb-0">https://www.facebook.com/aaaaaa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <h5 class="mb-4 card-header">プロフィール</h5>
                                    <p style="white-space: pre-line; height: 220px; overflow-y: scroll;">
                                        <?php echo url2link($user['profile']); ?>
                                    </p>
                                    <form action="index.php" method="post" class="d-flex justify-content-end mb-2 mr-3">
                                        <input type="hidden" name="action" value="returnMypage">
                                        <button type="submit" class="btn btn-success mt-2 mr-4">確認</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>