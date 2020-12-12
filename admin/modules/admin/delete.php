  <?php 
    $open = "category";
      require_once  __DIR__. "/../../autoload/autoload.php";
      $id = intval(getInput('id'));
      $DeleteAdmin = $db->fetchID("admin",$id);
      if(empty($DeleteAdmin))
      {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
      }
      //kiem tra danh muc co san pham chua

     $num = $db->delete("admin",$id);
     if($num > 0) 
     {
      $SESSION['success'] = "Xóa thành công";
      redirectAdmin("admin");
     }
     else
     {
      $SESSION['error'] = "Xóa thất bại";
      redirectAdmin("admin");
     }
  ?>