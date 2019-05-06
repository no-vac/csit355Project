<?php
require '../server/dbConnection.php';
include "getCart.php";
session_start();
$cart = getCart();

$productId = mysqli_real_escape_string($mysqli, $_POST['productId']);
$key=array_search($productId, array_column($cart, "productId"));
array_splice($cart, $key, 1);
setcookie('uid:'.$_SESSION['uid'], json_encode($cart), time()+3600, "/");
header("Location: ../public_html/cart.php");
?>