<?php $thisPage = 'CompletedOrder'; ?>

<html>
    <?php require 'components/header.php'; 
        if (!$didPurchase) {
            header("Location: error.php");
        }
    ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container m-4">
            <img class="mb-2" src="../assets/confirmedOrder.png" alt="confirmedOrder" width="50">
            <h3>Thank you for purchasing! Go to your <a href="profile.php">profile</a> to see your order.</h3>
        </div>
        <?php require 'components/footer.php'; $didPurchase = false; ?>
    </body>
</html>