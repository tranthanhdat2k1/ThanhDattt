<?php
include 'connect.php';
 $product = mysqli_query($conn,"SELECT * FROM product");
?>
<style>

   
</style>
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
        <h1>Danh sách sản phẩm</h1>
        <div class="warp">
        <?php 
                        while($row = mysqli_fetch_assoc($product)){
                                foreach($product as $key => $value){
                                    ?>
            
            <div>
            <img src="../admin/uploads/<?php echo $value['image'] ?>" alt="" width="100" class="img">
            </div>
            <div>
            <a href="sanphamchitiet.php?id=<?php echo $value['productid'] ?>">Mua hàng</a>
            </div>
            <?php } ?>
            <?php } ?>
            
            </div>
        </form>
</body>
</html>