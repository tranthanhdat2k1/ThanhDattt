<?php
include 'connect.php';
$id = $_GET['id'];
var_dump($id);
$sql = "DELETE FROM image WHERE productid= $id";
$result = $conn->query($sql);
$sql = "DELETE FROM feedback WHERE `feedback`.`id` = $id";
$result = $conn->query($sql);
$sql = "DELETE FROM orderdetail WHERE `orderdetail`.`id` = $id";
$result = $conn->query($sql);
$sql = "DELETE  from product where productid = $id";
$result = $conn->query($sql);
header('location: danhsachsanpham.php');
?>