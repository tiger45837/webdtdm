<?php 
  $open = "category";
    require_once  __DIR__. "/../../autoload/autoload.php";  
    $id = intval(getInput('id'));
    $EditCategory = $db->fetchID("category",$id);
    if(empty($EditCategory))
    {
      $_SESSION['error'] = "Dữ liệu không tồn tại";
      redirectAdmin("category");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {  
       $data = 
       [
            "name" => postInput('name'),
            "slug" => to_slug(postInput('name'))
       ];
       $error = [];
       if (postInput('name') == '') {
           $error['name'] = "Moi ban nhap day du ten danh muc"; 
       }
       if(empty($error))
       {
          if($EditCategory['name'] != $data['name'])
          {
            $isset = $db->fetchOne("category"," name = '".$data['name']." ' ");
            if(count($isset) > 0 )
            {
              $_SESSION['error'] = "Tên danh mục đã tồn tại";
            }
            else
            {
                $id_update = $db->update("category",$data,array("id"=>$id));
                if($id_update > 0)
                {
                  $SESSION['success'] = "Cập nhật thành công";
                  redirectAdmin("category");
                }
                else
                { 
                  $SESSION['error'] = "Dữ liệu không thay đổi";
                  redirectAdmin("category");
                }
            }
          }
       }
    }  
 ?>
<?php require_once  __DIR__. "/../../layouts/header.php";   ?>
            <div id="content-wrapper">
                <div class="container-fluid"> 
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                        Sửa danh mục
                    </ol>
                    <div class="clearfix"></div>
                    <!-- thong bao loi -->
                    <?php require_once  __DIR__. "/../../../partials/notification.php";   ?> 
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" action="" method="POST">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name" value=" <?php echo $EditCategory['name'] ?>">
                                <?php if(isset($error['name'])) :?>
                                <?php echo $error['name']; ?>
                            <?php endif ?>                   
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