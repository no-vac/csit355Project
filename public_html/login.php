<?php $thisPage = 'Login'; 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['loginBtn'])) {
            require '../controllers/loginController.php';
        }
    }
?>

<html>
    <?php require '../components/header.php'; ?>
    <body>
        <?php require '../components/nav.php'; ?>
        <div id="loginForm" class="container-fluid">
            <div class="jumbotron m-4">
                <form class="text-center" action="login.php" method="post">
                    <h2 class="h3 mb-3">Login</h2>
                    <div class="mb-3">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    </div>
                    
                    <div class="mb-3">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    </div>
                                        
                    <button name="loginBtn" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </form>
            </div>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>