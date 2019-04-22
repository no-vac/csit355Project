<?php
    require '../components/header.php';
    session_start();
?>
 
<html>
    <body>
        <?php require '../components/nav.php'; ?>
        <div class="container m-4">
            <h1>Error</h1>
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>