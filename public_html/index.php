<?php $thisPage = 'Home'; ?>

<html>
    <?php require 'components/header.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4 text-center" style="background:url(../assets/light-brown-wood.jpg); background-position: center center">
                <div>
                    <h2>Welcome to the 📱 Wallpapers Store!</h2>
                    <p>Here you'll find any and all premium mobile wallpapers!</p>
                    <p>Whether you want it to move or stop, our wallpapers are personal for you!</p>
                </div>

                <hr id="homePageDivider">

                <div>
                    <h2>About Us 🖼</h2>
                    <p>At our business, we develop websites for your everyday people for affordable pricing.
                    We have a simple business model with no scams, and are upfront about what we charge.
                    We are especially known for our cheap eCommerce websites that are high in quality.
                    Some practices we hold is to hold quality over quantity, staying transparent with our customers,
                    and most of all, keeping security at the forefront of our products.</p>
                    <p>To learn more about us, click <a href="about.php">here</a>.</p>
                </div>

                <hr id="homePageDivider">

                <div><h2>Featured Products</h2></div>
                <div class="row">
                    <?php
                        /* Prevent duplicates */
                        $randNums = array();

                        for($x = 0; $x < 3; $x++) {
                            $randId = rand(1, 25);
                            array_push($randNums, $randId);
                            $randomProductQuery = "SELECT * FROM products WHERE id='$randId'";
                            $result = $mysqli -> query($randomProductQuery);
                            $row = $result -> fetch_assoc();
                            $productId = $row['id'];
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            include 'components/imageCard.php';
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>