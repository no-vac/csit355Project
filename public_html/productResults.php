<?php $thisPage = 'ProductResults'; ?>

<html>
    <?php require 'components/header.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Results 📜</h2>
                <?php
                    $searchItem = mysqli_real_escape_string($mysqli, $_POST['search']);
                    $searchQuery = "SELECT * FROM products WHERE pName LIKE '%$searchItem%'";
                    $searchResult = mysqli_query($mysqli, $searchQuery);

                    if(mysqli_num_rows($searchResult) != 0) {
                        echo "<div class=\"productResults\">";
                        while($searchRow = $searchResult -> fetch_assoc()) {
                            $productId = $searchRow['id'];
                            $filepath = $searchRow['pImage'];
                            $title = $searchRow['pName'];
                            $minOrder = $searchRow['minOrder'];
                            $price = $searchRow['price'];
                            $stock = $searchRow['stock'];
                            if($stock > 0) {
                                include 'components/imageCard.php';
                            }else if($access=='A'){
                                include 'components/imageCard.php';
                            }
                        }   
                        echo "</div>";
                    } else {
                        echo "<div class=\"mt-4 alert alert-info\" role=\"alert\">No products returned!</div>";
                    }
                ?>
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>