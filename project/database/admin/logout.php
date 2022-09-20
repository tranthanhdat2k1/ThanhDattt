<?php
session_start();
unset($_SESSION['userid']);
header('location:../admin/login.php');
?>