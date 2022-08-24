<?php
include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE  from product where productid = $id";
$result = $conn->query($sql);
header('location: danhsachsanpham.php');
?>