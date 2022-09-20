<?php
include 'connect.php';
$orderdetailid = $_GET['orderdetailid'];
var_dump($orderdetailid);
$sql = mysqli_query($conn,"DELETE FROM orderdetail WHERE `orderdetail`.`orderdetailid` = $orderdetailid");
header("location:sanphamdangchoxuly.php?userid=$_GET[userid]");

?>