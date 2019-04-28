<?php
    echo "
        <div class=\"col-4 product-box\" width=\"200\" height=\"200\" >
            <form class=\"justify-content-around\" action=\"addToCart.php\" method=\"post\">
                <input type=\"hidden\" value=\"$productId\">
                <img class=\"border border-dark rounded m-2\" src=\"$filepath\" width=\"200\" height=\"200\" />
                <span>$title</span>
                <button name=\"addToCartBtn\" class=\"btn btn-sm btn-primary float-right\" type=\"submit\">Add to Cart</button>
            </form>
        </div>";
?>