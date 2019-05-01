<?php
function getCart() {
     // read items in the cart
     $cookie = isset($_COOKIE['cart_items_cookie']) ? $_COOKIE['cart_items_cookie'] : "";
     $cookie = stripslashes($cookie);
     $cart = json_decode($cookie, true);
 
     // to prevent null value
     $cart = $cart == null ? array() : $cart;
     return $cart;
}
?>