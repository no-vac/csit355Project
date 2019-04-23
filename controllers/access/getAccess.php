<?php
    $isAccess = isset($_SESSION['access']);

    if ($isAccess == true) {
        $access = $_SESSION['access'];
    }
    else {
        $access = false;
    }
?>