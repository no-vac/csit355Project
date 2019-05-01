<?php
require '../server/dbConnection.php';
include "getCart.php";
$cart = getCart();

$productId = mysqli_real_escape_string($mysqli, $_POST['productId']);
    
$index=array_search($productId, $cart);
array_splice($cart, $index, 1);
setcookie('cart_items_cookie', json_encode($cart), time()+3600, "/");

header("Location: ../public_html/cart.php");
?>