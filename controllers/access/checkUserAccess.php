<?php 
    if (($access != 'A') && ($access != 'W') && ($access != 'M') && ($access != 'C')) {
        $_SESSION['message'] = 'Invalid Access!';
        header("Location: ../public_html/error.php");
    }
?>