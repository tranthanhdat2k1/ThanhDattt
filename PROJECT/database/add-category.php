<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $cate = htmlspecialchars($_POST['cate']);

    $sql = "INSERT INTO category(namecategory) values('$cate')";

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
    <form action="" method="post">
        Thêm danh mục
        <br>
        Category <input type="text" name="cate">
        <input type="submit" name="submit" value="Thêm">
    </form>
</body>
</html>