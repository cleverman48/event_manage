<div class="dashboard-wrapper mx-auto mt-2">
    <div class="container-fluid dashboard-content col-lg-10 col-md-12 mx-auto">
        <div class="row"></div>
        <input type="hidden" name="returnPage" value="<?php echo $returnPage ;?>">
        <div class="card main-center px-3 py-3">
            <div class="card-header px-0 py-0">
                <h5 class="mb-0">マイページ</h5>
            </div>
            <div class="card-body">
                <form action="index.php" method="post" class="form-id" enctype="multipart/form-data">
                    <input type="hidden" name="action" id="action" value="">
                    <div class="">
                        <div class="form-group row">
                            <label for="userID" class="col-12 col-sm-3 col-form-label text-sm-right">ID</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="userID" class="form-control" disabled
                                    value="<?php echo $_SESSION['login_userID']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-12 col-sm-3 col-form-label text-sm-right">プロフィール画像</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="file" name="avatar" id="avatarInput" class="form-control-file possibleChange" disabled accept="image/*">
                                <input type="hidden" name="avatar" value="<?php echo $user['avatar'] ;?>">
                                <div style="max-width: max-content;" class="mx-auto mt-4">
                                    <img id="avatarPreview" src="<?php echo (isset($avatar)) ? $avatar : $user['avatar']?>" alt="Avatar Preview" style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_name" class="col-12 col-sm-3 col-form-label text-sm-right">姓　名</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="user_name" class="form-control possibleChange" disabled
                                    value="<?php echo $username; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-12 col-sm-3 col-form-label text-sm-right">メールアドレス</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="email" class="form-control possibleChange" disabled
                                    value="<?php echo $user['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="company" class="col-12 col-sm-3 col-form-label text-sm-right">企業名</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="company" class="form-control possibleChange" disabled
                                    value="<?php echo $user['company']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-12 col-sm-3 col-form-label text-sm-right">性別</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="gender" id="gender" class="form-control possibleChange" disabled>
                                    <?php foreach ($info_set['gender'] as $gender): ?>
                                        <option value="<?= $gender ?>" <?= ($gender == $user['gender']) ? 'selected' : '' ?>>
                                            <?= $gender ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="years" class="col-12 col-sm-3 col-form-label text-sm-right">年齢</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="years" id="years" class="form-control possibleChange" disabled>
                                    <?php foreach ($info_set['years'] as $years): ?>
                                        <option value="<?= $years ?>" <?= ($years == $user['years']) ? 'selected' : '' ?>>
                                            <?= $years ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area" class="col-12 col-sm-3 col-form-label text-sm-right">活動エリア</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="area" id="area" class="form-control possibleChange" disabled>
                                    <?php foreach ($info_set['area'] as $area): ?>
                                        <option value="<?= $area ?>" <?= ($area == $user['area']) ? 'selected' : '' ?>>
                                            <?= $area ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sector" class="col-12 col-sm-3 col-form-label text-sm-right">業種</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="sector" id="sector" class="form-control possibleChange" disabled>
                                    <?php foreach ($info_set['sector'] as $sector): ?>
                                        <option value="<?= $sector ?>" <?= ($sector == $user['sector']) ? 'selected' : '' ?>>
                                            <?= $sector ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="employee_size" class="col-12 col-sm-3 col-form-label text-sm-right">組織規模</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="employee_size" id="employee_size" class="form-control possibleChange" disabled>
                                    <?php foreach ($info_set['employee_size'] as $employee_size): ?>
                                        <option value="<?= $employee_size ?>" <?= ($employee_size == $user['employee_size']) ? 'selected' : '' ?>>
                                            <?= $employee_size ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="depart" class="col-12 col-sm-3 col-form-label text-sm-right">部署名</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="depart" id="depart" class="form-control possibleChange" disabled>
                                    <?php foreach ($info_set['depart'] as $depart): ?>
                                        <option value="<?= $depart ?>" <?= ($depart == $user['depart']) ? 'selected' : '' ?>>
                                            <?= $depart ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-12 col-sm-3 col-form-label text-sm-right">役職</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <select name="position" id="position" class="form-control possibleChange" disabled>
                                    <?php foreach ($info_set['position'] as $position): ?>
                                        <option value="<?= $position ?>" <?= ($position == $user['position']) ? 'selected' : '' ?>>
                                            <?= $position ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="homepage" class="col-12 col-sm-3 col-form-label text-sm-right">ホームページ</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <input type="text" name="homepage" class="form-control possibleChange" disabled
                                    value="<?php echo $user['homepage']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile" class="col-12 col-sm-3 col-form-label text-sm-right">プロフィール</label>
                            <div class="col-12 col-sm-8 col-lg-6">
                                <textarea name="profile" id="profile" cols="30" rows="10" class="form-control possibleChange" disabled><?php echo $user['profile'] ;?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" id="previewButton" class="btn btn-warning mr-3">マイページ画面を確認</button>
                        <button type="button" id="updateButton" class="btn btn-success">確認</button>
                        <button type="button" id="changeButton" class="btn btn-dark">変更</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script src="public/js/attender/attender.js"></script>