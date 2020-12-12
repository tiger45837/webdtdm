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
      //kiem tra danh muc co san pham chua
      $is_product = $db->fetchOne("product"," category_id = $id ");
      if($is_product == NULL)
      {
            $num = $db->delete("category",$id);
           if($num > 0) 
           {
              $SESSION['success'] = "Xóa thành công";
              redirectAdmin("category");
           }
           else
           {
              $SESSION['error'] = "Xóa thất bại";
              redirectAdmin("category");
           }
      }
      else
      {
        $SESSION['error'] = "Danh mục có sản phẩm !! bạn không thể xóa";
        redirectAdmin("category");
      }
  ?>