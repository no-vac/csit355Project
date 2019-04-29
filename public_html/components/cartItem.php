<?php
    echo "
        <div class=\"col-4 product-box\">
            <form class=\"justify-content-around add-to-cart-form\" action=\"../controllers/removeFromCart.php\" method=\"post\">
                <input type=\"hidden\" name=\"productId\" value=\"$productId\">
                <img class=\"border border-dark rounded m-2\" src=\"$filepath\" width=\"200\" height=\"200\" />
                <span>$title</span>
                <button name=\"removeFromCart\" class=\"btn btn-sm btn-primary float-right\" type=\"submit\">Remove From Cart</button>
            </form>
        </div>";
?>