<?php
      echo "
        <form class=\"text-nowrap\" action=\"../controllers/removeFromCart.php\" method=\"post\" style=\"width:100px\">
            <input type=\"hidden\" name=\"productId\" value=\"$productId\">
            <img class=\"border border-dark rounded m-2\" src=\"$filepath\" width=\"100\" height=\"100\" />
            <h6>Name: $title</h6>
            <h6>Quanity: $quantity</h6>
            <button name=\"removeFromCart\" class=\"btn btn-sm btn-danger\" type=\"submit\">Remove</button>
        </form>";
?>