<?php
    require '../server/dbConnection.php';

    $original_pNameId = mysqli_real_escape_string($mysqli, $_POST['original_pNameId']);

    // sql delete
    $deleteProductSql = "DELETE FROM products WHERE id='$original_pNameId'";
    mysqli_query($mysqli, $deleteProductSql);

    header("Location: ../public_html/profile.php")
?>