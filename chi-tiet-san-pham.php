<?php 
	require_once  __DIR__. "/autoload/autoload.php"; 
	$id = intval(getInput('id'));
	//chi tiet san pham
	$product = $db->fetchID("product",$id);
    //lay danh muc san pham
    $cateid = intval($product['category_id']);
    $sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY id DESC LIMIT 4";
    $sanphamlienquan = $db->fetchsql($sql);
?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor clearfix">
            <section class="box-main1" >
	            <div class="col-md-6 text-center">
	                <img src="public/uploads/product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
	                </ul>
	            </div>
                <div class="col-md-6 bor clearfix" style="margin-top: 20px;padding: 30px;">
                   <ul id="right">
                        <li><h3><?php echo $product['name'] ?></h3></li>
                        <?php if ($product['sale'] > 0): ?>
                        	<li><p> <strike class="sale"><?php echo formatPrice($product['price']) ?> </strike> <b class="price"><?php echo formatpricesale($product['price'],$product['sale']) ?></b></li>
                        <?php else: ?>
                        	<li><b class="price"><?php echo formatPrice($product['price']) ?></b></li>
                        <?php endif ?>                      
                        <li><a href="addcart.php?id=<?php echo $product['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ</a></li>
                   </ul>
                </div>
            </section>
            <div class="col-md-12" id="tabdetail">
            	<div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
                        <li><a data-toggle="tab" href="#menu1">Thông tin khác </a></li>
                        <li><a data-toggle="tab" href="#menu2"></a></li>
                        <li><a data-toggle="tab" href="#menu3"></a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h3>Nội dung</h3>
                            <p><?php echo $product['content']; ?></p>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3> Không có gì  :( </h3>
                            <p>.</p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3></h3>
                            <p></p>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
            	</div>
            </div>
            <div class="col-md-12">
                <h3>SẢN PHẨM LIÊN QUAN</h3>
                <div class="showitem clearfix" style="margin-bottom: 10px; margin-top: 10px;" >
                     <?php foreach ($sanphamlienquan as $item): ?>
                            <div class="col-md-3 item-product bor">
                            <a href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>">
                                    <img src=" <?php echo uploads() ?>product/<?php echo $item['thunbar']?>" class="" width="100%" height="230">
                            </a>
                                <div class="info-item">
                                        <a href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>"> <?php echo $item['name']; ?></a>
                                        <?php if ($item['sale'] > 0): ?>
                            <p> <strike class="sale"><?php echo formatPrice($item['price']) ?> </strike> <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b>
                        <?php else: ?>
                            <b class="price"><?php echo formatPrice($item['price']) ?></b>
                        <?php endif ?> 
                                </div>
                                <div class="hidenitem">
                                        <p><a href="chi-tiet-san-pham.php?id= <?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                                        <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                </div>
                            </div>
                    <?php endforeach ?>                   
                </div> 
            </div>
       </div>
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>