<?php 
	require_once  __DIR__. "/autoload/autoload.php"; 
	$user = $db->fetchID("users",intval($_SESSION['name_id']));
    $id = intval(getInput('id'));
    $Editusers= $db->fetchID("users",$id);
    if(empty($Editusers))
    {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
    } 
    $users = $db->fetchAll("users");
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      $data = 
       [
            "name" => postInput('name'),
            "email" => (postInput('email')),
            "password" => (postInput('password')),
            "address" => (postInput('address')),
                   ];
      $error = [];
       if (postInput('name') == '') {
           $error['name'] = "Mời bạn nhập tên"; 
       }
       if (postInput('email') == '') {
           $error['email'] = "Mời bận nhập email"; 
       }
       if (postInput('password') == '') {
           $error['password'] = "Mời bạn nhập số điện thoai"; 
       }
       if (postInput('address') == '') {
           $error['address'] = "Mời bạn nhập địa chỉ"; 
       }
       if(empty($error))
       {    
            $update = $db->update("users",$data,array("id"=>$id));
            if ($update > 0) {
              $_SESSION['success'] = "Cập nhật thành công";
              
            }
            else
            {
              $_SESSION['error'] ='Cập nhật thất bại';
            }
       }
    }
?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 ">    
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Cập nhật thông tin khách hàng</a> </h3>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">	
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Tên khách hàng</label>
            			<div class="col-md-5">
            				<input type="text"   name="name" placeholder=" Ho Ten " class="form-control" value="<?php echo $user['name'] ?>">        				
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Email</label>
            			<div class="col-md-5">
            				<input type="email"   name="email" placeholder=" abc@gmail.com" class="form-control" value="<?php echo $user['email'] ?>">        				
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Số điện thoại</label>
            			<div class="col-md-5">
            				<input type="number"  name="phone" placeholder=" (+84)" class="form-control" 
            				value="<?php echo $user['phone'] ?>">		
            			</div>
            		</div>
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Địa chỉ</label>
            			<div class="col-md-5">
            				<input type="text"   name="address" placeholder="Địa chỉ" class="form-control" value="<?php echo $user['address'] ?>">		
            			</div>
            		</div>
            		<button type="submit" class="btn btn-success col-md-2 col-md-offset-4" style="margin-top: 20px;">Xác nhận</button>
                </form>
               <!-- Nội dung -->
            </section>
        </div>
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>