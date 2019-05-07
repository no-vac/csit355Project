<?php
    require '../server/dbConnection.php';

    $didPurchase = true;
    
    // variables that were commented out need to grab id from product (must do this in a form)

    /*
    $pName = mysqli_real_escape_string($mysqli, $_POST['email']);
    $quantity = mysqli_real_escape_string($mysqli, $_POST['email']);
    $pDescription = mysqli_real_escape_string($mysqli, $_POST['email']);
    $category = mysqli_real_escape_string($mysqli, $_POST['email']);
    $price = mysqli_real_escape_string($mysqli, $_POST['email']);
    */
    $userId = mysqli_real_escape_string($mysqli, $user_id);
    /*
    $orderStatus = mysqli_real_escape_string($mysqli, $_POST['email']);
    // $orderTimeStamp = mysqli_real_escape_string($mysqli, $_POST['email']);
    $pImage = mysqli_real_escape_string($mysqli, $_POST['email']);
    */

    $purhcaseOrderSql = "INSERT INTO orders(pName, quantity, pDescription, category, price, userId, orderStatus, orderTimeStamp, pImage) VALUES('$pName', $quantity, '$pDescription', '$category', $price, $userId, '$orderStatus', '$orderTimeStamp', '$pImage')";
    mysqli_query($mysqli, $addOrderSql);

    header("Location: ../public_html/completedOrder.php");
?>