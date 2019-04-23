<nav id="pws-nav" class="navbar navbar-expand-lg navbar-light" style="background:#ccced1;">
    <a class="navbar-brand">📱 Wallpapers Store</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Administrator = A, Webmaster = W, Shop Manager = M, Customer = C -->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li><a class="nav-item nav-link btn" href="index.php">Home</span></a></li>
            <li><a class="nav-item nav-link btn" href="about.php">About</span></a></li>
            <li><a class="nav-item nav-link btn" href="store.php">Store</span></a></li>

            <?php
                if ($access == 'A' || $access == 'W' || $access == 'M' || $access == 'C'){
                    echo "<li><a class=\"nav-item nav-link btn\" href=\"../controllers/logoutController.php\">Logout</a></li>";
                } else if ($access != 'A' || $access != 'W' || $access != 'M' || $access != 'C') {
                    echo '<li><a class="nav-item nav-link btn" href="login.php">Login</span></a></li>';
                    echo '<li><a class="nav-item nav-link btn" href="register.php">Register</span></a></li>';
                }
            ?>
        </ul>

        <ul class="navbar-nav ml-auto">
            <?php if ($access == 'A'){echo "<li class=\"text-muted btn\">Admin Dashboard</li>";} ?>
            <?php if ($access == 'W'){echo "<li class=\"text-muted btn\">Webmaster Dashboard</li>";} ?>
            <?php if ($access == 'M'){echo "<li class=\"text-muted btn\">Shop Manager Dashboard</li>";} ?>
            <?php if ($access == 'C'){echo "<li class=\"text-muted btn\"><a class=\"nav-item nav-link\" href=\"cart.php\">🛒</a></li>";} ?>
        </ul>
    </div>
</nav>

<script>
// Get the container element
var btnContainer = document.getElementById("navbarNavAltMarkup");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("btn");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>