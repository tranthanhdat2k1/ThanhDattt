<?php
$conn_db = new mysqli('localhost', 'root', '', null);
if ($conn_db->connect_error) {
    die('Connection failed: ') . $conn_db->connect_error;
}
$sql = "CREATE DATABASE IF NOT EXISTS project111";
$result = $conn_db->query($sql);
if ($result == TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn_db->connect_error;
}
$conn_db->select_db('project111');
$sql = "CREATE TABLE IF NOT EXISTS product(
    productid int primary key auto_increment not null,
    name varchar(100) not null,
    price int not null,
    brand varchar(30) not null,
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
$result = $conn_db->query($sql);
// $sql = "CREATE TABLE IF NOT EXISTS brand(
//     brandid int primary key auto_increment not null,
//     namebrand varchar(100) not null
//     )";
//     $result = $conn_db->query($sql);
//     if ($result) {
//         echo "Table created successfully";
//     } else {
//         var_dump($conn_db);
//         echo "Error creating table: " . $conn_db->connect_error;
//     }
$sql = "CREATE TABLE IF NOT EXISTS type(
    typeid int primary key auto_increment not null,
    nametype varchar(100) not null
    )";
    $result = $conn_db->query($sql);
    if ($result) {
        echo "Table created successfully";
    } else {
        var_dump($conn_db);
        echo "Error creating table: " . $conn_db->connect_error;
    }    
$sql = "CREATE TABLE IF NOT EXISTS category(
    categoryid int primary key auto_increment not null,
    namecategory varchar(100) not null
    )";
    $result = $conn_db->query($sql);
    if ($result) {
        echo "Table created successfully";
    } else {
        var_dump($conn_db);
        echo "Error creating table: " . $conn_db->connect_error;
    }

    
    
    
$sql = "CREATE TABLE IF NOT EXISTS orders(
    orderid int not null primary key auto_increment ,
    customerid int not null ,
    amount int not null,
    shipping varchar(100) not null,
    order_address varchar(100) not null,
    order_phone varchar(100) not null,
    order_email varchar(100) not null,
    order_date varchar(100) not null 
    )";
    $result = $conn_db->query($sql);
    if ($result) {
        echo "Table created successfully";
    } else {
        var_dump($conn_db);
        echo "Error creating table: " . $conn_db->connect_error;
    }    
$sql = "CREATE TABLE IF NOT EXISTS orderdetail(
    orderdetailid int not null primary key auto_increment ,
    orderid int not null ,
    productid int not null ,
    price int not null,
    quantity int not null
    )";
    $result = $conn_db->query($sql);
    if ($result) {
        echo "Table created successfully";
    } else {
        var_dump($conn_db);
        echo "Error creating table: " . $conn_db->connect_error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS user(
        username varchar(30) not null primary key,
        password varchar(30) not null,
        cfm_password varchar(30) not null,
        phone varchar(30) not null,
        email varchar(30) not null
    )";
    $result = $conn_db->query($sql);
    if ($result) {
        echo "Table created successfully";
    } else {
        var_dump($conn_db);
        echo "Error creating table: " . $conn_db->connect_error;
    }    
    

    $sql = "CREATE TABLE IF NOT EXISTS customer(
        customerid int not null primary key auto_increment ,
        name varchar(100) not null,
        password varchar(100) not null,
        biling_address varchar(100) not null,
        phone varchar(100) not null,
        email varchar(100) not null,
        country varchar(100) not null       
      )";
       $result = $conn_db->query($sql);
       if ($result) {
           echo "Table CUSTOMER successfully";
       } else {
           var_dump($conn_db);
           echo "Error creating table: " . $conn_db->connect_error;
       }
// $sql = "ALTER TABLE product ADD CONSTRAINT FK_product_brand FOREIGN KEY (brandid) REFERENCES brand(brandid)";
// $result = $conn_db->query($sql);
// if ($result) {
//     echo "TẠO KHÓA NGOẠI THÀNH CÔNG";
// } else {
//     var_dump($conn_db);
//     echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
// }

$sql = "ALTER TABLE product ADD CONSTRAINT FK_product_type FOREIGN KEY (typeid) REFERENCES type(typeid)";
$result = $conn_db->query($sql);
if ($result) {
    echo "TẠO KHÓA NGOẠI THÀNH CÔNG";
} else {
    var_dump($conn_db);
    echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
}
$sql = "ALTER TABLE product ADD CONSTRAINT FK_product_category FOREIGN KEY (categoryid) REFERENCES category(categoryid)";
$result = $conn_db->query($sql);
if ($result) {
    echo "TẠO KHÓA NGOẠI THÀNH CÔNG";
} else {
    var_dump($conn_db);
    echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
}

$sql = "ALTER TABLE orderdetail add constraint FK_orderdaetail_product foreign key (productid) references product(productid)";
$result = $conn_db->query($sql);
if ($result) {
    echo "KHÓA NGOẠI TẠO THÀNH CÔNG";
} else {
    var_dump($conn_db);
    echo "Error creating table: " . $conn_db->connect_error;
}
   $sql = "ALTER TABLE orders add constraint FK_orders_customerid FOREIGN KEY (customerid) references customer(customerid)";
$result = $conn_db->query($sql);
if ($result) {
    echo "TẠO KHÓA NGOẠI THÀNH CÔNG";
} else {
    var_dump($conn_db);
    echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
}
$sql = "ALTER TABLE orderdetail ADD CONSTRAINT FK_orderdetail_order FOREIGN KEY (orderid) REFERENCES orders(orderid)";
$result = $conn_db->query($sql);
if ($result) {
    echo "TẠO KHÓA NGOẠI THÀNH CÔNG";
} else {
    var_dump($conn_db);
    echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
 }
 
 $sql = "CREATE TABLE IF NOT EXISTS image(
    imageid int primary key auto_increment not null,
    productid int not null,
    image varchar(100) not null
    )";
    $result = $conn_db->query($sql);
    if ($result) {
        echo "Table created successfully";
    } else {
        var_dump($conn_db);
        echo "Error creating table: " . $conn_db->connect_error;
    }  
if ($result) {
    echo "ADD THÀNH CÔNG";
} else {
    var_dump($conn_db);
    echo "LỖI " . $conn_db->connect_error;
 }
  $sql = "ALTER TABLE image ADD CONSTRAINT FK_image_product foreign key (productid) REFERENCES product(productid) ";
  $result = $conn_db->query($sql);
 if ($result) {
     echo "TẠO KHÓA NGOẠI THÀNH CÔNG";
 } else {
     var_dump($conn_db);
   echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
  }  
  $sql = "CREATE TABLE feedback (
         id int auto_increment not null primary key,
         productid int,
         feedback varchar(10000)
  )";
   $result = $conn_db->query($sql);
// $sql = "DROP DATABASE project111";
// $result = $conn_db->query($sql);
// if ($result) {
//     echo "XÓA THÀNH CÔNG";
// } else {
//     var_dump($conn_db);
//   echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
//  }
?>