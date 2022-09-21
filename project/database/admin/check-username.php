<?php
 include 'connect.php';
 $username = $_GET["username"];

 $sql = mysqli_query($conn,"SELECT * FROM user where username='$username'");
 $dong = mysqli_num_rows($sql);
 echo $dong;
?>