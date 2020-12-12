<?php 
    $open = "product";
    require_once  __DIR__. "/../../autoload/autoload.php";  
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    $sql = "SELECT product.*,category.name as category_id FROM product  
            LEFT JOIN category on category.id = product.category_id ORDER BY ID DESC ";
    $product = $db->fetchJone('product',$sql,$p,4,true);
    if(isset($product['page']))
    {
        $sotrang = $product['page'];
        unset($product['page']);
    }
 ?>
<?php require_once  __DIR__. "/../../layouts/header.php";   ?>
<div class="container">
    <div class="row">
        <div class="col-1g-12">
            <h1 class="page-header">
                Danh sách sản phẩm
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <div class="clearfix"></div>
            <?php require_once  __DIR__. "/../../../partials/notification.php";   ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Thông tin</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($product as $item): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['category_id'] ?></td>
                            <td>
                                <img src="../../../public/uploads/product/<?php echo $item['thunbar']?>" width="80px"
                                    height="80px">
                            </td>
                            <td>
                                <ul>
                                    <li>Giá : <?php echo $item['price']; ?></li>
                                    <li>Số lượng : <?php echo $item['number'] ?></li>
                                </ul>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i
                                        class="fa fa-edit"></i>Sửa</a>
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i
                                        class="fa fa-times"></i>Xóa</a>
                            </td>
                        </tr class="btn btn-xs btn-info">
                        <?php $stt++ ;endforeach ?>
                    </tbody>
                </table>
                <div class="pull-right clearfix">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            if($p>1)
                            {
                                echo "<a href='http://localhost/webphp/admin/modules/product/?page=".($p-1)."' class='page-link'>Previous</a>";
                            }
                            ?>
                            <li class="page-item">
                                <?php for ($i=1; $i <= $sotrang ; $i++) : ?>
                                <?php 
                                            if(isset($_GET['page']))
                                            {
                                                $p = $_GET['page'];
                                            }
                                            else
                                            {
                                                $p = 1;
                                            }
                                         ?>
                            <li class="<?php echo ($i == $p) ?'active' : '' ?> ">
                                <a class="page-link" href="?page=<?php echo $i;?>"><?php echo $i;?> </a>
                            </li>
                            <?php endfor; ?>
                            </li>
                            <li class="page-item">
                            <?php
                            if($sotrang>$p)
                            {
                                echo "<a href='http://localhost/webphp/admin/modules/product/?page=".($p+1)."' class='page-link'>Next</a>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php require_once  __DIR__. "/../../layouts/footer.php";   ?>