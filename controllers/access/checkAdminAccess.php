<?php 
    if ($access != 'A') {
        $_SESSION['message'] = 'Invalid Access!';
        header("Location: ../public_html/error.php");
    }
?>