<?php
$conn_db = new mysqli('localhost', 'root', '', null);
if ($conn_db->connect_error) {
    die('Connection failed: ') . $conn_db->connect_error;
}
$sql = "CREATE DATABASE IF NOT EXISTS project1";
$result = $conn_db->query($sql);
if ($result == TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn_db->connect_error;
}
$conn_db->select_db('project1');
$sql = "CREATE TABLE IF NOT EXISTS product(
    productid int primary key auto_increment not null,
    name varchar(100) not null,
    price int not null,
    brandid int(30) not null,
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
$sql = "CREATE TABLE IF NOT EXISTS brand(
    brandid int primary key auto_increment not null,
    namebrand varchar(100) not null
    )";
    $result = $conn_db->query($sql);
    if ($result) {
        echo "Table created successfully";
    } else {
        var_dump($conn_db);
        echo "Error creating table: " . $conn_db->connect_error;
    }
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
    order_address varchar(100) not null,
    order_phone varchar(100) not null
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
    userid int not null,
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
        userid int primary key auto_increment,
        username varchar(30) not null ,
        password varchar(30) not null,
        cfm_password varchar(30) not null,
        ten_dang_nhap varchar(40) not null,
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
        biling_address varchar(100) not null,
        phone varchar(100) not null
        
      )";
       $result = $conn_db->query($sql);
       if ($result) {
           echo "Table CUSTOMER successfully";
       } else {
           var_dump($conn_db);
           echo "Error creating table: " . $conn_db->connect_error;
       }


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
         userid int not null,   
         productid int,
         feedback varchar(10000)
  )";
   $result = $conn_db->query($sql);

   $sql = "ALTER TABLE orderdetail ADD CONSTRAINT FK_orderdetail_userid foreign key (userid) REFERENCES user(userid) ";
   $result = $conn_db->query($sql);
   if(!$result){ 
    echo "Error creating table: " . $conn_db->connect_error;
   }

$sql = "ALTER TABLE feedback ADD CONSTRAINT FK_feedback_userid foreign key (userid) REFERENCES user(userid) ";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE feedback ADD CONSTRAINT FK_feedback_productid foreign key (productid) REFERENCES product(productid) ";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE customer add userid int";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE customer ADD CONSTRAINT FK_customer_userid foreign key (userid) REFERENCES user(userid)";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE orders add ghichu varchar(100)";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE orderdetail add customerid int";
$result = $conn_db->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS status(
    statusid int primary key auto_increment,
    status varchar(25)
)";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE orders add status int";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE orders ADD CONSTRAINT FK_orders_status foreign key (status) REFERENCES status(statusid)";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE product ADD CONSTRAINT FK_product_brand FOREIGN KEY (brandid) REFERENCES brand(brandid)";
$result = $conn_db->query($sql);

if ($result) {
    echo "TẠO KHÓA NGOẠI THÀNH CÔNG";
} else {
    var_dump($conn_db);
    echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
}
$sql = "ALTER TABLE orderdetail ADD CONSTRAINT FK_orderdetail_customerid foreign key (customerid) REFERENCES customer(customerid)";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE orders add userid int";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE orders ADD CONSTRAINT FK_orders_userid FOREIGN KEY (userid) REFERENCES user(userid)";
$result = $conn_db->query($sql);
$sql = "ALTER TABLE `feedback` DROP FOREIGN KEY `FK_feedback_productid`; ALTER TABLE `feedback` ADD CONSTRAINT `FK_feedback_productid` FOREIGN KEY (`productid`) REFERENCES `product`(`productid`) ON DELETE CASCADE ON UPDATE CASCADE";
$result = $conn_db->query($sql);
// $sql = "DROP DATABASE demo";
// $result = $conn_db->query($sql);
// if ($result) {
//     echo "XÓA THÀNH CÔNG";
// } else {
//   echo "Error creating FOREIGN KEY: " . $conn_db->connect_error;
//  }

?>