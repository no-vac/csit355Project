<?php $thisPage = 'CompletedOrder'; ?>

<html>
    <?php require 'components/header.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container m-4">
            <img class="mb-2" src="../assets/confirmedOrder.png" alt="confirmedOrder" width="50">
            <h3>Thank you for purchasing! Go to your <a href="profile.php">profile</a> to see your order.</h3>
            <?php
            echo "<hr class=\"mb-2\"><h2>Order Summary</h2>
                        <table style=\"width:20%\">
                            <tr>
                                <td>Item(s) Subtotal:</td>
                                <td>$".$_SESSION['subtotal']."</td>
                            </tr>
                            <tr>
                                <td>Estimated tax to be:</td>
                                <td>$" . round($_SESSION['taxammt'], 2) . "
                            </tr>
                            <tr>
                                <td><strong>Grand Total:</strong></td>
                                <td><strong>$" . round($_SESSION['grandtotal'], 2) . "</strong></td>
                        </table>";
            ?>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>