<?php $thisPage = 'Home'; ?>

<html>
    <?php require '../components/header.php'; ?>
    <body>
        <?php require '../components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4 text-center" style="background:url(../assets/light-brown-wood.jpg); background-position: center center">
                <h2>Welcome to the 📱 Wallpapers Store!</h2>
                <p>Here you'll find any and all premium mobile wallpapers!</p>
                <p>Whether you want it to move or stop, our wallpapers are personal for you!</p>

                <hr id="homePageDivider">

                <div><h2>Featured Products</h2></div>
                <div class="row">
                    <?php
                        echo
                        '<div class="col-4">
                            item-1
                        </div>
                        <div class="col-4">
                            item-2
                        </div>
                        <div class="col-4">
                            item-3
                        </div>'
                    ?>
                </div>
            </div>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>