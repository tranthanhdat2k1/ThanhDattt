<?php
include 'connect.php';

session_start();
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
include 'header.php';
// var_dump($cart);

$object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
$userid = $object;
$error = [];
// FEEDBACK



$id = $_GET['id'];

    $sql = "SELECT * from product where productid = $id";
    $result = $conn->query($sql);
    // $row = mysqli_fetch_all($result);
    // echo "<pre>";
    // var_dump($row);
    // $status = mysqli_query($conn,"SELECT * from orders where userid =");



    if (isset($_POST['submit'])) {
        $feedback = htmlspecialchars($_POST['cmt']);

        if (empty($feedback)) {
            $error['feedback'] = "Bạn chưa nhập feedback";
        }
        if (count($error) == 0) {
            $sql = mysqli_query($conn, "INSERT INTO `feedback` (`id`, `userid`, `productid`, `feedback`) VALUES (NULL, '$userid', '$id', '$feedback')");
        }
    }
    $cmt = mysqli_query($conn, "SELECT *, user.username FROM `feedback` INNER JOIN user on user.userid = feedback.userid");


    $img = mysqli_query($conn, "SELECT * FROM image where productid = $id");
    $category = mysqli_query($conn, "SELECT * FROM category INNER JOIN product on category.categoryid = product.categoryid WHERE product.productid = $id");
    //var_dump($category);
    $type = mysqli_query($conn, "SELECT * FROM type INNER JOIN product on type.typeid = product.typeid WHERE product.productid = $id");
    $brand = mysqli_query($conn, "SELECT * FROM brand INNER JOIN product on brand.brandid = product.brandid WHERE product.productid = $id");


    $status = mysqli_query($conn, "SELECT orders.status,orderdetail.productid FROM `orders` INNER JOIN user on user.userid = orders.userid INNER JOIN orderdetail on orderdetail.customerid = orders.customerid WHERE orders.userid=$userid");

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
        <link href='./sanphamchitiet1.css' rel='stylesheet'>
        <link href="./sourcecss.css" rel="stylesheet">
    </head>

    <body>
        <div id="container1">


            <div class="main">
                <div class="main_title">
                    <h1>Chi tiết sản phẩm</h1>
                </div>

                <!-- start -->
                <form action="cart.php" method="GET">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo '<pre>';
                        // var_dump($row);
                        // var_dump($result);
                        foreach ($result as $key => $value) {
                    ?>
                            <div class="main_content">
                                <!-- ẢNH ĐẦU TIÊN                 -->
                                <div class="main_content_img-main">
                                    <img src="../admin/uploads/<?php echo $value['image'] ?>" alt="" class="img_main">
                                </div>

                                <div class="main_content_box">
                                    <!-- NAME -->
                                    <!-- <h1 id="name">quat</h1> -->
                                    <h2 class="main_content_nameprd content"><?php echo  $value['name']  ?></h2>
                                    <!-- BRAND -->
                                    <div class="main_content_branch content">

                                        <label for="">Brand:</label>
                                        <?php foreach ($brand as $key => $brand) {
                                            if ($brand['brandid'] == $value['brandid']) {
                                                echo $brand['namebrand'];
                                            }
                                        ?>

                                        <?php } ?>
                                    </div>
                                    <!-- category             -->
                                    <div class="main_content_category content">
                                        <label for="">Category:</label>
                                        <?php foreach ($category as $key => $category) {
                                            if ($category['categoryid'] == $value['categoryid']) {
                                                echo $category['namecategory'];
                                            }
                                        ?>

                                        <?php } ?>
                                    </div>



                                    <!-- TYPE -->
                                    <div class="main_content_type content">
                                        <label for="">Type:</label>
                                        <?php foreach ($type as $key => $type) {
                                            if ($type['typeid'] == $value['typeid']) {
                                                echo $type['nametype'];
                                            }
                                        ?>

                                        <?php } ?>
                                    </div>

                                    <!-- GIA -->
                                    <div class="main_content_price content"><label for="">Price:</label> <?php echo $value['price'] ?></div>
                                    <!-- QUANTITY -->
                                    <div class="main_content_quantity content">
                                        <label for="">Quantity:</label>
                                        <input type="number" name="quantity" value="1">
                                        <input type="hidden" name="id" value="<?php echo $value['productid'] ?>">
                                        <input type="hidden" name="userid" value=<?php echo $userid ?>>

                                    </div>

                                    <!-- ẢNH MÔ TẢ-->
                                    <div class="main_content_imgdes content">
                                        <?php while ($anh = mysqli_fetch_all($img)) {
                                            foreach ($img as $key => $hi) {
                                        ?>
                                                <div class="img_des"> <img class='lst_img-des1' src="../admin/uploadsmota/<?php echo $hi['image'] ?>" alt=""> </div>

                                            <?php } ?>
                                            <!-- ADD TO CART -->
                                            <div class="main_content_addcart content"> <input type="submit" class="add-cart" value="ADD TO CART "> </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                            <!-- MÔ TẢ -->
                            <div class="main_description">
                                <?php echo  $value['ProductDescription'] ?>
                            </div>

                        <?php } ?>
                    <?php  } ?>
            </div>

            <!-- FEEDBACK -->
            </form>
            <?php

            ?>
            <!-- Hiện feedback     -->
            <div>
                <?php
                while ($row = mysqli_fetch_assoc($cmt)) {
                    if ($row['productid'] == $id) {

                        echo "<div class='sua'>";
                        echo $row['username'];
                        echo ":";
                        echo $row['feedback'];
                        echo "<span>";
                        if ($row['userid'] == $userid) {
                            echo "<button><a href='editcmt.php?userid=$row[userid]&&feedbackid=$row[id]'>Sửa</a></button>";
                            echo "<button><a href='xoacmt.php?userid=$row[userid]&&feedbackid=$row[id]&&productid=$row[productid]'>Xóa</a></button>";
                        }
                        echo "</span>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
            <!--  -->
            <?php foreach ($status as $key => $value) {

                if ($value['status'] == 2 && $value['productid'] == $id) {
            ?>

                    <form action="" method="post">

                        <div>
                            <label for="">Comment</label>
                            <textarea name="cmt" id="" cols="200" rows="2"></textarea>
                        </div>
                        <input type="submit" value="ADD-FEEDBACK" name="submit">
                        <?php
                        foreach ($error as $error) {
                            echo '<p class="text-danger">' . $error . '</p>';
                        }
                        ?>
                        <input type="hidden" name="userid" value="<?php $userid ?>">
                        <input type="hidden" name="productid" value="<?php $id ?>">

                    </form>

                <?php  } ?>
            <?php  } ?>
        </div>


        <script>
            var img_main = document.querySelector(".img_main");
            console.log(img_main);
            var lst_img = document.querySelectorAll(".lst_img-des1");
            console.log(lst_img);
            lst_img.forEach(Image => {
                Image.addEventListener('click', e => {
                    img_main.src = e.target.getAttribute('src');
                })
            })
        </script>
    </body>

    </html>
