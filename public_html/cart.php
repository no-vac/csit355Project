<?php
$thisPage = 'Cart'; 

function queryProduct($id) {
    $query = "SELECT * FROM products WHERE id=$id";
    return $query;
}
function getquant($id) {}
?>

<html>
    <?php require 'components/header.php'; require '../controllers/access/checkUserAccess.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Cart 🛒</h2>
                <?php
                    if(count($cart)){
                        foreach(array_column($cart, "productId") as $productId) {
                            $result = $mysqli -> query(queryProduct($productId));
                            echo "<div class=\"product\"><div class=\"store\">";
                                while($row = $result -> fetch_assoc()){
                                    $productId = $row['id'];
                                    $filepath = $row['pImage'];
                                    $title = $row['pName'];
                                    $key=array_search($productId, array_column($cart, "productId"));
                                    $quantity=$cart[$key]["quantity"];
                                    include 'components/cartItem.php';
                                }
                                echo "</div></div>";
                        }
                    include 'components/checkout.php';
                } else {
                    echo "<div class=\"mt-4 alert alert-info\" role=\"alert\">Your Cart is empty!</div>";
                }
                ?>

            </div>
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