<?php 
  $open = "category";
    require_once  __DIR__. "/../../autoload/autoload.php";
    $category = $db->fetchAll("category");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
       $data = 
       [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name')),
            "category_id" => postInput('category_id'),
            "price" => postInput('price'),
            "number" => postInput('number'),
            "sale" => postInput('sale'),
            "content" => postInput('content')
                   ];
       $error = [];
       if (postInput('name') == '') {
           $error['name'] = "Mời bạn nhập tên sản phẩm"; 
       }
       else
      {
        $is_check = $db->fetchOne("product","name= '".$data['name']."'  ");
        if($is_check != NULL)
        {
          $error['name'] = "Sản phẩm đã tồn tại";
        }
      }
       if (postInput('category_id') == '') {
           $error['category_id'] = "Mời chọn tên danh mục"; 
       }

       if (postInput('price') == '') {
           $error['price'] = "Mời bạn nhập giá sản phẩm"; 
       }

       if (postInput('content') == '') {
           $error['content'] = "Mời bạn nhập nội dung"; 
       }

       if (postInput('number') == '') {
           $error['number'] = "Mời bạn nhập số lượng"; 
       }

       if (postInput('sale') == '') {
           $error['sale'] = "Mời bạn nhập giá khuyến mãi"; 
       } 

       if(!isset($_FILES['thunbar']))
       {
        $error['thunbar'] = "Mời bạn chọn hình ảnh";
       }
       if(empty($error))
       {    
            if(isset($_FILES['thunbar']))
            {
              $file_name = $_FILES['thunbar']['name'];
              $file_tmp = $_FILES['thunbar']['tmp_name'];
              $file_type = $_FILES['thunbar']['type'];
              $file_erro = $_FILES['thunbar']['error']; 
                if($file_erro == 0)
                {
                  $part = ROOT. "product/";
                  $data['thunbar'] = $file_name;
                }
            }
            $id_insert = $db->insert("product",$data);  
            if($id_insert)
            {
              move_uploaded_file($file_tmp,$part.$file_name);
              $_SESSION['success'] = "Thêm mới thành công";
              redirectAdmin("product");
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
                        Thêm mới sản phẩm
                    </ol>
                    <div class="clearfix"></div>
                    <!-- thong bao loi -->
                    <?php require_once  __DIR__. "/../../../partials/notification.php";   ?>
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Danh mục sản phẩm</label>
                            <div class="col-sm-8">
                                <select class="form-control col-md-8" name="category_id">
                                  <option value="">Chọn danh mục sản phẩm</option>
                                  <?php foreach ($category as $item): ?>
                                    <option value="<?php echo $item['id'] ?> "><?php echo $item['name'] ?></option>
                                    
                                  <?php endforeach ?>
                                </select>
                                <?php if(isset($error['category'])) :?>
                                <p class="text-danger"><?php echo $error['category']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Tên sản phẩm" name="name">
                                <?php if(isset($error['name'])) :?>
                                <p class="text-danger"><?php echo $error['name']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="9.000.000" name="price">
                                <?php if(isset($error['price'])) :?>
                                <p class="text-danger"><?php echo $error['price']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Số lượng</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="0" name="number">
                                <?php if(isset($error['number'])) :?>
                                <p class="text-danger"><?php echo $error['number']; ?></p>
                            <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="10%" name="sale" value="0"> 
                            </div>
                            <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                            <div class="col-sm-3">
                                <input type="file" class="form-control" id="inputEmail3"  name="thunbar">
                                <?php if(isset($error['thunbar'])) :?>
                                <p class="text-danger"><?php echo $error['thunbar']; ?></p>
                            <?php endif ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Nội dung</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="content" rows="4"></textarea>
                                <?php if(isset($error['content'])) :?>
                                <p class="text-danger"><?php echo $error['content']; ?></p>
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