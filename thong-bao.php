<?php 

	require_once  __DIR__. "/autoload/autoload.php";
	 
?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
    
        <div class="col-md-9">
            

            <section class="box-main1">
                <h3 class="title-main"><a href=""> Thông báo thanh toán</a> </h3>
                
               <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <strong></strong> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                </div>
                    <?php endif ?>
                    <a href="index.php" class="btn btn-success">Quay lại</a>
            </section>

        </div>
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>