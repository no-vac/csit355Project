<?php
    require '../server/dbConnection.php';
    require '../public_html/components/header.php';
    
    $password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_BCRYPT));
    $currentId = $_SESSION['uid'];
    $changePwdSql = "UPDATE users SET password='$password' WHERE id=$currentId";
    mysqli_query($mysqli, $changePwdSql);

    header("Location: logoutController.php");
?>