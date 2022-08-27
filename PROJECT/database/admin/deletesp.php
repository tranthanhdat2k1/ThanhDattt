<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM image WHERE productid= $id";
$result = $conn->query($sql);
$sql = "DELETE  from product where productid = $id";
$result = $conn->query($sql);
header('location: danhsachsanpham.php');
?>