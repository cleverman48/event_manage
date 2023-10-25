<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リセット</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="./assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <link rel="stylesheet" href="./assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
    <!-- forgot password  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center">パスワードリセット</div>
            <div class="card-body">
                <form>
                    <p>メールアドレスを入力</p>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="メールアドレス" autocomplete="off">
                    </div>
                    <div class="form-group pt-1"><a class="btn btn-block btn-primary btn-xl" href="index.php?action=login">登録</a></div>
                </form>
            </div>
            <div class="card-footer text-center">
                <a href="index.php?action=register">新しいアカウントを作成する</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end forgot password  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

 
</html>