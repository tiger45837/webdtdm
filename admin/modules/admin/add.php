<?php 
  $open = "admin";
    require_once  __DIR__. "/../../autoload/autoload.php";
// Danh sach danh mục sản phẩm
    
    $data = 
     [
          "name" => postInput('name'),
          "email" => postInput('email'),
          "phone" => postInput('phone'),
          "password" => MD5(postInput('password')),
          "address" => postInput('address'),
          "level" => postInput('level')
      ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      
       
       $error = [];
       if (postInput('name') == '') {
           $error['name'] = "Mời bạn nhập họ và tên"; 
       }

       if (postInput('phone') == '') {
           $error['phone'] = "Mời nhập số điện thoại"; 
       }

       if (postInput('email') == '') {
           $error['email'] = "Mời bạn nhập email"; 
       }
       else
       {
          $is_check = $db->fetchOne("admin"," email = '".$data['email']."' ");
          if($is_check != NULL)
          {
            $error['email'] = "Email đã tồn tại"; 
          }
       }

       if (postInput('password') == '') {
           $error['password'] = "Mời bạn nhập mật khẩu"; 
       }


       if (postInput('address') == '') {
           $error['address'] = "Mời bạn nhập địa chỉ"; 
       }
 
       if ($data['password'] != MD5(postInput("re_password")))
       {
          $error['password'] = "Mật khẩu không khớp";
       }

       //error trong la khong co loi
       if(empty($error))
       {    
           
            $id_insert = $db->insert("admin",$data);  
            if($id_insert)
            {
              
              $_SESSION['success'] = "Thêm mới thành công";
              redirectAdmin("admin");
            }
            else
            {
              $_SESSION['error'] = "Thêm mới thất bại";
            }
       }
    }  
 ?>
<?php require_once  __DIR__. "/../../layouts/header.php";   ?>
        
            <div id="content-wrapper">
                <div class="container-fluid"> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        Thêm mới ADMIN
                    </ol>
                    <div class="clearfix"></div>
                    <!-- thong bao loi -->
                    <?php require_once  __DIR__. "/../../../partials/notification.php";   ?>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                      
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Nhập họ tên" name="name" value="<?php echo $data['name'] ?>">
                                <?php if(isset($error['name'])) :?>
                                <p class="text-danger"><?php echo $error['name']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="udanchi3105@gmail.com" name="email" value="<?php echo $data['email'] ?>">
                                <?php if(isset($error['email'])) :?>
                                <p class="text-danger"><?php echo $error['email']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Số điện thoại<i></i></label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="0942495160" name="phone" value="<?php echo $data['phone'] ?>">
                                <?php if(isset($error['phone'])) :?>
                                <p class="text-danger"><?php echo $error['phone']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu<i></i></label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="*****" name="password">
                                <?php if(isset($error['password'])) :?>
                                <p class="text-danger"><?php echo $error['password']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nhập lại mật khẩu<i></i></label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="*****" name="re_password" required="">
                                <?php if(isset($error['re_password'])) :?>
                                <p class="text-danger"><?php echo $error['re_password']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Nam Thanh - Nam Trực - Nam Định" name="address" value="<?php echo $data['address'] ?>">
                                <?php if(isset($error['address'])) :?>
                                <p class="text-danger"><?php echo $error['address']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Cấp độ</label>
                            <div class="col-sm-2">
                                <select name="level" class="form-control">
                                  <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? "selected = 'selected'" : '' ?>>CTV</option>
                                  <option value="2" <?php echo isset($data['level']) && $data['level'] == 2 ? "selected = 'selected'" : '' ?>>Admin</option>

                                  
                                </select>
                                <?php if(isset($error['level'])) :?>
                                <p class="text-danger"><?php echo $error['level']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>

                        </div>                         
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                    
  <?php require_once  __DIR__. "/../../layouts/footer.php";   ?>              