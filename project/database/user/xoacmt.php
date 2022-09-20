<?php
include 'connect.php';
$id = $_GET['feedbackid'];
$userid = $_GET['userid'];
$product = $_GET['productid'];
var_dump($id);
var_dump($userid);
var_dump($product);

$sql = mysqli_query($conn,"DELETE FROM feedback WHERE `feedback`.`id` = $id");

$idpro = mysqli_query($conn,"SELECT * from feedback WHERE  feedback.userid = $userid");
$row = mysqli_fetch_assoc($idpro);
echo "<pre>";
var_dump($row);
header("location: sanphamchitiet1.php?id=$product&&userid=$userid");
?>