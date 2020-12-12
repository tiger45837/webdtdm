

<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title></title>
</head>

<body>

<?php 

$con = mysqli_connect("localhost","root","","webphp");

$sqlCategory = "SELECT * FROM category WHERE status = '1'";
$sqlProduct = "SELECT * FROM product WHERE status = '1'";
$sqlUser = "SELECT * FROM users WHERE status = '1'";


$dataCategory = mysqli_query($con,$sqlCategory);
$dataProduct = mysqli_query($con,$sqlProduct);
$dataUser = mysqli_query($con,$sqlUser);

 
?>




<table border="0">
  <tr>
     <th>Tổng Số Category</th>
     <th>Tổng Số Product</th>
     <th>Tổng Số User</th>
   
  </tr>

  <?php 
        $row1 = mysqli_num_rows($dataCategory)   ;
        $row2 = mysqli_num_rows($dataProduct)  ;
        $row3 = mysqli_num_rows($dataUser)  ;
  ?>

   <tr>
       <td><?php echo $row1; ?></td>
       <td><?php echo $row2; ?></td>
       <td><?php echo $row3; ?></td>
       
   </tr>
      
</table>

<?php mysqli_close($con);  ?>
</body>

</html>

