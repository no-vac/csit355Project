<?php
include "../controllers/getCart.php";
$cart = getCart();
?>

<nav id="pws-nav" class="navbar navbar-expand-lg navbar-light" style="background:#ccced1;">
    <a class="navbar-brand">📱 Wallpapers Store</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Administrator = A, Webmaster = W, Shop Manager = M, Customer = C -->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li><a class="nav-item nav-link btn" href="index.php">Home</a></li>
            <li><a class="nav-item nav-link btn" href="about.php">About</a></li>
            <li><a class="nav-item nav-link btn" href="store.php">Store</a></li>
            
            <?php
                if ($access == null) {
                    echo '<li><a class="nav-item nav-link btn" href="login.php">Login</a></li>';
                    echo '<li><a class="nav-item nav-link btn" href="register.php">Register</a></li>';
                }
            ?>
        </ul>
        
        <?php
            echo '<ul class="navbar-nav ml-auto">';
            if(count($cart) > 0) {
                $cartcount = "<span class=\"badge badge-dark\">".count($cart)."</span>";
            } else {
                $cartcount = "";
            }
            if ($access == 'A' || $access == 'W' || $access == 'M' || $access == 'C'){echo "<li><a class=\"nav-item nav-link btn\" href=\"cart.php\">🛒".$cartcount."</a></li>";}
            if ($access == 'A'){echo "<li><a class=\"nav-item nav-link btn\" href=\"profile.php\">Profile</a></li>";}
            if ($access == 'W'){echo "<li><a class=\"nav-item nav-link btn\" href=\"profile.php\">Profile</a></li>";}
            if ($access == 'M'){echo "<li><a class=\"nav-item nav-link btn\" href=\"profile.php\">Profile</a></li>";}
            if ($access == 'C'){echo "<li><a class=\"nav-item nav-link btn\" href=\"profile.php\">Profile</a></li>";}
            if ($access == 'A' || $access == 'W' || $access == 'M' || $access == 'C'){echo "<li><a class=\"nav-item nav-link btn\" href=\"../controllers/logoutController.php\">Logout</a></li>";}
            echo '</ul>';
        ?>
    </div>
</nav>

<?php require '../controllers/errorHandler.php';?>

<script>
var btnContainer = document.getElementById("navbarNavAltMarkup");
var btns = btnContainer.getElementsByClassName("btn");

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>