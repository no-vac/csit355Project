<?php
    require '../server/dbConnection.php';
    require '../public_html/components/header.php';
    include "./getCart.php";
    $cart = getCart();

    foreach ($cart as $prod) {
        $productId = $prod['productId'];
        $quantity = $prod['quantity'];
        $price = $prod['price'];
        $finalPrice = $price * $quantity;

        $findProductSql  = "SELECT * FROM `products` WHERE id=$productId";
        $findProductResult = mysqli_query($mysqli, $findProductSql);
        $findProductRow = $findProductResult -> fetch_assoc();

        $oldQuantity = $findProductRow['stock'];
        $pName = $findProductRow['pName'];
        $pDescription = $findProductRow['pDescription'];
        $category = $findProductRow['category'];
        $userId = $_SESSION['uid'];
        $orderStatus = "Processing";
        date_default_timezone_set("America/New_York");
        $orderTimeStamp = date("Y-m-d H:i:s");
        $pImage = $findProductRow['pImage'];

        $purhcaseOrderSql = "INSERT INTO orders(pName, quantity, pDescription, category, price, userId, orderStatus, orderTimeStamp, pImage) VALUES('$pName', $quantity, '$pDescription', '$category', $finalPrice, $userId, '$orderStatus', '$orderTimeStamp', '$pImage')";
        mysqli_query($mysqli, $purhcaseOrderSql);

        // subtracting stock
        $newStock = $oldQuantity - $quantity;
        $subtractStockSql = "UPDATE products SET stock='$newStock' WHERE id=$productId";
        mysqli_query($mysqli, $subtractStockSql);
    }

    header("Location: ../public_html/completedOrder.php");
?>