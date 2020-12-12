<?php 
    require_once  __DIR__. "/autoload/autoload.php";
    $sql = "SELECT * FROM product WHERE 1";
    $keyword = '';
    if(isset($_GET['keyword']) && $_GET['keyword'] != NULL )
    {
        $keyword = $_GET['keyword'];
        $sql .= " AND name LIKE '%$keyword%' ";
    }
    $kqtk = $db->fetchsql($sql);
?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section class="box-main1">
                <h3 class="title-main"><a href=""> Sản phẩm</a> </h3>
                <?php if(isset($kqtk) && count($kqtk) >0): ?>
                    <div class="showitem clearfix" style="margin-bottom: 10px; margin-top: 10px;" >
                     <?php foreach ($kqtk as $item): ?>
                            <div class="col-md-3 item-product bor">
                            <a href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>">
                                    <img src="public/uploads/product/<?php echo $item['thunbar']?>" class="" width="100%" height="230">
                            </a>
                                <div class="info-item">
                                        <a href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>"> <?php echo $item['name']; ?></a>
                                            <?php if ($item['sale'] > 0): ?>
                                                <p> <strike class="sale"><?php echo formatPrice($item['price']) ?> </strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b>
                                            <?php else: ?>
                                                <b class="price"><?php echo formatPrice($item['price']) ?></b>
                                            <?php endif; ?> 
                                </div>
                                <div class="hidenitem">
                                        <p><a href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                </div>
                            </div>             
                                           <?php endforeach ?> 
                        <?php else : ?>
                            Không có kết quả tìm kiếm
                        <?php endif; ?> 
                               
            </section>
        </div>
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>