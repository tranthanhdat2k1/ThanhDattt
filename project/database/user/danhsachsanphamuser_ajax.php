<?php
include 'connect.php';
session_start();

$object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
 $userid = $object;


 $result = mysqli_query($conn,"SELECT * FROM product");
 $total = mysqli_num_rows($result);
 $limit = 8;
 $page = ceil($total/$limit);
 if (!isset ($_GET['page']) ) {
 
     $cr_page = 1;
     
     } else {
     
     $cr_page = (int)$_GET['page'];
     
     }
  echo "Đây là trang số $cr_page";
 $start = ($cr_page -1)*$limit;
 $product = mysqli_query($conn,"SELECT * FROM product LIMIT $start,$limit");
 
  $row = $product->fetch_all(MYSQLI_ASSOC);
  
  $html = '<div class="row">';
  $html1 = '</div>';
  foreach($row as $val ){
        $html.=" <div class='col-md-3 col-sm-6 col-12'>
   
        <div class='card card-product mb-3'>
<div class='card-img'><img class='card-img-top' src='../admin/uploads/$val[image]' alt='' width='100' height='240px' class='img' style='object-fit: contain' ></div> 
<div class='card-body'>
<h5 class='card-title' > $val[name]</h5>
<!-- <p class='card-text'>  $val[ProductDescription]</p> -->
<div id='dathang'>
<a href='cart.php?id=$val[productid]&&userid=$userid&&action=add'>Mua hàng</a>
</div>
<div>
<a href='sanphamchitiet1.php?id=$val[productid]&&userid=$userid'>XEM</a>
</div>    
<!--  -->
</div>    </div>    </div>";

  }
  $html.=$html1;
  var_dump($html);
?>
    <link rel="stylesheet" href="./danhsachsanphamuser.css">
    <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script> 
  <!-- <script>
    $("#dathang").on("click","a",function(){
      $.get("cart.php",{
        
      })
    })
  </script> -->
  
