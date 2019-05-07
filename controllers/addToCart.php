<?php
    require '../server/dbConnection.php';
    include "getCart.php";
    session_start();

    function _exists($object, $property, $item){
        foreach ($object -> $property as $index){
            if($index == $property){
                return true;
            }
        }
        return false;
    }

    $cart = getCart(); 

    $productId = mysqli_real_escape_string($mysqli, $_POST['productId']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $quantity= $_POST['quantity'];
    $newitem = [
        "productId" => $productId,
        "quantity" => $quantity,
        "price" => $price
    ];
    
    if(in_array($newitem, $cart)) {
        header("Location: ../public_html/store.php?err=1");
    } else {
        array_push($cart, $newitem);
        setcookie('uid:'.$_SESSION['uid'], json_encode($cart), time()+3600, "/");
        header("Location: ../public_html/store.php");
    }
?>
