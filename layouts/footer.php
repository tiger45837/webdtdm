</div>

<section id="footer" style="background: #58ACFA">
    <div class="container">
        <div class="col-md-12" id="shareicon">
            <ul>
                <li>
                    <a href=""><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-youtube"></i></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
        <p></p>
        </div>
        <div class="col-md-4">
            <div class="col-md-4">
            <a href=""><img src="<?php echo base_url()?>public/frontend/images/logo-mixi.png" width="150px"height="100px"></a>
            </div>
            <div class="col-md-1">
            
            </div>
            
            <div class="col-md-6">
            <h3 class="title-footer"> Thông Tin</h3>
            <ul>
                <li>
                    <i class="fa fa-angle-double-right" style="font-size:30px"></i>
                    <a href='#' style="font-size:20px"><i></i>Giới Thiệu</a>
                </li>
                <li>
                    <i class="fa fa-angle-double-right" style="font-size:30px"></i>
                    <a href='#' style="font-size:20px"><i></i>Liên Hệ</a>
                </li>
            </ul>
            </div>
        </div>
        <div class="col-md-4">
    
        <div class="col-md-12">
        <h3 class="title-footer">Liên Hệ</h3>
        <ul>
            <li>
                <i class="fa fa-home" style="font-size:30px"></i> 
                <a href='#' style="font-size:20px">Quan Lien Chieu, Da Nang</a>
            </li>
            <li>
                <i class="sp-ic fa fa-phone" style="font-size:30px"></i>
                <a href='#' style="font-size:20px">0965272988</a>
            </li>
            <li>
                <i class="sp-ic fa fa-envelope" style="font-size:30px"></i> 
                <a href='#' style="font-size:20px">devilzz1999@gmail.com</a>
            </li>
        </ul>
        </div>
    </div>
        
    </div>
    </div>
</section>





</div>
</div>
</div>  
</div>
<script src="/webphp/public/frontend/js/slick.min.js"></script>
</body>

</html>
<script type="text/javascript">
$(function() {
    $hidenitem = $(".hidenitem");
    $itemproduct = $(".item-product");
    $itemproduct.hover(function() {
        $(this).children(".hidenitem").show(100);
    }, function() {
        $hidenitem.hide(500);
    })
})
$(function() {
    $updatecart = $(".updatecart");
    $updatecart.click(function(e) {
        e.preventDefault();
        $qty = $(this).parents("tr").find("#qty").val();
        console.log($qty);
        $key = $(this).attr("data-key");
        $.ajax({
            url: 'cap-nhat-gio-hang.php',
            type: 'GET',
            data: {
                'qty': $qty,
                'key': $key
            },
            success: function(data) {
                if (data == 1) {
                    alert("Cập nhật thành công");
                    location.href = 'gio-hang.php';
                }
            }
        });
    })
})
</script>