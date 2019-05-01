<?php
    require '../../server/dbConnection.php';

    $editUserSql = "UPDATE users SET ";
    $editedAttributeCount = 0;

    $originalUser_id = mysqli_real_escape_string($mysqli, $_POST['originalUser_id']);

    if (strlen($_POST["fName"]) > 0) {
        $fName = mysqli_real_escape_string($mysqli, $_POST['fName']);
        $editedAttributeCount > 0 ? $editUserSql .= ", fName='$fName'" : $editUserSql .= "fName='$fName'"; 
        $editedAttributeCount++;
    }
    
    if (strlen($_POST["lName"]) > 0) {
        $lName = mysqli_real_escape_string($mysqli, $_POST['lName']);
        $editedAttributeCount > 0 ? $editUserSql .= ", lName='$lName'" : $editUserSql .= "lName='$lName'";
        $editedAttributeCount++;
    }

    // getting pDescription
    if (strlen($_POST["email"]) > 0) {
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $editedAttributeCount > 0 ? $editUserSql .= ", email='$email'" : $editUserSql .= "email='$email'"; 
        $editedAttributeCount++;
    }

    if (strlen($_POST["password"]) > 0) {
        $password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_BCRYPT));
        $editedAttributeCount > 0 ? $editUserSql .= ", password='$password'" : $editUserSql .= "password='$password'"; 
        $editedAttributeCount++;
    }

    // getting minOrder
    if (strlen($_POST["access"]) > 0) {
        $access = mysqli_real_escape_string($mysqli, $_POST['access']);
        $editedAttributeCount > 0 ? $editUserSql .= ", access='$access'" : $editUserSql .= "access='$access'"; 
        $editedAttributeCount++;
    } 

    // sql update
    $editUserSql .= " WHERE id='$originalUser_id'";
    mysqli_query($mysqli, $editUserSql);

    header("Location: ../../public_html/profile.php")
?>