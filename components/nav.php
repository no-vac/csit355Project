<?php require 'header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand">Phone Wallpapers Store</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li <?php if ($thisPage=="Home") echo "id=\"currentpage\""; ?>><a class="nav-item nav-link active" href="../index.php">Home</span></a></li>
        </ul>
    </div>
</nav>