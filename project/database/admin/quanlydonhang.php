<?php
include 'connect.php';
$result = mysqli_query($conn, "SELECT orders.orderid,orders.amount,customer.biling_address,customer.phone,customer.name,status.status FROM `orders` INNER JOIN customer on customer.customerid = orders.customerid INNER JOIN status on status.statusid = orders.status ");
$total = mysqli_num_rows($result);
$limit = 6;
$page = ceil($total/$limit);
if (!isset ($_GET['page']) ) {

    $cr_page = 1;
    
    } else {
    
    $cr_page = (int)$_GET['page'];
    
    }
$start = ($cr_page -1)*$limit;

$orders = mysqli_query($conn, "SELECT orders.orderid,orders.amount,customer.biling_address,customer.phone,customer.name,status.status FROM `orders` INNER JOIN customer on customer.customerid = orders.customerid INNER JOIN status on status.statusid = orders.status LIMIT $start,$limit ");
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
            <div class=""> 
                <div class="d-flex justify-content-end mb-2">
                    <a href="add-product.php" class="btn btn-primary">Add new</a>
                </div>
                <table class="table table-responsive table-bordered">
                    <?php $i = 1; ?>
                    <thead>
                       
                        <th>STT</th>
                        <th>GÍA</th>
                        <th>ĐỊA CHỈ</th>
                        <th>SÓ ĐIỆN THOẠI</th>
                        <th>TÊN</th>
                        <th>Trạng Thái</th>
                        <th>IN</th>
                        
                    </thead>
                    <tbody>
                        <?php 
                        while($row = mysqli_fetch_assoc($orders)){
//                             echo "<pre>";   
//                                var_dump($row);
//  die();
                                    ?>
                                    <tr>                                       
                                        <td><?php echo $i ++ ?></td>
                                        <td><?php echo $row['amount']; ?></td>
                                        <td><?php echo $row['biling_address']; ?></td>
                                        <td><?php echo $row['phone']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><a href="indonhang.php?orderid=<?php echo $row['orderid']?>">IN</a></td>
                                        <td><a href="chitietdonhang.php?orderid=<?php echo $row['orderid']?>">XEM</a></td>
                                       
                               
                            <?php } ?>
                            
                    </tbody>
                    </table>
                    <ul class="pagination ">
                <?php if($cr_page -1 > 0){  ?>
  <li class="page-item"><a class="page-link" href="quanlydonhang.php?page=<?php echo $cr_page -1 ?>">Previous</a></li>
  <?php } ?>
 <?php for($i = 1;$i <=  $page; $i++ ){ ?>
  <li class=" <?php echo  ($cr_page == $i)? 'active' : '' ?>" ><a class="page-link" href="quanlydonhang.php?page=<?php echo $i ?>"> <?php echo $i ?></a></li>
  <?php } ?>
  
  <?php if($cr_page + 1 <= $page){   ?>
    
  <li class="page-item"><a class="page-link" href="quanlydonhang.php?page=<?php echo $cr_page +1 ?>">Next</a></li>
  <?php } ?>
</ul>
                </form>
                
            </div>
        </div>
    </div>
    
</body>

</html>

