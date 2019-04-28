<?php
    require '../server/dbConnection.php';

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    
    header("Location: ../public_html/profile.php");
?>