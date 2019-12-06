<?php
session_start();
include ('controller/c_card.php');
$c_card = new C_card();
$card = $c_card->get_themuon();
$card=$card['card'];
$customers = $c_card->get_Allcustomers();
$customers = $customers['customers'];
$n=sizeof($customers);
$idKH=$customers[$n-1]->id;
$nameKH=$customers[$n-1]->name;


if (isset($_POST['dangki'])){
    $bank_name = $_POST['namebank'];
    $code_bank = $_POST['codebank'];
    $cmnd = $_POST['cmnd'];
    $check = $c_card->check_bank($code_bank,$bank_name,$cmnd);
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
    <link rel="stylesheet" href="public/assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="public/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="public/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Trang chủ</a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="Card.php" class="dropdown-toggle"> <i class="menu-icon fa fa-table"></i>Quản lý thẻ mượn</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                       <a href="Customer.php" class="dropdown-toggle"> <i class="menu-icon fa fa-table"></i>Quản lý khách hàng</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                       <a href="Customer_Dangki.php" class="dropdown-toggle"> <i class="menu-icon fa fa-table"></i>Đăng kí thành viên</a>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Nạp tiền</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="Nap_traTRUOC.php">Thẻ trả trước</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="Nap_traSAU.php">Nạp trả sau</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>      
                <?php
                if (isset($_SESSION['user_name'])){
                    $name = $_SESSION['user_name'];
                    ?>
                    <div style="padding-left: 200px" >
                        <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=$name?>
                            <img class="user-avatar rounded-circle" src="public/images/admin.jpg" alt="User Avatar">    
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>
                            <a class="nav-link" href="Admin_register.php"><i class="fa fa -cog"></i>Đăng kí Admin</a>
                            <a class="nav-link" href="Admin_logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>
                </div><?php
                }
                else{
                    ?>
                    <div>
                        <div class="user-area dropdown float-right">
                        <a style="color: black;" href="Admin_login.php">
                            Đăng nhập
                        </a>
                    </div>
                    <?php
                }
                ?>
                

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Advanced</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3" style="padding-left: 10%">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-9 col-sm-9">
                        <div class="card">
                            <div class="card-header">
                                <strong>Masked Input</strong> <small> Small Text Mask</small>
                            </div>
                            
                            <div class="card-body card-block">
                                <form method="POST">
                                <div class="form-group">
                                    <label class=" form-control-label">Khách hàng</label>
                                        <div class="card-body">
                                          <select id="cc-pament" name="idKH" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
                                          <?php
                                            ?>
                                            <option value="<?=$idKH?>"><?=$nameKH?></option>
                                            <?php
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label class=" form-control-label">Tên ngân hàng</label>
                                    
                                        <div class="card-body">
                                              <select name="namebank" data-placeholder="Chọn Ngân Hàng..." class="standardSelect" tabindex="1">
                                                <option value=""></option>
                                                <option value="Đông Á Bank">Ngân hàng Đông Á ( Đông Á Bank )</option>
                                                <option value="ACB">Ngân hàng Á Châu ( ACB )</option>
                                                <option value="TPBank">Ngân hàng Tiên Phong ( TPBank )</option>
                                                <option value="Sacombank">Ngân hàng Sài Gòn Thương Tín ( Sacombank )</option>
                                                <option value="Techcombank">Ngân hàng Kỹ Thương Việt Nam ( Techcombank )</option>
                                                <option value="Nam A Bank">Ngân hàng Nam Á ( Nam A Bank )</option>
                                                <option value="VPBank">Ngân hàng Việt Nam Thịnh Vượng ( VPBank )</option>
                                                <option value="VIBBank">Ngân hàng Quốc Tế ( VIBBank )</option>
                                                <option value="Agribank">Ngân hàng Nông nghiệp và Phát triển Nông thôn VN ( Agribank )</option>
                                                <option value="Eximbank">Ngân hàng Xuất Nhập khẩu Việt Nam ( Eximbank )</option>
                                                <option value="Vietcombank">Ngoại thương Việt Nam ( Vietcombank )</option>
                                            </select>
                                        </div>
                                    
                                    <small class="form-text text-muted">vd: DongA,Saccombank...</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Số tài khoản</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input name="codebank" class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 9999 9999 9999 9999</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Số Chứng minh thư</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input name="cmnd" class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 222 222 222</small>
                                </div>
                                <div>
                                    <button name="dangki" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                      
                                      <span id="payment-button-amount">Đăng kí</span>
                                      <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    
                        

                        

                        
                   



                </div>


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="public/assets/js/popper.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/main.js"></script>
    <script src="public/assets/js/lib/chosen/chosen.jquery.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

</body>
</html>
