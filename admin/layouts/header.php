<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin</title>
        <!-- Custom fonts for this template-->
        <link href="/webphp/public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="/webphp/public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="/webphp/public/admin/css/sb-admin.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
            <a class="navbar-brand mr-1" href="<?php echo base_url() ?>admin/">Chào,<?php echo $_SESSION['admin_name'] ?></a>
            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
<!--             Navbarwebphp/public/admin/
 -->            <ul class="navbar-nav ml-auto ml-md-0">              
                <li class="nav-item dropdown no-arrow">

                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/webphp/dang-xuat.php">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="wrapper">
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url() ?>admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span>
                    </a>
                </li>
                </br>
                <li class="<?php echo isset($open) && $open == 'category' ? 'active' : '' ?>">
                    <a href="<?php echo modules("category") ?>"><i class="fa fa-list"></i> Danh mục sản phẩm</a>  
                </li>
                </br>
                <li class="<?php echo isset($open) && $open == 'product' ? 'active' : '' ?>">
                    <a href="<?php echo modules("product") ?>"><i class="fa fa-database"></i> Sản phẩm</a>  
                </li>
                </br>
                 <li class="<?php echo isset($open) && $open == 'admin' ? 'active' : '' ?>">
                    <a href="<?php echo modules("admin") ?>"><i class="fa fa-user-circle"></i> Admin</a>  
                </li>
                </br>
                <li class="<?php echo isset($open) && $open == 'user' ? 'active' : '' ?>">
                    <a href="<?php echo modules("user") ?>"><i class="fas fa-users"></i> Thành viên</a>  
                </li>
                </br>
                <li >
                    <a href="<?php echo base_url() ?>admin"><i class="fa fa-list"></i> Quản Lý Kho</a>  
                </li>
                </br>
                <li class="<?php echo isset($open) && $open == 'transaction' ? 'active' : '' ?>">
                    <a href="<?php echo modules("transaction") ?>"><i class="fas fa-users"></i> Đơn hàng</a>  
                </li>
              
                </ul>