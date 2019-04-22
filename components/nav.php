<nav id="pws-nav" class="navbar navbar-expand-lg navbar-light" style="background:#ccced1;">
    <a class="navbar-brand">📱 Wallpapers Store</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Administrator = A, Webmaster = W, Shop Manager = M, Customer = C -->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li <?php if ($thisPage=="Home") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="index.php">Home</span></a></li>
            <li <?php if ($thisPage=="About") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="about.php">About</span></a></li>
            <li <?php if ($thisPage=="Store") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="store.php">Store</span></a></li>
            <li <?php if ($thisPage=="Login") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="login.php">Login</span></a></li>
            <li <?php if ($thisPage=="Register") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link" href="register.php">Register</span></a></li>
        </ul>
    </div>
</nav>