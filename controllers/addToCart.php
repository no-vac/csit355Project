<?php
    require '../server/dbConnection.php';
    include "getCart.php";
    $cart = getCart(); 

    $productId = mysqli_real_escape_string($mysqli, $_POST['productId']);
    
    array_push($cart, $productId);
    setcookie('cart_items_cookie', json_encode($cart), time()+3600, "/");

    header("Location: ../public_html/store.php");
?>