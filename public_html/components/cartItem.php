<?php
      echo "

            <form class=\"text-center\" action=\"../controllers/removeFromCart.php\" method=\"post\" style=\"width:200px\">
                <input type=\"hidden\" name=\"productId\" value=\"$productId\">
                <img class=\"border border-dark rounded m-2\" src=\"$filepath\" width=\"200\" height=\"200\" />
                <h4>$title</h4>
                <button name=\"removeFromCart\" class=\"btn btn-sm btn-primary\" type=\"submit\">Remove From Cart</button>
            </form>";
?>