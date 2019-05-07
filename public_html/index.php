<?php $thisPage = 'Home'; ?>
<?php
function genrand($min,$max){
  $randNums = range(6, 10);
  shuffle($randNums);
  array_slice($randNums, 0, 2);
  return $randNums;
}
?>
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
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 100%">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <?php
                            // Generate 3 unique IDs
                            $randNums = range(11, 15);
                            shuffle($randNums);
                            array_slice($randNums, 0, 2);

                            // display 3 random products
                            for($x = 0; $x < 4; $x++) {
                                $randomProductQuery = "SELECT * FROM products WHERE id='$randNums[$x]'";
                                $result = $mysqli -> query($randomProductQuery);
                                $row = $result -> fetch_assoc();
                                $productId = $row['id'];
                                $filepath = $row['pImage'];
                                $productId = $row['id'];
                                $title = $row['pName'];
                                include 'components/imageCard.php';
                            }
                        ?>
                        </div>
                        <div class="carousel-item">
                            <?php
                                // Generate 3 unique IDs
                                $randNums = range(1, 5);
                                shuffle($randNums);
                                array_slice($randNums, 0, 2);

                                // display 3 random products
                                for($x = 0; $x < 4; $x++) {
                                    $randomProductQuery = "SELECT * FROM products WHERE id='$randNums[$x]'";
                                    $result = $mysqli -> query($randomProductQuery);
                                    $row = $result -> fetch_assoc();
                                    $productId = $row['id'];
                                    $filepath = $row['pImage'];
                                    $productId = $row['id'];
                                    $title = $row['pName'];
                                    include 'components/imageCard.php';
                                }
                          ?>
                        </div>
                        <div class="carousel-item">
                            <?php
                              // Generate 3 unique IDs
                                $randNums = range(6, 10);
                                shuffle($randNums);
                                array_slice($randNums, 0, 2);

                                // display 3 random products
                                for($x = 0; $x < 4; $x++) {
                                    $randomProductQuery = "SELECT * FROM products WHERE id='$randNums[$x]'";
                                    $result = $mysqli -> query($randomProductQuery);
                                    $row = $result -> fetch_assoc();
                                    $productId = $row['id'];
                                    $filepath = $row['pImage'];
                                    $productId = $row['id'];
                                    $title = $row['pName'];
                                    include 'components/imageCard.php';
                                }
                          ?>
                        </div>
                        <div class="carousel-item">
                            <?php
                              // Generate 3 unique IDs
                                $randNums = range(16, 20);
                                shuffle($randNums);
                                array_slice($randNums, 0, 2);

                                // display 3 random products
                                for($x = 0; $x < 4; $x++) {
                                    $randomProductQuery = "SELECT * FROM products WHERE id='$randNums[$x]'";
                                    $result = $mysqli -> query($randomProductQuery);
                                    $row = $result -> fetch_assoc();
                                    $productId = $row['id'];
                                    $filepath = $row['pImage'];
                                    $productId = $row['id'];
                                    $title = $row['pName'];
                                    include 'components/imageCard.php';
                                }
                          ?>
                        </div>
                        <div class="carousel-item">
                            <?php
                              // Generate 3 unique IDs
                                $randNums = range(21, 25);
                                shuffle($randNums);
                                array_slice($randNums, 0, 2);

                                // display 3 random products
                                for($x = 0; $x < 4; $x++) {
                                    $randomProductQuery = "SELECT * FROM products WHERE id='$randNums[$x]'";
                                    $result = $mysqli -> query($randomProductQuery);
                                    $row = $result -> fetch_assoc();
                                    $productId = $row['id'];
                                    $filepath = $row['pImage'];
                                    $productId = $row['id'];
                                    $title = $row['pName'];
                                    include 'components/imageCard.php';
                                }
                          ?>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>