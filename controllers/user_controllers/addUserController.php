<?php
    require '../../server/dbConnection.php';

    // getting POST variables
    $fName = mysqli_real_escape_string($mysqli, $_POST['fName']);
    $lName = mysqli_real_escape_string($mysqli, $_POST['lName']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $access = mysqli_real_escape_string($mysqli, $_POST['access']);
    $password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_BCRYPT));

    // sql insert
    $addUserSql = "INSERT INTO users (fName, lName, email, access, password)"."VALUES('$fName', '$lName', '$email', '$access', '$password')";
    mysqli_query($mysqli, $addUserSql);

    header("Location: ../../public_html/profile.php");
?>