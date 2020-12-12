<?php 
    require_once  __DIR__. "/../../autoload/autoload.php";
    $open = "category";
    $category = $db->fetchAll("category");  
 ?>
<?php require_once  __DIR__. "/../../layouts/header.php";   ?>
<div class="container">
    <div class="row">
        <div class="col-1g-12">
            <h1 class="page-header">
                Danh sách danh mục
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
                            <th>Viết tắt</th>
                            <th>Trạng thái</th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($category as $item): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['slug']; ?></td>
                            <td>
                                <a href="home.php?id=<?php echo $item['id'] ?>"
                                    class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' : 'btn-default' ?>">
                                    <?php echo $item['home'] == 1 ? 'Hiển thị ' : 'Không' ?>
                                </a>
                            </td>
                            <td><?php echo $item['created_at']; ?></td>
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
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php require_once  __DIR__. "/../../layouts/footer.php";   ?>