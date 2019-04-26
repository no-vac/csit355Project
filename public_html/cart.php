<?php $thisPage = 'Cart'; ?>

<html>
    <?php require 'components/header.php'; require '../controllers/access/checkUserAccess.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Cart 🛒</h2>
                <?php
                    /* ONCE YOU ADD PRODUCTS TO CART ON DATABASE
                    $pullCartQuery = 'SELECT * FROM products WHERE productStatus = \'Cart\'';
                    */
                ?>
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>