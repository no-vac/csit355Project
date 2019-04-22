<?php $thisPage = 'Register'; 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['registerBtn'])) {
            require '../controllers/registerController.php';
        }
    }
?>

<html>
    <?php require '../components/header.php'; ?>
    <body>
        <?php require '../components/nav.php'; ?>
        <div id="registerForm" class="container-fluid">
            <div class="jumbotron m-4">
                <form class="text-center" action="register.php" method="post">
                    <h2 class="h3 mb-3">Register</h2>

                    <div class="mb-3">
                        <label for="fName" class="sr-only">First Name</label>
                        <input name="fName" type="name" id="registerFName" class="form-control" placeholder="First name" required autofocus>
                    </div>
                    
                    <div class="mb-3">
                        <label for="lName" class="sr-only">First Name</label>
                        <input name="lName" type="name" id="registerLName" class="form-control" placeholder="Last name" required>
                    </div>

                    <div class="mb-3">
                        <label for="registerEmail" class="sr-only">Email address</label>
                        <input name="email" type="email" id="registerEmail" class="form-control" placeholder="Email address" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input name="password" type="password" id="registerPassword" class="form-control" placeholder="Password" required>
                    </div>

                    <button name="registerBtn" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                </form>
            </div>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>