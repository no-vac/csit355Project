<?php
    require '../../server/dbConnection.php';

    $originalUser_id = mysqli_real_escape_string($mysqli, $_POST['originalUser_id']);

    // sql delete
    $deleteProductSql = "DELETE FROM users WHERE id='$originalUser_id'";
    mysqli_query($mysqli, $deleteProductSql);

    header("Location: ../../public_html/profile.php")
?>