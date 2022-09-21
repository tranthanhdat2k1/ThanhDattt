<?php
session_start();
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
include 'connect.php';
$object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
$userid = $object;

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
//  echo"<pre>";                          
//  var_dump($cart);

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

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="d-flex justify-content-end mb-2">

                </div>
                <table class="table table-responsive table-bordered">
                    <thead>
                        <th>STT</th>
                        <th>Ảnh </th>
                        <th>Tên sản phẩm</th>
                        <th style="width: 500px">Số lượng</th>
                        <th>Gía</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        //  echo '<pre>';
                        //  var_dump($cart);
                        $i = 1;
                        $total = 0;
                        foreach ($cart as $key => $value) {
                            // echo"<pre>";   
                            // var_dump($value['userid']);

                            if ($userid == $value['userid']) {
                                // var_dump($value);


                        ?>
                                <tr>
                                    <td><?php echo $i++  ?></td>
                                    <td><img src="../admin/uploads/<?php echo $value['image'] ?>" alt="" width="200"></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td>
                                        <form action="cart.php" method="get" enctype="multipart/form-data">
                                            <input type="hidden" value="update" name="action">
                                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                            <input type="hidden" name="userid" value="<?php echo $userid ?>">
                                            <input type="text" name="quantity" value="<?php echo $value['quantity'] ?>" style="width: 50px">
                                            <button type="submit">Cập nhật </button>
                                        </form>
                                    </td>
                                    <td><?php echo $value['price']; ?></td>
                                    <td><?php echo number_format($subtotal = ($value['price'] * $value['quantity'])) ?></td>
                                    <td class="btn btn-warning"><a href="cart.php?id=<?php echo $value['id'] ?>&action=delete">XÓA</a></td>
                                </tr>

                                <?php $total += $subtotal;

                                ?>

            </div>
    <?php
                            }
                        }

    ?>
    <div>
        <tr>
            <td colspan="6"> TỔNG TIỀN(VNĐ): <?php echo number_format($total)  ?> 
             <?php if (isset($_SESSION['cart'])) { ?>
            <button><a href="dathang.php?userid=<?php echo $userid ?>">Mua hàng(<?php echo $i - 1  ?>)</a>
        </button>
        <?php } ?></td>
        </tr>
        <button><a href="xoa-session.php">Xóa Giỏ Hàng</a></button>
        <Button><a href="danhsachsanphamuser.php?userid=<?php echo $userid ?>">Trang chủ</a></Button>
       
        <button><a href="sanphamdamua.php?userid=<?php echo $userid ?>">Sản phẩm đã mua</a></button>
        <button><a href="sanphamdanggiao.php?userid=<?php echo $userid ?>">Sản phẩm đang giao</a></button>
        <button><a href="sanphamdahuy.php?userid=<?php echo $userid ?>">Sản phẩm đã hủy</a></button>
        <button><a href="sanphamdangchoxuly.php?userid=<?php echo $userid ?>">Sản phẩm đang chờ xử lý</a></button>
        </tbody>

        </table>


    </div>
        </div>
    </div>
</body>

</html>