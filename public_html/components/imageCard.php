<?php
    echo "
            <div class=\"product text-center\" style=\"width:auto\">
                <form class=\"product\" action=\"../controllers/addToCart.php\" method=\"post\" style=\"width:200px\">
                    <input type=\"hidden\" name=\"productId\" value=\"$productId\">
                    <img class=\"border border-dark rounded m-2\" src=\"$filepath\" width=\"200\" height=\"200\" />
                    <h4>$title</h4>
                    <div class=\"form-group\">
                      <select class=\"form-control\">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                      </select>
                    </div>
                    <button name=\"addToCartBtn\" class=\"btn btn-sm btn-primary\" type=\"submit\">Add to Cart</button>
                </form>
            </div>";
?>