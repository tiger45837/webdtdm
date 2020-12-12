<?php require_once  __DIR__. "/autoload/autoload.php"; 
	if(isset($_SESSION['name_id']))
	{
		echo " <script>alert('Đã đăng nhập rồi');location.href='index.php' </script> ";

	}
	$data = 
	[
		'name' => postInput("name"),
		'email' => postInput("email"),
		'password' => postInput("password"),
		'phone' => postInput("phone"),
		'address' => postInput("address")
	];
		$error = [];
	  if ($_SERVER["REQUEST_METHOD"] == "POST") 
	  {
	  	if($data['name'] == '')
	  	{
	  		$error['name'] = "Tên không được để trống";
	  	}	
	 	if($data['email'] == '')
	  	{
	  		$error['email'] = "Email không được để trống";
	  	}
	  	else
	  	{
	  		$is_check = $db->fetchOne("users","email= '".$data['email']."'  ");
	  		if($is_check != NULL)
	  		{
	  			$error['email'] = "Email đã tồn tại";
	  		}
	  	}
	  	if($data['password'] == '')
	  	{
	  		$error['password'] = "Mật khẩu không được để trống";
	  	}
	  	else
	  	{
	  		$data['password'] = MD5(postInput("password"));
	  	}
	  	if($data['phone'] == '')
	  	{
	  		$error['phone'] = "Số điện thoại không được để trống";
	  	}
	  	if($data['address'] == '')
	  	{
	  		$error['address'] = "Địa chỉ không được để trống";
	  	}
	  	if (empty($error)) 
	  	{
	  		$id_insert = $db->insert("users",$data);
	  		if($id_insert > 0)
	  		{
	  			$_SESSION['success'] = "Đăng ký thành công ! Thử đăng nhập ";
	  			header("localtion: dang-nhap.php");
	  		}
	  		else
	  		{
	  			echo "Đăng ký thất bại";
	  		}
	  	}
	  } 
?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">            
            <section class="box-main1">
                <h3 class="title-main "><a href=""> Đăng ký</a> </h3>
                <?php if (isset($_SESSION['success'])): ?>
                	<div class="alert alert-success">
                		<strong></strong> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                	</div>
                <?php endif ?>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Tên thành viên</label>
            			<div class="col-md-5">
            				<input type="text" name="name" placeholder=" Ho Tên " class="form-control" value="<?php echo $data['name'] ?>">
            				<?php if (isset($error['name'])): ?>
            					<p class="text-danger"> <?php echo $error['name'] ?></p>
            				<?php endif ?>
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Email</label>
            			<div class="col-md-5">
            				<input type="email" name="email" placeholder=" ...@gmail.com " class="form-control" value="<?php echo $data['email'] ?>">
            				<?php if (isset($error['email'])): ?>
            					<p class="text-danger"><?php echo $error['email'] ?></p>
            				<?php endif ?>
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Mật khẩu</label>
            			<div class="col-md-5">
            				<input type="password" name="password" placeholder=" ********" class="form-control" value="<?php echo $data['password'] ?>">
            				<?php if (isset($error['password'])): ?>
            					<p class="text-danger"><?php echo $error['password'] ?></p>
            				<?php endif ?>
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
            			<div class="col-md-5">
            				<input type="number" name="phone" placeholder=" Số điện thoại " class="form-control" 
            				value="<?php echo $data['phone'] ?>">
            				<?php if (isset($error['phone'])): ?>
            					<p class="text-danger"> <?php echo $error['phone'] ?></p>
            				<?php endif ?>
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
            			<div class="col-md-5">
            				<input type="text" name="address" placeholder="Địa chỉ" class="form-control" value="<?php echo $data['address'] ?>">
            				<?php if (isset($error['address'])): ?>
            					<p class="text-danger"> <?php echo $error['address'] ?></p>
            				<?php endif ?>
            			</div>
            		</div>
            		<button type="submit" class="btn btn-success col-md-2 col-md-offset-4" style="margin-top: 20px;">Đăng ký</button>
                </form>
            </section>
        </div>
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>