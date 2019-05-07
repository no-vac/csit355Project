<?php
    require '../../server/dbConnection.php';

    $original_pNameId = mysqli_real_escape_string($mysqli, $_POST['original_pNameId']);

    // sql delete
    $deleteOrderSql = "DELETE FROM orders WHERE id='$original_pNameId'";
    mysqli_query($mysqli, $deleteOrderSql);

    $autoIncrementSql = "ALTER TABLE orders AUTO_INCREMENT = 1";
    mysqli_query($mysqli, $autoIncrementSql);

    header("Location: ../../public_html/profile.php")
?>