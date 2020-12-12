<?php 
    require_once  __DIR__. "/../../autoload/autoload.php";
    // $open = "admin";
    // $admin = $db->fetchAll("admin");
    $open = "admin";
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    $sql = "SELECT admin.* FROM admin ORDER BY ID DESC  ";
    $admin = $db->fetchJone("admin",$sql,$p,4,true);
    if(isset($admin['page']))
    {
        $sotrang = $admin['page'];
        unset($admin['page']);
    }
    
 ?>
<?php require_once  __DIR__. "/../../layouts/header.php";   ?>

<div class="container">
    <div class="row">
        <div class="col-1g-12">
            <h1 class="page-header">
                Danh sách admin
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>

            <div class="clearfix"></div>
            <!-- thong bao loi -->
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
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($admin as $item): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['email']; ?></td>
                            <td><?php echo $item['phone']; ?></td>

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

                <div class="pull-right">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            if($p>1)
                            {
                                echo "<a href='http://localhost/webphp/admin/modules/admin/?page=".($p-1)."' class='page-link'>Previous</a>";
                            }
                            ?>
                            <li class="page-item">
                                <?php for ($i=1; $i <= $sotrang ; $i++) : ?>
                                <?php 
                                if(isset($_GET['page']))
                                {$p = $_GET['page'];}
                                else{$p = 1;}?>
                            <li class="<?php echo ($i == $p) ?'active' : '' ?> ">

                                <a class="page-link" href="?page=<?php echo $i;?>"><?php echo $i;?> </a>
                            </li>
                            <?php endfor; ?>
                            </li>
                            <?php
                            if($sotrang>$p)
                            {
                                echo "<a href='http://localhost/webphp/admin/modules/admin/?page=".($p+1)."' class='page-link'>Next</a>";
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