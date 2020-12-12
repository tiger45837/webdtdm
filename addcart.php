<?php 
	require_once  __DIR__. "/autoload/autoload.php"; 
	$id = intval(getInput('id'));
	$product = $db->fetchID("product",$id);
	if(!isset($_SESSION['cart'][$id]))
	{	
		$_SESSION['cart'][$id]['name']    = $product['name'];
		$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
		$_SESSION['cart'][$id]['qty']     = 1;
		$_SESSION['cart'][$id]['price']   = ((100 - $product['sale']) * $product['price']) / 100;
	}
	else
	{
		$_SESSION['cart'][$id]['qty'] += 1;
	}
		echo " <script>alert(' Thêm sản phẩm thành công');location.href='gio-hang.php' </script> ";
 ?>