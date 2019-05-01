<?php
    require '../server/dbConnection.php';

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $findEmailQuery = $mysqli -> query("SELECT * FROM users WHERE email = '$email'");

    if ($findEmailQuery -> num_rows == 0) {
        $_SESSION['message'] = 'E-mail does not exist!';
        header("Location: error.php");
    }
    else {
        $row = mysqli_fetch_assoc($findEmailQuery);

        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['fName'] = $row['fName'];
            $_SESSION['lName'] = $row['lName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['access'] = $row['access'];
            $_SESSION['logged_in'] = true;

            if ($_SESSION['logged_in'] == true) {
                header("Location: profile.php");
                exit();
            }
            else {
                ($_SESSION['message'] = "Wrong password, try again!");
                header("Location: error.php");
            } 
        }
        else {
            $_SESSION['message'] = "Wrong password, try again!";
            header("Location: error.php");
        }
    }
?>
