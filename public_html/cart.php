<?php
                    // read items in the cart
                    $cookie = isset($_COOKIE['cart_items_cookie']) ? $_COOKIE['cart_items_cookie'] : "";
                    $cookie = stripslashes($cookie);
                    $saved_cart_items = json_decode($cookie, true);
                    
                    // to prevent null value
                    $saved_cart_items=$saved_cart_items==null ? array() : $saved_cart_items;

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
                // echo $saved_cart_items;
                
                foreach($saved_cart_items as $productId) {
                    $result = $mysqli -> query(queryProduct($productId));
                    echo "<div class=\"tab-pane fade show active\" id=\"tab-all\" role=\"tabpanel\" aria-labelledby=\"tab-all-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $productId = $row['id'];
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            include 'components/imageCard.php';
                        }
                        echo "</div>";
                }
                ?>

            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>