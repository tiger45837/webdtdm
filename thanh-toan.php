<?php 
	require_once  __DIR__. "/autoload/autoload.php"; 
    if(!isset($_SESSION['name_id']))
    {
        echo " <script>alert(' Đăng nhập rồi quay lại đây');location.href='index.php' </script> ";
    }
	$user = $db->fetchID("users",intval($_SESSION['name_id']));
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$data = 
		[
			'amount' => $_SESSION['total'],
			'users_id' => $_SESSION['name_id'],
			"note" => postInput("note")
		];
		$idtran = $db->insert("transaction",$data);
		if($idtran > 0)
		{
			foreach($_SESSION['cart'] as $key => $value)
			{
				$data2 = 
				[
					'transaction_id' => $idtran,
					'product_id' => $key,
					'qty' => $value['qty'],
					'price' => $value['price']
				];
				$id_insert = $db->insert("orders",$data2);	
			}
			unset($_SESSION['cart']); 
			unset($_SESSION['total']);
			$_SESSION['success'] = "Thành công";
			header("location: thong-bao.php");
		}
	}
?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 ">  
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Thanh toán đơn hàng</a> </h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
                    <?php  foreach ($_SESSION['cart'] as $key => $value): ?>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
            			<div class="col-md-5">
            				<input type="text"  readonly="" name="name" placeholder=" Phạm Văn Thành " class="form-control" value="<?php echo $user['name'] ?>">		
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Email</label>
            			<div class="col-md-5">
            				<input type="email"  readonly="" name="email" placeholder=" udanchi3105@gmail.com" class="form-control" value="<?php echo $user['email'] ?>">
            				
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
            			<div class="col-md-5">
            			<input type="number" readonly="" name="phone" placeholder=" 0942495160" class="form-control" 
            				value="<?php echo $user['phone'] ?>">
            			</div>
            		</div>

            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
            			<div class="col-md-5">
            				<input type="text"  readonly="" name="address" placeholder="Nam Trực - Nam Định" class="form-control" value="<?php echo $user['address'] ?>">	
            			</div>
            		</div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1"> Tên sản phẩm</label>
                        <div class="col-md-5">
                            <input type="text"  readonly="" name="address" placeholder="" class="form-control" value="<?php echo $value['name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-md-offset-1"> Số lượng</label>
                        <div class="col-md-5">
                            <input type="text"  readonly="" name="address" placeholder="" class="form-control" value="<?php echo $value['qty'] ?>">
                        </div>
                    </div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Tổng tiền thanh toán</label>
            			<div class="col-md-5">
            				<input type="text"  readonly="" name="address" placeholder="" class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>">
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Ghi chú</label>
            			<div class="col-md-5">
            				<input type="text"  name="note" placeholder="" class="form-control" value="">
            			</div>
            		</div>
                    <?php  endforeach ?>
            		<button type="submit" class="btn btn-success col-md-2 col-md-offset-4" style="margin-top: 20px;">Xác nhận đặt hàng</button>
                </form>
               <!-- Nội dung -->
            </section>

        </div>
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>