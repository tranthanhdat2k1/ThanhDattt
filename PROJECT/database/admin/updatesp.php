<?php
include 'connect.php';
$brand = mysqli_query($conn, "SELECT * FROM brand");
$type = mysqli_query($conn, "SELECT * FROM type");
$category = mysqli_query($conn, "SELECT * FROM category");
$id = $_GET['id'];
$img_pro = mysqli_query($conn,"SELECT * FROM image where productid = $id");
 $sql_up = "SELECT * from product where productid = $id";
 $result = $conn->query($sql_up);
 $pro = mysqli_fetch_assoc($result);

 if(isset($_POST['submit'])){
 $id = htmlspecialchars($_POST['id']);   
 $name = htmlspecialchars($_POST['name']);
 $price = htmlspecialchars($_POST['price']);
 $typeid = htmlspecialchars($_POST['type']);
 $brand = htmlspecialchars($_POST['brand']);
 $category = htmlspecialchars($_POST['category']);
 $ProductDescription = htmlspecialchars($_POST['mota']);
 if(empty($_FILES['image']['name'])){
    $image = $pro['image'];
 }else{
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file( $image_tmp , 'uploads/' . $image);
    
 }
 //anh mo ta
    
 
 if(isset($_FILES['images'])){
    $ima = $_FILES['images'];
 $images = $ima['name'];
//  echo '<pre>';
//  print_r($_FILES['images']);
//  var_dump(empty($images));
//  die();
 //var_dump($ima['tmpname']);
 
 if(!empty($images[0])){
    // var_dump($images[0]);
    // die;   
    mysqli_query($conn,"DELETE FROM image where productid = $id");
    
    foreach($images as $key => $value){
        move_uploaded_file($ima['tmp_name'][$key], 'uploadsmota/' . $value);
     }
     foreach($images as $key => $value){
        mysqli_query($conn, "INSERT INTO image(productid,image) values('$id','$value') ");
 }
 
}
 }
 //
//  $id_pro = mysqli_insert_id($conn);

 $sql = "UPDATE product SET name = '$name' , price = '$price', brand = '$brand', typeid = '$typeid', categoryid = '$category', image = '$image', ProductDescription = '$ProductDescription' WHERE productid = $id";
  $result = $conn->query($sql);
  
  if($result){
    var_dump($pro);
    echo "UPDATE THÀNH CÔNG";
    header('location: danhsachsanpham.php');
  }else{
    echo $conn->connect_error;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-12">
                <form method="post" action=""  enctype="multipart/form-data">
                    <h2>Sửa sản phẩm</h2>
                    <a href="danhsachsanpham.php" class="btn btn-primary">Danh sách sản phẩm</a>
                    <input type="hidden" name="id" value="<?php echo $pro['productid']; ?>" />
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input name="name" type="text" class="form-control" id="ten" placeholder="Tên sản phẩm" value="<?php echo $pro['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Gía</label>
                        <input name="price" type="text" class="form-control"  value="<?php echo $pro['price'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Thương hiệu</label>
                        <input name="brand" type="text" class="form-control"  placeholder="Tên thương hiệu" value="<?php echo $pro['brand'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Kiểu dáng</label>
                        <select name="type" id="">
                        <option value="">___TYPE___</option>
                         <?php foreach($type as $key => $value){ ?>
                         <option value="<?php echo $value['typeid'] ?>"<?php echo ($value['typeid'] == $pro['typeid'])? 'selected' : ''   ?>><?php echo $value['nametype'] ?></option>
                             <?php } ?>
                         </select>
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="category" id="">
                        <option value="">category</option>
                        <?php foreach($category as $key => $value){ ?>
                        <option value="<?php echo $value['categoryid'] ?>"<?php echo ($value['categoryid'] == $pro['categoryid'])? 'selected' : ''   ?> ><?php echo $value['namecategory'] ?></option>
                          <?php } ?>
                       </select>
                     
                    </div>
                    <div class="form-group">
                    <input type="file" name = 'image' title="">
                    <img src="../admin/uploads/<?php echo $pro['image'] ?>" alt="" width="100">
                    </div>
                    <div class="form-group">
                        <LABel>ẢNH MÔ TẢ</LABel>
                    <input type="file" name = 'images[]' multiple="multiple">
            <div class="row">
                <?php 
                    foreach($img_pro as $key => $value){?>
                            <div class="col-md-4">
                                 <a href="#" class="thumbnail">
                                    <img src="uploadsmota/<?php echo $value['image'] ?>" alt="" style="width: 200px;" > 
                                 </a>
                            </div>
                   <?php } ?>
                    
                </div>
                   
                    </div>
                    

                    <label for="">Mô tả</label>
                     <textarea name="mota" id="" cols="50" rows="1" ><?php echo $pro['ProductDescription'] ?></textarea>
                     <div class="form-group">
                        <input type="submit" value="Thêm sản phẩm" name="submit" class="btn btn-primary" />
                    </div> 
                     
                </form>
            </div>
        </div>
    </div>
</body>
</html>