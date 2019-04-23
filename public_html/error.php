<?php
    $thisPage = "Error";
    require '../components/header.php';
?>
 
<html>
    <body>
        <?php require '../components/nav.php'; ?>
        <div class="container m-4">
            <h1>Error</h1>
            <h4 style="font-weight:normal;"><?php echo $_SESSION['message']; ?></h4>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>