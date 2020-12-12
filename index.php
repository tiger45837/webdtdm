<?php 
    require_once  __DIR__. "/autoload/autoload.php"; 
    $sqlHomecate = "SELECT name,id FROM category WHERE home ";  
    $CategoryHome = $db->fetchsql($sqlHomecate);
    $data = [];
        foreach ($CategoryHome as $item)
         {
        $cateId = intval($item['id']);
        $sql = " SELECT * FROM product WHERE category_id = $cateId";
        $ProductHome = $db->fetchsql($sql);
        $data[$item['name']] = $ProductHome;
        }
 ?>
    <?php require_once  __DIR__. "/layouts/header.php"; ?>
        <div class="col-md-9 bor">
            <section id="slide" class="text-center" >
            <div class+col-md-3>
            <div class="bd-example">
            <div class="col-md-12">
            <img src="public/frontend/images/nq.jpg" width="50px" height="50px" >
            <p style="font-family: 'Great Vibes', cursive; font-size: 50px" >Glad to see you!</p>
            <h2 style="font-family: 'Kaushan Script', cursive;">Welcome to MixiShop</h2>
            </div>
            
        </div>
        <div class="col-md-12">
        <br>
        </div>
            <div class ="col-md-4">
                <div class="icon-img" style="">
                    <div>
                        <img src="public/frontend/images/cart.png" width="50px" height="50px">
                    </div>
                </div>
                <div class="icon-text">
                    <div>
                        <h3>Giao hàng toàn quốc</h3>
                        <p>Giao hàng đến tận nơi nhanh chóng, đảm báo</p>
                    </div>
                </div>
            </div>
            <div class ="col-md-4">
                <div class="icon-img" style="">
                    <div>
                        <img src="public/frontend/images/return.png" width="50px" height="50px">
                    </div>
                </div>
                <div class="icon-text">
                    <div>
                        <h3>Hỗ trợ đổi trả</h3>
                        <p>Chúng tôi hỗ trợ đổi trả sản phẩm lỗi do nhà sản xuất hoặc vận chuyển. Đổi size khi còn nguyên tem mác</p>
                    </div>
                </div>
            </div>
            <div class ="col-md-4">
                <div class="icon-img" >
                    <div>
                        <img src="public/frontend/images/living-room.png" width="50px" height="50px">
                    </div>
                </div>
                <div class="icon-text">
                    <div>
                        <h3>Support 24/7</h3>
                        <p>Hỗ trợ qua hệ thống fanpage, trả lời thắc mắc 24/7 trên Instagram</p>
                    </div>
                </div>
            </div>
       
            </section>    
            
        </div>
        
        <div class="col-md-9 bor" style="text-align:center">  
        <hr>
        <div class="img"></div>
            <div class="col-md-12">
            <div class="col-md-5">
            <img src="public/frontend/images/bag.gif" alt="" style="border-radius: 20%" width="200px", weight="200px">
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-5">
            <img src="public/frontend/images/head.gif" alt="" style="border-radius: 20%" width="200px", weight="200px">
            </div>
            </div>
            <div class="col-md-5">
            <p style="font-family: 'Kaushan Script', cursive; font-size: 17px">MixiShop là hệ thống cửa hàng thuộc quyền sở hữa của Mixi Gaming. Với những món đồ trên đây
            đều là hàng nội địa, thiết kế trẻ trung, hợp thời trang, gần gũi với mọi người, mọi người có thể xem và
            tham khảo sau đó liên hệ bộ phân tư vấn để được tư vấn trực tiếp. Cảm ơn các bạn đã ghé thăm.</p>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-5">
            <p style="font-family: 'Great Vibes', cursive; font-size: 24px">MixiShop is a store system owned by Mixi Gaming. With the items above
            are all domestic goods, youthful design, trendy, close to everyone, everyone can see and refer to then contact the consulting department for direct advice. Thank you for visiting.</p>
            </div>
        </div>
        <div class="col-md-9">
        <section class="box-main1">
                <?php foreach ($data as $key => $value): ?>
                    <h3 class="title-main"><a href=""> <?php echo $key ?></a> </h3>
           
                    <div class="showitem clearfix" style="margin-bottom: 10px; margin-top: 10px;" >
                     <?php foreach ($value as $item): ?>
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
                <?php endforeach ?>   
            </section>
        </div>
        
    <?php require_once  __DIR__. "/layouts/footer.php"; ?>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
</style>