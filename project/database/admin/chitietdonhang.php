<?php
include 'connect.php';
$order = mysqli_query($conn, "SELECT orders.amount, product.name as ten_san_pham, customer.name as ten_nguoi_dung, customer.biling_address, customer.phone, orderdetail.quantity,orders.ghichu,status.status,orders.status FROM `orders` INNER JOIN orderdetail on orderdetail.orderid = orders.orderid INNER JOIN product on orderdetail.productid = product.productid INNER JOIN customer on customer.customerid = orders.customerid INNER JOIN status on status.statusid = orders.status WHERE orders.orderid = $_GET[orderid]");
$row = mysqli_fetch_assoc($order);
// echo "<pre>";
// var_dump($row);
if(isset($_POST['submit'])){
    $status = htmlspecialchars($_POST['status']);
    $sql = mysqli_query($conn,"UPDATE `orders` SET `status` = '$status' WHERE `orders`.`orderid` = $_GET[orderid]");
    header('location:quanlydonhang.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiet don hang</title>
    <!-- <link href="./sourcecss.css" rel="stylesheet">
    <link href="./chitietdonhang.css" rel="stylesheet"> -->
</head>
<body>
<div id="container1">
        <div id ="header">
            <div id="header1">
                <nav class="nav">
                    <a href="" id="logo">
                        <img src="../../public/logo.png" alt="">
                    </a>
                    <ul id="main-menu">
                        <li><a class="linkheader" href="#">Products</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul>
                        </li> 
                        <li><a class="linkheader" href="#">Help Center</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul></li>
                        <li><a class="linkheader" href="#">Explore</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul></li>
                    </ul>
                </nav>
            </div>
    </div>
    <div class="content">
        <div class="box">
        <h1>Chi tiết đơn hàng</h1>
        <!-- thong tin nguoi nhan -->
        <?php  
        $total = 0;
        ?>
       <div class="para1"><div id="nguoinhan"><b>Người nhận:</b> <span> <?php echo $row["ten_nguoi_dung"] ?> </span> </div>
            <div id="dienthoai"><b>Điện thoại:</b> <span> <?php echo $row['phone'] ?></span></div>
            <div id="diachi"><b>Địa chỉ:</b> <span> <?php echo $row['biling_address'] ?></span></div>
            <div id="status"><b>Trạng thái:</b> 
            <span> <?php if($row['status'] ==1){
                echo "Chưa xử lí";
            }  ?></span>
            <span> <?php if($row['status'] ==2){
                echo "đã xử lý";
            }  ?></span>
            <span> <?php if($row['status'] ==3){
                echo "đang giao hàng";
            }  ?></span>
            <span> <?php if($row['status'] ==4){
                echo "hủy";
            }  ?></span>
            </div>
        </div> 
        <h2>Danh sách sản phẩm</h2>
        <?php
             foreach($order as $key => $value){
             
        ?>
               <div>
                <span><?php echo $key +1?></span>
                <span><?php echo $value['ten_san_pham'] ?></span>
                <span>:</span>
                <span><?php echo $value['quantity'] ?></span>
               </div> 
               
        <?php $total += $value['quantity'];  
        }
             
        ?>
        <!-- danh sach san pham duoc them -->
        <div class="para2">
            <div class="danhsach"></div>
        </div>
        <!-- tong so luong quat duoc them va tong so tien phai  tra -->
        <div class="para3">
            <div id="tongsoluong"><b>Tổng số lượng:</b> <span><?php echo number_format($total)  ?></span> - </div>
            <div id="tongtien"><b>Tổng tiền:</b> <span> <?php echo number_format($row['amount'])  ?></span></div>
        </div>
        <!-- ghi chú -->
        <div class="ghichu"><b>Ghi chú:</b> <span><?php echo $row['ghichu'] ?></span></div>
    </div>
    </div>
</div>
<form action="" method="post">
     <select name="status" id="">
        <option value="">___Trạng Thái___</option>
        <option value="1">chưa xử lý</option>
        <option value="2">đã xử lý</option>
        <option value="3">đang giao hàng</option>
        <option value="4">hủy</option>
     </select>
     <input type="submit" value="Cập nhật" name="submit">
</form>
</body>
</html>