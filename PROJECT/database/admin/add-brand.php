<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $brand = htmlspecialchars($_POST['brand']);

    $sql = "INSERT INTO brand(namebrand) values('$brand')";

    $result = $conn -> query($sql);
    if($result){
      header('location: add-product.php');
     }else{
     echo "Error: " . $sql . "<br>" . $conn->error;
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
    <form action="add-brand.php" method="post">
        Thêm thương hiệu
        <br>
        Brand <input type="text" name="brand">
        <input type="submit" name="submit" value="Thêm">
    </form>
</body>
</html>