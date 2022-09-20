<?php
include 'connect.php';
session_start();
$cart = (isset($_SESSION['cart']))? $_SESSION['cart'] : [];
// $row = mysqli_fetch_all($cart);
$total = 0; 
foreach($cart as $key => $value){
    $total += $value['price'] * $value['quantity'];
}
 //var_dump($cart['id']);
 $object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
 $userid = $object;
$error = [];
if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $ghichu = htmlspecialchars($_POST['ghichu']);
    var_dump($ghichu);

    if(empty($name)){
        $error['name'] = "Bạn chưa nhập tên";
    }
    if(empty($phone)){
        $error['phone'] = "Bạn chưa nhập số điện thoại";
    }
    preg_match("/^[0-9]{10}$/", $phone, $matchh);
    if(!$matchh){
        $error['phonee'] = "Phone khong hop le";
    }
    if(empty($address)){
        $error['address'] = "Bạn chưa nhập địa chỉ";
    }
    
    if(count($error) == 0){
     
    $customer = "INSERT INTO `customer` (`customerid`, `name`, `biling_address`, `phone`,`userid`) VALUES (NULL,'$name','$address', $phone,$userid)";
    $result = $conn->query($customer);
    $customer_id = $conn->insert_id;
    var_dump($customer_id);

    $order ="INSERT INTO `orders` (`orderid`, `customerid`, `amount`, `status`, `ghichu`,`userid`) VALUES (NULL, $customer_id, $total, '1','$ghichu',$userid)";
    $result = $conn->query($order);
    $order_id = $conn->insert_id;
   
    
    foreach($cart as $key => $value){
       $sql = "INSERT INTO `orderdetail` (`orderdetailid`,`userid`, `orderid`, `productid`, `price`, `quantity`,`customerid`) VALUES (NULL,$userid, $order_id,".$value['id'].", ".$value['price'].", ".$value['quantity'].",$customer_id)";
       $result = $conn -> query($sql);
       if($result){
        unset($_SESSION['cart']);
        header("location: success.php?userid=$userid");
       }else{
        echo "Error: " . $conn->error;
       }
    }

}
 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label  for="">Tên</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Số điện thoại</label>
            <input type="text" name="phone">
        </div>
        <div>
            <label for="">Địa chỉ</label>
            <input type="text" name="address">
        </div>
        <div>
            <label for="">Ghi chú</label>
            <textarea name="ghichu" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" value="Đặt hàng" name="submit">
        <?php 
         foreach($error as $key => $value){
              echo $value;
         }
        ?>
    </form>
</body>
</html>