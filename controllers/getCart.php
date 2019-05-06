<?php
function getCart() {
     // read items in the cart
     $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : -1;
     $cookie = isset($_COOKIE['uid:'.$uid]) ? $_COOKIE['uid:'.$uid] : "";
     $cookie = stripslashes($cookie);
     $cart = json_decode($cookie, true);

  
 
     // to prevent null value
     $cart = $cart == null ? array() : $cart;
     return $cart;
}

?>