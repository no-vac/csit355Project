<?php
      echo "
        <form class=\"text-nowrap\" action=\"../controllers/removeFromCart.php\" method=\"post\" style=\"width:100px\">
            <input type=\"hidden\" name=\"productId\" value=\"$productId\">
            <img class=\"border border-dark rounded m-2\" src=\"$filepath\" width=\"50\" height=\"50\" />
            <h6>$title</h6>
            <button name=\"removeFromCart\" class=\"btn btn-sm btn-danger\" type=\"submit\">Remove</button>
        </form>";
?>