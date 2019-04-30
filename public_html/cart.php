<?php
                    function queryProduct($id){
                        $query = "SELECT * FROM products WHERE id=$id";
                        return $query;
                    }
                ?>
<?php $thisPage = 'Cart'; ?>
<html>
    <?php require 'components/header.php'; require '../controllers/access/checkUserAccess.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Cart 🛒</h2>
                <?php
                if(isset($cart[0])){
                    foreach($cart as $productId) {
                        $result = $mysqli -> query(queryProduct($productId));
                        echo "<div class=\"tab-pane fade show active\" id=\"tab-all\" role=\"tabpanel\" aria-labelledby=\"tab-all-nav\">";
                            while($row = $result -> fetch_assoc()){
                                $productId = $row['id'];
                                $filepath = $row['pImage'];
                                $title = $row['pName'];
                                include 'components/cartItem.php';
                            }
                            echo "</div>";
                        }
                    include 'components/checkout.php';
                }else{
                    echo "<div class=\"alert alert-info\" role=\"alert\">
                    Your Cart is empty!
                  </div>";
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