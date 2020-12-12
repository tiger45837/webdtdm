<?php 
    require_once  __DIR__. "/autoload/autoload.php";
    $category = $db->fetchAll("category"); 
 ?>

<?php 

$con = mysqli_connect("localhost","root","","webphp");

$sqlCategory = "SELECT * FROM category WHERE status = '1'";
$sqlProduct = "SELECT sum(number) as number_product FROM product WHERE status = '1'";
$sqlUser = "SELECT * FROM users WHERE status = '1'";
$sqlTransaction = "SELECT * FROM transaction WHERE status = '1'";
$sqlMoney = "SELECT sum(amount) as total FROM transaction 
WHERE status='1' ";   



$dataCategory = mysqli_query($con,$sqlCategory);
$dataProduct = mysqli_query($con,$sqlProduct);
$dataUser = mysqli_query($con,$sqlUser);
$dataTransaction = mysqli_query($con,$sqlTransaction);
$dataMoney = mysqli_query($con,$sqlMoney);
 

 
?>
<?php require_once  __DIR__. "/layouts/header.php";   ?>   
            <div id="content-wrapper">
                <div class="container-fluid"> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                       <h3>Quản Lý </h3>
                    </ol>  





                    <!DOCTYPE html>
<html lang="en">



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


            
                <div class="container-fluid">

                  
                    <!-- Content Row -->
                    <div class="row">

                    <?php 
                        $row1 = mysqli_num_rows($dataCategory)   ;
                        $row2 = mysqli_fetch_assoc($dataProduct)  ;
                        $sump = $row2['number_product'];
                        $row3 = mysqli_num_rows($dataUser)  ;
                        $row4 = mysqli_num_rows($dataTransaction)  ;
                        $row5 = mysqli_fetch_assoc($dataMoney);
                        $sum = $row5['total'];
                     ?>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng Số Category</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><td><?php echo $row1; ?> Danh Mục Sản Phẩm</td></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng Số Product</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><td><?php echo $sump; ?>  Sản Phẩm</td></td></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng Doanh Thu</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo formatPrice($sum); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng Đơn Hàng</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row4; ?> Đơn</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng Số User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><td><?php echo $row3; ?> Thành Viên</td></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>






</body>

</html>








 

              


  <?php require_once  __DIR__. "/layouts/footer.php";   ?>              