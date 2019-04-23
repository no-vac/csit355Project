<?php $thisPage = 'Store'; ?>

<html>
    <?php require '../components/header.php'; ?>
    <body>
        <?php require '../components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Store 🛍️</h2>
                <?php
                /* ADD PRODUCTS TO TABLE
                    $mysqli -> set_charset("utf8");
                    $productsQuery = 'SELECT * FROM products';

                    $counter = 0;
                    $value = 0;

                    echo '
                    <div class="table-responsive-sm table-responsive-md">
                        <table class="table table-bordered table-hover" id="productsTable">
                            <tr value='.$value.'>';

                    $value++;
                    if($result = $mysqli -> query($productsQuery)) {
                        while ($product = $result -> fetch_assoc()) {
                            $id = $product["id"];
                            $pName = $product["pName"];
                            $quantity = $product["quantity"];
                            $pDescription = $product["pDescription"];
                            $category = $product["category"];
                            $price = $product["price"];
                            $tax = $product["tax"];
                            $productStatus = $product["productStatus"];
                            $minOrder = $product["minOrder"];
                            
                            if($counter == 3) {
                                echo '</tr>';
                                echo '<tr value='.$value.'>';
                                $counter = 0;
                            }

                            echo '<td id=\'product'.$value.'\'">'.$pName.'</td>';

                            $value++;
                            $counter++;
                        }
                    }
                    
                    if($counter != 3) { echo '</tr>'; }

                    echo '
                        </table>
                    </div>';
                */
                ?>
            </div>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>