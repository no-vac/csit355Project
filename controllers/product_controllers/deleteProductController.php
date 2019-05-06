<?php
    require '../../server/dbConnection.php';

    $original_pNameId = mysqli_real_escape_string($mysqli, $_POST['original_pNameId']);

    // sql delete
    $deleteProductSql = "DELETE FROM products WHERE id='$original_pNameId'";
    mysqli_query($mysqli, $deleteProductSql);

    /* reset auto increment
    $productCountQuery = "SELECT count(*) FROM products";
    $productCountResult = mysqli_query($mysqli, $productCountQuery);
    $productCount = mysqli_fetch_assoc($productCountResult);*/
    $autoIncrementSql = "ALTER TABLE products AUTO_INCREMENT = 1";
    mysqli_query($mysqli, $autoIncrementSql);

    header("Location: ../../public_html/profile.php")
?>