<?php 
    if (($access != 'A') && ($access != 'W')) {
        $_SESSION['message'] = 'Invalid Access!';
        header("Location: ../public_html/error.php");
    }
?>