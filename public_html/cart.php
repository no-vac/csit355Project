<?php
$thisPage = 'Cart';

function queryProduct($id)
{
    $query = "SELECT * FROM products WHERE id=$id";
    return $query;
}
?>
<html>
<?php require 'components/header.php';
require '../controllers/access/checkUserAccess.php'; ?>

<body>
    <?php require 'components/nav.php'; ?>
    <div class="container-fluid">
        <div class="jumbotron m-4">
            <h2>Cart 🛒</h2>
            <?php
            if (count($cart)) {
                echo "<hr class=\"mb-2\">
                        <table style=\"width:100%\">
                        <tr>
                          <th><h3>Item</h3></th>
                          <th><h3>Quantity</h3></th> 
                          <th><h3>Price</h3></th>
                        </tr>";
                $subtotal = 0;
                $taxtotal = 0;
                $grandtotal = 0;
                foreach (array_column($cart, "productId") as $productId) {
                    $result = $mysqli->query(queryProduct($productId));
                    while ($row = $result->fetch_assoc()) {
                        $productId = $row['id'];
                        $filepath = $row['pImage'];
                        $title = $row['pName'];
                        $minOrder = $row['minOrder'];
                        $key = array_search($productId, array_column($cart, "productId"));
                        $quantity = $cart[$key]["quantity"];
                        $price = $cart[$key]["price"];
                        $tax = $row['tax'];
                        $description = $row['pDescription'];
                        echo "<tr>
                                    <td>";
                        include 'components/cartItem.php';
                        echo
                            "</td>
                                    <td><h5>$quantity x $$price</h5></td>
                                    <td><h5>$" . $quantity * $price . "</h5></td>
                                  </tr>";
                        $_total = $quantity * $price;
                        $taxammt = $tax * $quantity;
                        $taxtotal += $taxammt;
                        $subtotal += $_total;
                        
                    }
                }
                $_SESSION['subtotal']= $subtotal;
                $_SESSION['taxammt']= $taxtotal;
                $_SESSION['grandtotal'] = $subtotal + $taxtotal;
                echo "</table>
                        <h3 class=\"mt-4\">Subtotal = $$subtotal</h3>";

                echo "<hr class=\"mb-2\"><h2>Order Summary</h2>
                        <table style=\"width:20%\">
                            <tr>
                                <td>Item(s) Subtotal:</td>
                                <td>$$subtotal</td>
                            </tr>
                            <tr>
                                <td>Estimated tax to be:</td>
                                <td>$" . round($taxtotal, 2) . "
                            </tr>
                            <tr>
                                <td><strong>Grand Total:</strong></td>
                                <td><strong>$" . round($_SESSION['grandtotal'], 2) . "</strong></td>
                        </table>";

                include 'components/checkout.php';
            } else {
                echo "<div class=\"mt-4 alert alert-info\" role=\"alert\">Your Cart is empty!</div>";
            }
            ?>

        </div>
        <script>
            (function() {
                $('.dropdown-menu').find('form').click(function(e) {
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