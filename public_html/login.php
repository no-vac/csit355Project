<?php $thisPage = 'Login'; ?>

<html>
    <?php require '../components/header.php'; ?>
    <body>
        <?php require '../components/nav.php'; ?>
        <div id="loginForm" class="container-fluid">
            <div class="jumbotron m-4">
                <form class="text-center">
                    <h2 class="h3 mb-3">Login</h2>
                    <div class="mb-3">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    </div>
                                        
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>