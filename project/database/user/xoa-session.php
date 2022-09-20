<?php
session_start();
unset($_SESSION['cart']);
  header('location: view-cart.php');
//  die();
?>