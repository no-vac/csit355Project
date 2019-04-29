<?php
                    include "../controllers/getCart.php";
                    $cart= getCart();

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
                }else{
                    echo "Your Cart is Empty";
                }
                ?>

            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>