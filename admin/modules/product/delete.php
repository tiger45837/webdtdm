  <?php 
    $open = "category";
      require_once  __DIR__. "/../../autoload/autoload.php";
      $id = intval(getInput('id'));
      $Editproduct = $db->fetchID("product",$id);
      if(empty($Editproduct))
      {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product");
      }
      //kiem tra danh muc co san pham chua
     $num = $db->delete("product",$id);
     if($num > 0) 
     {
      $SESSION['success'] = "Xóa thành công";
      redirectAdmin("product");
     }
     else
     {
      $SESSION['error'] = "Xóa thất bại";
      redirectAdmin("product");
     }
  ?>