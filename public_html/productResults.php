<?php $thisPage = 'ProductResults'; ?>

<html>
    <?php require 'components/header.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>

        <?php
            $searchItem = mysqli_real_escape_string($mysqli, $_POST['search']);
            $searchQuery = $mysqli -> query("SELECT pName FROM products WHERE pName = '$searchItem'");

            $searchResult = $mysqli -> query($searchQuery);
            echo "<div>";
            while($searchRow = $searchResult -> fetch_assoc()) {
                $productId = $searchRow['id'];
                $filepath = $searchRow['pImage'];
                $title = $searchRow['pName'];
                include 'components/imageCard.php';
            }   
            echo "</div>";
        ?>
        
        <?php require 'components/footer.php'; ?>
    </body>
</html>