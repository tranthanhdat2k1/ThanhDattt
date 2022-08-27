<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "SELECT * from product where productid = $id";
$result = $conn->query($sql);
$img = mysqli_query($conn,"SELECT * FROM image where productid = $id");
$category = mysqli_query($conn, "SELECT * FROM category INNER JOIN product on category.categoryid = product.categoryid");
//var_dump($category);
$type = mysqli_query($conn, "SELECT * FROM type INNER JOIN product on type.typeid = product.typeid");

//$img_pro = mysqli_fetch_all($img);
//echo '<pre>';
//var_dump($img_pro); 
// $product = mysqli_fetch_assoc($result);
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
<?php 
                        while($row = mysqli_fetch_assoc($result)){
                            // echo '<pre>';
                            // var_dump($row);
                            // var_dump($result);
                                foreach($result as $key => $value){
                                    ?>
            <div style="display: flex">
            <div>
<!-- ẢNH ĐẦU TIÊN                 -->
            <img src="../admin/uploads/<?php echo $value['image'] ?>" alt="" width="500" class="img">
            </div>
<!-- ẢNH MÔ TẢ-->
            <div class="" style="margin-left:70px">
                          <?php while($anh = mysqli_fetch_all($img)){
                                   foreach($img as $key => $hi){
                                    ?>
                                    <img src="../admin/uploadsmota/<?php echo $hi['image'] ?>" alt="" style="width: 300px;" >                                                                                         
                           <?php } ?>
                           <?php } ?>
            </div>
            </div>
<!-- BRAND -->
            <div style="display: flex"> 
                <label for="">Brand:</label>
                <div> <?php echo $value['brand'] ?></div>
            </div>
<!-- category             -->
            <div style="display: flex"> 
                <label for="">CATEGORY</label>
              
               
                    <div><?php while(($row['categoryid'] == 1)){ ?>
                        <?php  echo '<div style="font-size:30px">' .'quạt trần'.'</div>';
                                      break;
                                     ?>
                  <?php  } ?>      
                  <?php while(($row['categoryid'] == 2)){ ?>
                        <?php  echo '<div style="font-size:30px">' .'quạt đứng'.'</div>';
                                      break;
                                     ?>
                  <?php  } ?>
                  <?php while(($row['categoryid'] == 3)){ ?>
                        <?php  echo '<div style="font-size:30px">' .'quạt âm trần'.'</div>';
                                      break;
                                     ?>
                  <?php  } ?>   
                  <?php while(($row['categoryid'] == 4)){ ?>
                        <?php  echo '<div style="font-size:30px">' .'quạt cầm tay'.'</div>'; 
                                      break;
                                     ?>
                  <?php  } ?>   
                 </div>
                 
                 
            </div>
<!-- TYPE -->
<div style="display: flex"> 
                <label for="">TYPE</label>
               <?php
               while($cate =  mysqli_fetch_all($category)){
               foreach($category as $key => $categoryy){ ?>
                    <div><?php while(($row['typeid'] == 5)){ ?>
                        <?php  echo '<div style="font-size:30px">' .'hiện đại'.'</div>';
                                      break;
                                     ?>
                  <?php  } ?>      
                  <?php while(($row['typeid'] == 6)){ ?>
                        <?php  echo '<div style="font-size:30px">' .'cổ điển'.'</div>';
                                      break;
                                     ?>
                  <?php  } ?>
                  <?php while(($row['typeid'] == 7)){ ?>
                        <?php  echo '<div style="font-size:30px">' .'tương lai'.'</div>';
                                      break;
                                     ?>
                  <?php  } ?>   
                  <?php while(($row['typeid'] == 8)){ ?>
                        <?php  echo '<div style="font-size:30px">' .'tối giản'.'</div>'; 
                                      break;
                                     ?>
                  <?php  } ?>   
                 </div>
                 
                 <?php break; } ?>
            </div>
            <?php break; } ?>
<!-- MÔ TẢ -->
<div style="display: flex; display: inline-block"> 
                <label for="">Mô tả:</label>
                <div> <?php echo $value['ProductDescription'] ?></div>
            </div>
            <?php } ?>
            <?php  } ?>
</body>
</html>