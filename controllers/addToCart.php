<?php
    require '../server/dbConnection.php';
    include "getCart.php";

    function _exists($object, $property, $item){
        foreach ($object->$property as $index){
            if($index==$property){
                return true;
            }
        }
        return false;
    }


    $cart = getCart(); 

    $productId = mysqli_real_escape_string($mysqli, $_POST['productId']);
    $quantity= $_POST['quantity'];
    $newitem = [
        "productId" => $productId,
        "quantity" => $quantity 
    ];
    if(in_array($newitem, $cart)) {
        header("Location: ../public_html/store.php?err=1");
    } else {
        array_push($cart, $newitem);
        setcookie('cart_items_cookie', json_encode($cart), time()+3600, "/");
        header("Location: ../public_html/store.php");
    }
?>
