<?php
session_start();
$object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
$userid = $object;
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
    <h1 style="color: red">Đặt hàng thành công</h1>
    <h1 style="color: green"><a href="danhsachsanphamuser.php?userid=<?php echo $userid ?>">Tiêp tục mua hàng</a></h1>
</body>
</html>