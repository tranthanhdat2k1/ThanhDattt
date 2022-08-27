<?php
include 'connect.php';
$prodcut = mysqli_query($conn, "SELECT product.*, type.nametype as kieu_Dang, category.namecategory as danh_muc FROM product  INNER JOIN type on type.typeid = product.typeid INNER JOIN category on category.categoryid = product.categoryid");
//$category =     mysqli_query($conn,"SELECT * from product");
//B1: tinh tong so ban ghi cua danhsachsanpham
 $total = mysqli_num_rows($prodcut);
 //var_dump($total);
 
// var_dump($total);
//B2: thiet lap so ban ghi tren 1 trang
 $limit = 3;
//B3:tinh so trang
$page = ceil($total/$limit);
//var_dump($page);
//var_dump($page);
//B4: lay trang hien tai
if (!isset ($_GET['page']) ) {

    $cr_page = 1;
    
    } else {
    
    $cr_page = (int)$_GET['page'];
    
    }
//echo $cr_page;
//B5:TINH START
 $start = ($cr_page -1)*$limit;
//6. Query
$result = mysqli_query($conn,"SELECT product.*,  type.nametype as kieu_Dang, category.namecategory as danh_muc FROM product INNER JOIN type on type.typeid = product.typeid INNER JOIN category on category.categoryid = product.categoryid LIMIT $start,$limit");

 
// echo '<pre>';
// var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
<div class="container">
        <div class="row">
            <div class="col-12"> 
                <div class="d-flex justify-content-end mb-2">
                    <a href="add-product.php" class="btn btn-primary">Add new</a>
                </div>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>product-id</th>
                        <th>Tên sản phẩm</th>
                        <th>Gía</th>
                        <th>Thương hiệu</th>
                        <th>Kiểu dáng</th>
                        <th>Danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Mô tả</th>
                        <th>Cập nhật</th>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = mysqli_fetch_assoc($result)){
                                foreach($result as $key => $value){
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $key +1 ?></td>
                                        <td><?php echo $value['productid']; ?></td>
                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['price']; ?></td>
                                        <td><?php echo $value['brand']; ?></td>
                                        <td><?php echo $value['kieu_Dang']; ?></td>
                                        <td><?php echo $value['danh_muc']; ?></td>
                                        <td><img src="uploads/<?php echo $value['image'] ?>" alt="" width="50"></td>
                                        <td><?php echo $value['ProductDescription']; ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="updatesp.php?id=<?php echo $value['productid'] ?>">Cap nhat</a>
                                           <button><a href="deletesp.php?id=<?php echo $value['productid'] ?>" class="btn btn-danger btn-delete">Xoa</a></button> 
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            <?php } ?>
                            
                    </tbody>
                    
                </table>
                <ul class="pagination ">
                <?php if($cr_page -1 > 0){  ?>
  <li class="page-item"><a class="page-link" href="danhsachsanpham.php?page=<?php echo $cr_page -1 ?>">Previous</a></li>
  <?php } ?>
 <?php for($i = 1;$i <=  $page; $i++ ){ ?>
  <li class=" <?php echo  ($cr_page == $i)? 'active' : '' ?>" ><a class="page-link" href="danhsachsanpham.php?page=<?php echo $i ?>"> <?php echo $i ?></a></li>
  <?php } ?>
  
  <?php if($cr_page + 1 <= $page){   ?>
    
  <li class="page-item"><a class="page-link" href="danhsachsanpham.php?page=<?php echo $cr_page +1 ?>">Next</a></li>
  <?php } ?>
</ul>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
