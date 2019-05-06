<?php
    require '../../server/dbConnection.php';

    $originalUser_id = mysqli_real_escape_string($mysqli, $_POST['originalUser_id']);

    // sql delete
    $deleteProductSql = "DELETE FROM users WHERE id='$originalUser_id'";
    mysqli_query($mysqli, $deleteProductSql);

    $autoIncrementSql = "ALTER TABLE users AUTO_INCREMENT = 1";
    mysqli_query($mysqli, $autoIncrementSql);

    header("Location: ../../public_html/profile.php")
?>