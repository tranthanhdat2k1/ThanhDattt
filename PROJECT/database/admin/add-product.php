<?php
include 'connect.php';

$success_html = '';

$type = mysqli_query($conn, "SELECT * FROM type");
$category = mysqli_query($conn, "SELECT * FROM category");
if(isset($_POST['submit'])){
 $name = htmlspecialchars($_POST['name']);
 $price = htmlspecialchars($_POST['price']);
 $typeid = htmlspecialchars($_POST['type']);
 $brand = htmlspecialchars($_POST['brand']);
 $category = htmlspecialchars($_POST['category']);
 $ProductDescription = htmlspecialchars($_POST['mota']);


 $image = $_FILES['image']['name'];
 move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);


 $ima = $_FILES['images'];
 $images = $ima['name'];
 if(isset($_FILES['images'])){
 //var_dump($ima['tmpname']);
 foreach($images as $key => $value){
    move_uploaded_file($ima['tmp_name'][$key], 'uploadsmota/' . $value);
 }

 }
// echo '<pre>';
// print_r($_FILES);
// die;
 if(empty($name)){
   
    $success_html = '<div class="alert alert-success" role="alert">Vui lòng nhập tên sản phẩm</div>';
 }
 if(empty($price)){
    
    $success_html = '<div class="alert alert-success" role="alert">Vui lòng nhập giá</div>';
 }
 if(empty($type)){
    
    $success_html = '<div class="alert alert-success" role="alert">Vui lòng nhập kiểu dáng</div>';
 }
 if(empty($brand)){
    
    $success_html = '<div class="alert alert-success" role="alert">Vui lòng nhập thương hiệu</div>';
 }
 if(empty($category)){
    
    $success_html = '<div class="alert alert-success" role="alert">Vui lòng nhập danh mục</div>';
 }
 if(empty($ProductDescription)){
    
    $success_html = '<div class="alert alert-success" role="alert">Vui lòng nhập mô tả</div>';
 }
 if(empty($image)){
    
    $success_html = '<div class="alert alert-success" role="alert">Vui lòng nhập ảnh</div>';
 }
 $sql = "INSERT INTO product (name, price, brand ,typeid , categoryid , image,ProductDescription) values ('$name', '$price', '$brand', '$typeid', '$category', '$image','$ProductDescription')";
 $result = $conn -> query($sql);
 if($result){
      header('location: danhsachsanpham.php');
 }else{
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
 $id_pro = mysqli_insert_id($conn);
foreach($images as $key => $value){
    mysqli_query($conn, "INSERT INTO image(productid,image) values('$id_pro','$value') ");
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
                    <h2>Thêm sản phẩm</h2>
                    <a href="danhsachsanpham.php" class="btn btn-primary">Danh sách sản phẩm</a>
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input name="name" type="text" class="form-control" id="ten" placeholder="Tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label>Gía</label>
                        <input name="price" type="text" class="form-control" />
                    </div>
                       <div class="form-group">
                        <label>Thương hiệu</label>
                        <input name="brand" type="text" class="form-control" id="ten" placeholder="Tên thương hiệu">
                    </div>    
                       </div>                 
                    </select>
                    
                    <!-- <button ><a href="add-brand.php"class="btn btn-primary" > Thêm thương hiệu </a></button> -->
                    </div>
                    <div class="form-group">
                        <label>Kiểu dáng</label>
                        <select name="type" id="">
                        <option value="" class="disabled">___TYPE___</option>
                         <?php foreach($type as $key => $value){ ?>
                         <option value="<?php echo $value['typeid'] ?>"><?php echo $value['nametype'] ?></option>
                             <?php } ?>    
            </select>
                         <!-- <button><a href="add-type.php" class="btn btn-primary"> Thêm kiểu dáng </a></button>        -->
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="category" id="">
                        <option value="" class="disabled">category</option>
                        <?php foreach($category as $key => $value){ ?>
                        <option value="<?php echo $value['categoryid'] ?>"><?php echo $value['namecategory'] ?></option>
                          <?php } ?>
                       </select>
                       <!-- <button><a href="add-category.php" class="btn btn-primary"> Thêm danh mục</a></button> -->
                    </div>
                    <div class="form-group">
                        <LABel>ẢNH</LABel>
                    <input type="file" name ='image'>
                    </div>
                    <div class="form-group">
                        <LABel>ẢNH MÔ TẢ</LABel>
                    <input type="file" name = 'images[]' multiple="multiple">
                    </div>
                    <label for="">Mô tả</label>
                    <textarea name="mota" id="" cols="50" rows="1" required></textarea>
                     <div class="form-group">
                        <input type="submit" value="Thêm sản phẩm" name="submit" class="btn btn-primary" />
                    </div>  
                </form>
                <?php echo $success_html; ?>
            </div>
        </div>
    </div>
</body>
</html>

<!-- $sql = "CREATE TABLE IF NOT EXISTS product(
    productid int primary key auto_increment not null,
    name varchar(100) not null,
    price int not null,
    brandid int not null,
    typeid int not null,
    categoryid int not null,
    image varchar(100) not null
    )";
$result = $conn_db->query($sql);
if ($result) {
    echo "Table created successfully";
} else {
    var_dump($conn_db);
    echo "Error creating table: " . $conn_db->connect_error;
}
$sql = "ALTER TABLE product add ProductDescription varchar(1000)";
$result = $conn_db->query($sql); -->

