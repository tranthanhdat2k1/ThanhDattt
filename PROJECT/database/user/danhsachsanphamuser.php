<?php
include 'connect.php';
session_start();
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
}

$object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
 $userid = $object;
 

//  echo "<pre>";
//  var_dump($_SESSION['user']);
//  $object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
//  var_dump($object);


 $result = mysqli_query($conn,"SELECT * FROM product");
 $total = mysqli_num_rows($result);
 $limit = 12;
 $page = ceil($total/$limit);
 if (!isset ($_GET['page']) ) {
 
     $cr_page = 1;
     
     } else {
     
     $cr_page = (int)$_GET['page'];
     
     }
 $start = ($cr_page -1)*$limit;




 $product = mysqli_query($conn,"SELECT * FROM product LIMIT $start,$limit");
?>
<style>

   
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='./danhsachsanphamuser.css' rel='stylesheet'>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="./sourcecss.css" rel="stylesheet">
</head>
<body>
<div id="container1">
        <div id ="header">
            <div id="header1">
                <nav class="nav">
                    <a href="" id="logo">
                        <img src="../public/logo.png" alt="">
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
            <div class="img">
                <img src="../public/bia.png" alt=""> 
                <div class="text"><a style="position: absolute;" href="../../html/index.html">Home</a></div>
            </div>
        </div>
    </div>
        <div class="container">
        <div class="row mt-5">
            <form action="" method="post">
            <h1>Danh sách sản phẩm</h1>
            <div class="product-group">
            <div class="row">
       
                <?php 
                            while($row = mysqli_fetch_assoc($product)){
                                    foreach($product as $key => $value){
                                        ?>
                                             <div class="col-md-3 col-sm-6 col-12">
                                        <div class="card card-product mb-3">
                       <div class="card-img"><img class="card-img-top" src="../admin/uploads/<?php echo $value['image'] ?>" alt="" width="100" class="img"></div> 
                    <div class="card-body">
                    <h5 class="card-title"><?php echo $value['name'] ?></h5>
                    <!-- <p class="card-text"><?php echo $value['ProductDescription'] ?></p> -->
                    <div>
                        <a href="cart.php?id=<?php echo $value['productid'] ?>&&userid=<?php echo $userid ?> "&action="add">Mua hàng</a>
                     </div>
                     <div>
                    
                         <?php  ?>
                        <a href="sanphamchitiet1.php?id=<?php  echo $value['productid'] ?>&&userid=<?php echo $userid ?>">XEM</a>
                      </div>    
                    <!--  -->
                    </div>    </div>    </div>
                <?php } ?>
                <?php } ?>  
        
                             
                </div>
            </div>
            </form>
        </div>
        </div>  
        <ul class="pagination">
                <?php if($cr_page -1 > 0){  ?>
  <li class="page-item"><a class="page-link" href="danhsachsanphamuser.php?page=<?php echo $cr_page -1 ?>&&userid=<?php echo $userid ?>">Previous</a></li>
  <?php } ?>
 <?php for($i = 1;$i <=  $page; $i++ ){ ?>
  <li class=" <?php echo  ($cr_page == $i)? 'active' : '' ?>" ><a class="page-link" href="danhsachsanphamuser.php?page=<?php echo $i ?>&&userid=<?php echo $userid ?>"> <?php echo $i ?></a></li>
  <?php } ?>
  
  <?php if($cr_page + 1 <= $page){   ?>
    
  <li class="page-item"><a class="page-link" href="danhsachsanphamuser.php?page=<?php echo $cr_page +1 ?>&&userid=<?php echo $userid ?>">Next</a></li>
  <?php } ?>
</ul>
        <button><a href="sanphamdamua.php?userid=<?php echo $userid ?>">Sản phẩm đã mua</a></button>
        <button><a href="sanphamdanggiao.php?userid=<?php echo $userid ?>">Sản phẩm đang giao</a></button>
        <button><a href="sanphamdahuy.php?userid=<?php echo $userid ?>">Sản phẩm đã hủy</a></button>
        <button><a href="sanphamdangchoxuly.php?userid=<?php echo $userid ?>">Sản phẩm đang chờ xử lý</a></button>
        <button><a href="view-cart.php?userid=<?php echo $userid ?>">Giỏ hàng(<?php 
              if(isset($_SESSION['cart'])){
                echo count($cart);
              }else{
                echo 0;
              }
        ?>)</a></button>

    <script src="../js/jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>