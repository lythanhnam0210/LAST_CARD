<?php 
session_start();    
include ('controller/c_card.php');
$c_card = new C_card();
if (isset($_POST['dangkicustomer'])){
    $CMND = $_POST['CMND'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $SDT = $_POST['SDT'];
    $sex = $_POST['SEX'];
    $DOB = $_POST['DOB'];
    $id_type_card = $_POST['id_type_card'];
    $id_user = $c_card->set_customer($CMND,$name,$address,$SDT,$sex,$DOB,$id_type_card);
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
<body>
        <!-- Left Panel -->

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
                        <h1>Mẫu đăng kí thẻ mượn</h1>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <form method="POST">
                  <div class="col-lg-9">
                    <div class="card">
                      <div class="card-header"><strong>Điền thông tin tại đây</strong></div>
                      <div class="card-body card-block">

                        <div class="form-group"><label for="company" class=" form-control-label">Họ và tên</label><input name="name" type="text" id="company" placeholder="Tên của bạn" class="form-control"></div>

                        <div class="form-group"><label for="vat" class=" form-control-label">Ngày sinh</label><input name="DOB" type="text" id="vat" placeholder="yyyy-mm-dd" class="form-control"></div>

                        <div class="form-group"><label for="company" class=" form-control-label">Địa chỉ</label><input name="address" type="text" id="company" placeholder="" class="form-control"></div>

                        <div class="form-group"><label for="company" class=" form-control-label">Số điện thoại</label><input name="SDT" type="text" id="company" placeholder="" class="form-control"></div>

                        <div class="form-group"><label for="company" class=" form-control-label">Số chứng minh thư</label><input name="CMND" type="text" id="company" placeholder="" class="form-control"></div>
                        
                        

                        <div class="form-group"><label for="country" class=" form-control-label">Giới tính : </label>
                            <select name="SEX" data-placeholder="chọn giới tính..." class="standardSelect" tabindex="1">
                            <option value="">-Chọn giới tính...</option>
                            <option value="nam">nam  </option>
                            <option value="nữ">nữ  </option>
                        </select>

                    </div>

                         <div class="form-group"><label for="country" class=" form-control-label">Loại thẻ : </label>
                            <select name="id_type_card" data-placeholder="Chọn loại thẻ..." class="standardSelect" tabindex="1">
                            <option value="">-Chọn loại thẻ...</option>
                            
                            <option value="1">Trả trước  </option>
                            <option value="2">Trả sau  </option>
                            
                        </select> 
                        </div>  

                      
                        <div>
                            <button name="dangkicustomer" id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                              
                              <span id="payment-button-amount">Tiếp tục</span>
                              <span id="payment-button-sending" style="display:none;">Sending…</span>
                          </button>
                      </div>
                      </div>
                    </div>
                  </div>

                  
                 </form> 

                  


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="public/assets/js/popper.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/main.js"></script>


</body>
</html>