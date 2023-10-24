<?php 
$email = isset( $_GET['email'] ) ? $_GET['email'] : '';
$password = isset( $_GET['password'] ) ? $_GET['password'] : '';
$email_err = isset( $_GET['email_err']) ? $_GET['email_err'] : '';
if($email_err === 'empty_email' ){
    $email_err = 'メールアドレスを入力してください。';
}elseif( $email_err === 'invalid_email' ){
    $email_err = 'メールアドレス形式が正しくありません。';
}
$password_err = isset( $_GET['password_err']) ? $_GET['password_err'] : '';
if($password_err === 'empty_password'){
    $password_err = 'パスワードスを入力してください。';
}
$login_err = isset($_GET['login_err']) ? '無効なメールまたはパスワード。' : '';
if(!empty($login_err)){
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
}        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    
    <link rel="stylesheet" href="./public/css/style.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <img class="logo-img mx-auto mt-3" src="./public/image/browser.png" alt="logo">
            <div class="card-header text-center flex-direction-column pt-2">
                <h3>新規登録</h3>
                <p class="mb-2">アカウントをお持ちの方は<a href="index.php?action=register" class="footer-link pb-1 text-success">ログイン</a></p>
                <div class="card-body bg-light py-2 mb-2 mt-2" >
                    <h5 class="text-center mb-2 pb-0">登録するメリット</h5>
                    <p class="m-0 p-1">・事前に参加者情報の確認ができる</p>
                    <p class="m-0 p-1">・参加者とのマッチング希望が出せる</p>
                    <p class="m-0 p-1">・参加したイベント履歴が確認できる</p>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group d-flex justify-content-between">
                        <div class="form-group">
                            <input class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" id="email" name="email" type="text" placeholder="メール">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" id="email" name="email" type="text" placeholder="メール">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" id="email" name="email" type="text" placeholder="メール">
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" id="password" type="password" name="password" placeholder="パスワード">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">同意して新規登録</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>