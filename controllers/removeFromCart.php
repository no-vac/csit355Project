<?php
require '../server/dbConnection.php';
include "getCart.php";
$cart = getCart();

$productId = mysqli_real_escape_string($mysqli, $_POST['productId']);
$key=array_search($productId, array_column($cart, "productId"));
array_splice($cart, $key, 1);
setcookie('cart_items_cookie', json_encode($cart), time()+3600, "/");
header("Location: ../public_html/cart.php");
?>