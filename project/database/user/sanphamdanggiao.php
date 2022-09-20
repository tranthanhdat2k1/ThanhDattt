<?php 
include 'connect.php';
$id = $_GET['userid'];
$trangthai = mysqli_query($conn,"SELECT * FROM `orders`");

        $order = mysqli_query($conn,"SELECT product.name,product.price,product.image,orderdetail.quantity,customer.name as ten_nguoi_nhan,customer.phone,orders.status FROM `orderdetail` INNER JOIN product on product.productid = orderdetail.productid INNER JOIN customer on customer.customerid = orderdetail.customerid INNER JOIN orders on orders.orderid = orderdetail.orderid WHERE orderdetail.userid = $id");
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<div class="container">
        <div class="row">
            <div class="col-12"> 
                <div class="d-flex justify-content-end mb-2">
                    <a href="danhsachsanphamuser.php?userid=<?php echo $id ?>" class="btn btn-primary">Tiếp tục mua hàng</a>
                </div>
                <table class="table table-responsive table-bordered">
                    
                        <?php $i =1; $total = 0;  ?>
                    <thead>
                        <th>STT</th>
                        <th>Người nhận hàng</th>
                        <th>Số điện thoại</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ</th>
                        <th>Số lương</th>
                        <th>ẢNH</th>
                        <th>Tổng tiền</th>
                    </thead>
                    <?php while($row = mysqli_fetch_assoc($order)) {
                    //    echo "<pre>";
                    //    var_dump($row);
                       if($row['status'] ==3){

                       
                        ?>
                    <tbody>
                        <td> <?php echo $i++ ?></td>
                       <td><?php echo $row['ten_nguoi_nhan'] ?></td>     
                       <td><?php echo $row['phone'] ?></td>                  
                       <td><?php echo $row['name'] ?></td>          
                       <td><?php  echo $row['price'] ?></td>
                       <td><?php echo $row['quantity'] ?></td>
                       <td><img src="../admin/uploads/<?php echo $row['image'] ?>" alt="" width="100"></td>
                       <td> <?php echo $total = $row['price'] * $row['quantity'] ?></td>
                       
                    </tbody>
                    <?php  } ?>
                    <?php  } ?>
                </table>
                
            </div>
        </div>
    </div>
    