<?php
session_start();
include ('controller/c_card.php');
$c_card = new C_card();
$customers = $c_card->get_Allcustomers();
$customers = $customers['customers'];
$type ="all";
$loaicustomers;

if (isset($_POST['apdung'])){
    $type = $_POST['loai'];
}
if ($type=="all"){
    $loaicustomers = $customers;
}
else if($type=="truoc")
{   
    $h=0;
    for ($i = 0;$i<sizeof($customers);$i++){
        if ($customers[$i]->id_type_card==1){
            $loaicustomers[$h]=$customers[$i];
            $h++;   
        }
    }
}
else if($type=="sau")
{   
    $h=0;
    for ($i = 0;$i<sizeof($customers);$i++){
        if ($customers[$i]->id_type_card==2){
            $loaicustomers[$h]=$customers[$i];
            $h++;   
        }
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
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="public/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style type="text/css">
        #button1{
            padding-right: 10px;
            margin-bottom: 10px;
            margin-top: 10px;
        }
        .button2{
            height: 25px;
            width: 50px;
            border-radius: 5px;
            font-size: 10px;

        }
        .button2:hover {
          box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
    </style>
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

        

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <form method="POST">
                                <strong style="padding-right: 20px; " class="card-title">Loại thẻ</strong>
                                    <select style="padding-right: 20PX" name="loai">
                                    <option value="all">Tất cả</option>
                                    <option value="truoc">Thẻ trả trước</option>
                                    <option value="sau">Thẻ trả sau</option>
                                </select>
                                <button name="apdung" style="border-radius: 5px" class="btn btn-success">Áp dụng</button>
                                </form>
                                
                            </div>
                            
                            
                        </div>

                        <div class="card-body">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Số CMND</th>
                        <th>Họ Tên</th>
                        <th>Địa chỉ</th>
                        <th>Ngày sinh / Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Loại thẻ</th>
                        <th>chức năng</th>

                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 1;
                        $loai ="";
                            foreach ($loaicustomers as $tk) {
                                if ($tk->id_type_card == 1){
                                    $loai = "Trả trước";
                                }
                                else{
                                    $loai = "Trả sau";
                                }
                                ?>
                                <tr style="text-align: center;">
                                    <td><?=$stt?></td>
                                    <td><?=$tk->CMND?></td>
                                    <td style="text-align: left;"><?=$tk->name?></td>
                                    <td style="text-align: left;"><?=$tk->address?></td>
                                    <td><?=$tk->DOB?> (<?=$tk->sex?>)</td>
                                  <td><?=$tk->SDT?></td>
                                     <td><?=$loai?></td> 
                                    <td><button id="button1" class="button2 btn btn-success"> Sửa </button>
                                    <button  class="button2 btn btn-danger"> Xóa </button></a></td>
                                </tr>
                                <?php
                                $loai="";
                                $stt++;
                            }
                        ?>
                      
                      
                    </tbody>
                  </table>
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


    <script src="public/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="public/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="public/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="public/assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
