<?php 
    require_once  __DIR__. "/../../autoload/autoload.php"; 
    $open = "transaction";
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }
    $sql = "SELECT transaction.*,users.name as nameuser,users.phone as phoneuser,users.address as adruser FROM transaction LEFT JOIN users ON users.id = transaction.users_id ORDER BY ID DESC  ";
    $transaction = $db->fetchJone("transaction",$sql,$p,4,true);
    if(isset($transaction['page']))
    {
        $sotrang = $transaction['page'];
        unset($transaction['page']);
    }
 ?>
<?php require_once  __DIR__. "/../../layouts/header.php";   ?>
<div class="container">
    <div class="row">
        <div class="col-1g-12">
            <h1 class="page-header">
                Danh sách đơn hàng
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
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Mã giao dịch</th>
                            <th>Tổng tiền</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; foreach ($transaction as $item): ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><?php echo $item['nameuser']; ?></td>
                            <td><?php echo $item['phoneuser']; ?></td>
                            <td><?php echo $item['adruser']; ?></td>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['amount']; ?>đ</td>
                            <td><?php echo $item['created_at'] ?></td>
                            <td>
                                <a href="status.php?id=<?php echo $item['id'] ?>"
                                    class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-info' ?> "><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                            </td>
                            <td>
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
                                echo "<a href='http://localhost/webphp/admin/modules/transaction/?page=".($p-1)."' class='page-link'>Previous</a>";
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
                            <?php
                            if($sotrang>$p)
                            {
                                echo "<a href='http://localhost/webphp/admin/modules/transaction/?page=".($p+1)."' class='page-link'>Next</a>";
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