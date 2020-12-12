<?php require_once  __DIR__. "/autoload/autoload.php";
    $data = 
    [
        'email' => postInput("email"),
        'password' => postInput("password")
    ];
    $error = [];
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if($data['email'] == '')
        {
            $error['email'] = "Email không được để trống";
        }
        if($data['password'] == '')
        {
            $error['password'] = "Mật khẩu không được để trống";
        }
        if(empty($error))
        {
            $is_check = $db->fetchOne("users","email= '".$data['email']."' AND password = '".MD5($data['password'])."' ");
            if($is_check != NULL)
            {
                $_SESSION['name_user'] = $is_check['name'];
                $_SESSION['name_id'] = $is_check['id'];
                echo " <script>alert(' Đăng nhập thành công');location.href='index.php' </script> ";
            }
            else
            {
               $_SESSION['error'] = "Đăng nhập thất bại"; 
            }
        }
    }
 ?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">   
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Đăng nhập</a> </h3>
                    <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <strong></strong> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
                </div>
                    <?php endif ?>
                    <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <strong>Lỗi!  </strong><?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
                </div>
                    <?php endif ?>
                <form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px">	
            		<div class="form-group">
            			<label class="col-md-2 col-md-offset-1"> Email</label>
            			<div class="col-md-5">
            				<input type="email" name="email" placeholder=" ...@gmail.com" class="form-control">
                            <?php if (isset($error['email'])): ?>
                                <p class="text-danger"><?php echo $error['email'] ?></p>
                            <?php endif ?>
            			</div>
            		</div>
            		<div class="form-group"> 
            			<label class="col-md-2 col-md-offset-1"> Mật khẩu</label>
            			<div class="col-md-5">
            				<input type="password" name="password" placeholder=" ********" class="form-control">
                            <?php if (isset($error['password'])): ?>
                                <p class="text-danger"><?php echo $error['password'] ?></p>
                            <?php endif ?>
            			</div>
            		</div>
            		<button type="submit" class="btn btn-success col-md-2 col-md-offset-4" style="margin-top: 20px;"> Đăng nhập</button>
                </form>
               <!-- Nội dung -->
            </section>
        </div>
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>