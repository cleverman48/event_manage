<div class="dashboard-wrapper mx-auto mt-2">
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 p-1">
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
                                        <?php echo $attender['gender']; ?>
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
                                        <?php echo $attender['years']; ?>
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
                                        <?php echo $attender['area']; ?>
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
                                        <?php echo $attender['sector']; ?>
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
                                        <?php echo $attender['employee_size']; ?>
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
                                        <?php echo $attender['depart']; ?>
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
                                        <?php echo $attender['position']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 p-1">
                    <div class="card mb-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">企業名</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        <?php echo $attender['company']; ?>
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
                                        <?php echo $attendername; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="" class="mb-0"><i class="fas fa-home fa-lg" style="color: black;"></i></a>
                                </div>
                                <div class="col-sm-9">
                                    <a href="<?php echo $attender['homepage']; ?>" class="mb-0">
                                        <?php echo $attender['homepage']; ?>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="" class="mb-0"><i class="fab <?php echo sns2icon($attender['sns']) ;?> fa-lg">
                                        </i>
                                    </a>
                                </div>
                                <div class="col-sm-9">
                                    <a href="<?php echo $attender['sns']; ?>" class="mb-0">
                                        <?php echo $attender['sns']; ?>
                                    </a>
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
                                        <?php echo url2link($attender['attender_profile']); ?>
                                    </p>
                                    <form action="index.php" method="<?php echo ($returnPage) ? 'post' : 'get'; ?>"
                                        class="d-flex justify-content-end mb-2 mr-3">
                                        <input type="hidden" name="action"
                                            value="<?php echo ($returnPage) ? 'returnMypage' : 'my_page'; ?>">
                                        <input type="hidden" name="data"
                                            value="<?php echo htmlspecialchars(json_encode($attender)); ?>">
                                        <input type="hidden" name="avatar" value="<?php echo $avatar; ?>">
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
</div>