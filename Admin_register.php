<?php 
include ('controller/c_user.php');
$c_user = new C_user();
if (isset($_POST['dangki'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $sdt = $_POST['sdt'];
    if ($password == $repassword) {
        $user = $c_user->dangkiTKAdmin($username, $password, $name,$sdt, $email);
    }
    
    
}

 ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="public/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">

                    <form method="POST" action="#">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input name="username" type="username" class="form-control" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input name="repassword" type="password" class="form-control" placeholder="RePassword">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input name="sdt" type="numberphone" class="form-control" placeholder="Numberphone">
                        </div>
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input name="name" type="name" class="form-control" placeholder="Your name">
                        </div>
                        <button name="dangki" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng kí</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="page-login.php"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="public/assets/js/popper.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/main.js"></script>


</body>
</html>
