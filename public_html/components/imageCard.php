<?php
    echo "
        <div class=\"product text-center\" style=\"width:auto\">
            <form class=\"product\" action=\"../controllers/addToCart.php\" method=\"post\" style=\"width:200px\">
                <input type=\"hidden\" name=\"productId\" value=\"$productId\">
                <img class=\"border border-dark rounded m-2\" src=\"$filepath\" width=\"200\" height=\"200\" />
                <h4>$title</h4>";
                if ($access != null) { 
                    echo "
                    <button name=\"addToCartBtn\" class=\"btn btn-sm btn-primary \" type=\"submit\">Add to Cart</button>
                    <input class=\"prod-quantity align-middle\" name=\"quantity\" type=\"number\" id=\"1\" value=\"$minOrder\" min=\"$minOrder\" max=\"99\"/>
                    ";
                }
    echo "</form></div>";
?>