<?php
    require '../server/dbConnection.php';
    // read items in the cart
    $cookie = isset($_COOKIE['cart_items_cookie']) ? $_COOKIE['cart_items_cookie'] : "";
    $cookie = stripslashes($cookie);
    $cart = json_decode($cookie, true);

    // to prevent null value
    $cart=$cart==null ? array() : $cart;

    $productId = mysqli_real_escape_string($mysqli, $_POST['productId']);
    
    array_push($cart, $productId);
    setcookie('cart_items_cookie', json_encode($cart), time()+3600, "/");

    header("Location: ../public_html/cart.php")
?>