<?php
      echo "
        <form class=\"text-nowrap\" action=\"../controllers/removeFromCart.php\" method=\"post\" style=\"width:400px\">
            <input type=\"hidden\" name=\"productId\" value=\"$productId\">
            <div class=\"row\">
              <div class=\"col col-sm-3\">
                <img class=\"border border-dark rounded m-2\" src=\"$filepath\" width=\"50\" height=\"50\" /></div>
                <div class=\"col\">
                  <div class=\"row\">
                    <h6>$title</h6>
                  </div>
                  <div class=\"row\">
                    $description
                  </div>
              </div>
            </div>
            
            <button name=\"removeFromCart\" class=\"btn btn-sm btn-danger\" type=\"submit\">Remove</button>
        </form>";
?>
