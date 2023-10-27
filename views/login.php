<?php
$email = isset($_GET['email']) ? $_GET['email'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';
$email_err = isset($_GET['email_err']) ? $_GET['email_err'] : '';
if ($email_err === 'empty_email') {
    $email_err = 'メールアドレスを入力してください。';
} elseif ($email_err === 'invalid_email') {
    $email_err = 'メールアドレス形式が正しくありません。';
}
$password_err = isset($_GET['password_err']) ? $_GET['password_err'] : '';
if ($password_err === 'empty_password') {
    $password_err = 'パスワードスを入力してください。';
}
$login_err = isset($_GET['login_err']) ? '無効なメールまたはパスワード。' : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
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
            <a href="index.php" class="mx-auto mt-3" style="max-width: max-content;"><img class="logo-img " src="./public/image/browser.png" alt="logo"></a>
            <div class="card-header text-center flex-direction-column pt-2">
                <h3>ログイン</h3>
                <p>はじめてご利用の方は<a href="index.php?action=register" class="footer-link pb-1 text-success">新規登録</a></p>
            </div>
            <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>
            <div class="card-body">
                <p>メールアドレスでログイン</p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="action" id="" value="login">
                    <div class="form-group">
                        <input
                            class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $email; ?>" id="email" name="email" type="text" placeholder="メール">
                        <span class="invalid-feedback">
                            <?php echo $email_err; ?>
                        </span>
                    </div>
                    <div class="form-group position-relative">
                        <input
                            class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $password; ?>" id="password" type="password" name="password"
                            placeholder="パスワード">
                        <span toggle="#password" id="show_pass"
                            class="position-absolute fa fa-fw fa-eye field-icon toggle-password"></span>
                        <span class="invalid-feedback">
                            <?php echo $password_err; ?>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">同意してログイン</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0 text-center pt-3 pb-3">
                <p>パスワードを忘れた場合は<a href="index.php?action=reset" class="text-primary footer-link mb-2">こちら</a></p>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script>
        (function ($) {

            "use strict";

            $(".toggle-password").click(function () {

                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

        })(jQuery);
    </script>
</body>

</html>