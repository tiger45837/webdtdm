<?php 
	require_once  __DIR__. "/autoload/autoload.php";   
	$data = 
	[
		'name' => postInput("name"),
		'email' => postInput("email"),
		'content' => postInput("content"),
		
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
	  	
	  	if($data['content'] == '')
	  	{
	  		$error['content'] = "Nội dung không được để trống";
	  	}  	
	  	//Kiem tra mang error
	  	if (empty($error)) 
	  	{
	  		$id_insert = $db->insert("feedback",$data);
	  		if($id_insert > 0)
	  		{
	  			$_SESSION['success'] = "Phản hồi thành công ";
	  			header("localtion: index.php");
	  		}
	  		else
	  		{
	  			echo "Thất bại";
	  		}
	  	}
	  }
?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">   
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Phản hồi khách hàng</a> </h3>
                <?php if (isset($_SESSION['success'])): ?>
                	<div class="alert alert-success">
                		<strong></strong> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                	</div>
                <?php endif ?>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">	
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Họ tên</label>
            			<div class="col-md-5">
            				<input type="text" name="name" placeholder=" Họ tên " class="form-control" value="<?php echo $data['name'] ?>">
            				<?php if (isset($error['name'])): ?>
            					<p class="text-danger"> <?php echo $error['name'] ?></p>
            				<?php endif ?>
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Email</label>
            			<div class="col-md-5">
            				<input type="email" name="email" placeholder=" ...@gmail.com" class="form-control" value="<?php echo $data['email'] ?>">
            				<?php if (isset($error['email'])): ?>
            					<p class="text-danger"><?php echo $error['email'] ?></p>
            				<?php endif ?>
            			</div>
            		</div>           		   
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Nội dung</label>
            			<div class="col-md-5">
            				<textarea type="text" name="content" placeholder="" class="form-control" 
            				value="<?php echo $data['content'] ?>" rows="5">
            				</textarea>
            				<?php if (isset($error['content'])): ?>
            					<p class="text-danger"><?php echo $error['content'] ?></p>
            				<?php endif ?>
            			</div>
            		</div>
            		<button type="submit" class="btn btn-success col-md-1 col-md-offset-4" style="margin-top: 0px;">Gửi</button>
                </form>
            </div>
               <!-- Nội dung -->
            </section>
        </div>
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>