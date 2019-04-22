<?php
    $_SESSION['fName'] = $_POST['fName'];
    $_SESSION['lName'] = $_POST['lName'];
    $_SESSION['email'] = $_POST['email'];
    
    $fName = mysqli_real_escape_string($mysqli, $_POST['fName']);
    $lName = mysqli_real_escape_string($mysqli, $_POST['lName']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_BCRYPT));
    
    /* Duplicate Check */
    $duplicateCheckQuery = $mysqli -> query("SELECT * FROM users WHERE email = '$email'") or die($mysqli->error());
    if ($duplicateCheckQuery -> num_rows > 0) {
        $_SESSION['message'] = 'E-mail already exists!';
        header("Location: error.php");
    }
    else {
        $registerUserQuery = "INSERT INTO users (firstName, lastName, email, password)"."VALUES('$fName', '$lName', '$email', '$password')";
        
        if ($mysqli -> query($registerUserQuery)) {
            $_SESSION['logged_in'] = true;
            header("Location: index.php");
        }
        else {
            $_SESSION['message'] = 'Unable to register!';
            header("Location: error.php");
        }
    }
?>