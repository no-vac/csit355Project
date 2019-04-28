<?php $thisPage = 'Cart'; ?>

<html>
    <?php require 'components/header.php'; require '../controllers/access/checkUserAccess.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Cart 🛒</h2>
                <?php
                    $isCart = false;
                    if ($isCart) {
                        echo '<h4 style="font-weight:normal;">Items in cart!</h4>';
                        include 'components/checkout.php';
                    } else {
                        echo '<h4 style="font-weight:normal;">No items in cart!</h4>';
                    }
                ?>
                <script>
                (function() {
                    $('.dropdown-menu').find('form').click(function (e) {
                        e.stopPropagation();
                    });
                    'use strict';
                    window.addEventListener('load', function() {
                        var forms = document.getElementsByClassName('needs-validation');
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }  
                                form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
            </script>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>