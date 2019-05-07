<?php
    require '../../server/dbConnection.php';

    $original_pNameId = mysqli_real_escape_string($mysqli, $_POST['original_pNameId']);

    // deleting image
    $productImagePathSql = "SELECT pImage FROM products WHERE id='$original_pNameId'";
    $productImagePathResult = mysqli_query($mysqli, $productImagePathSql);
    $productImagePath = mysqli_fetch_assoc($productImagePathResult);
    $completeProductImagePath = "../".implode($productImagePath)."";
    unlink($completeProductImagePath);
    
    // sql delete
    $deleteProductSql = "DELETE FROM products WHERE id='$original_pNameId'";
    mysqli_query($mysqli, $deleteProductSql);

    $autoIncrementSql = "ALTER TABLE products AUTO_INCREMENT = 1";
    mysqli_query($mysqli, $autoIncrementSql);

    header("Location: ../../public_html/profile.php?".$deleteResult."")
?>