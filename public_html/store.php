<?php $thisPage = 'Store'; ?>

<html>
    <?php require 'components/header.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Store 🛍️</h2>
                <!-- Creating arrays that'll be used 'Tab Content Generation' -->
                <?php 
                    $categories = array("All", "Static", "Live", "Multi-Screen", "Interactive", "Hybrid");
                    $categoryIds = array("tab-all", "tab-static", "tab-live", "tab-multi-screen", "tab-interactive", "tab-hybrid");
                    $categoryIdNavs = array("tab-all-nav", "tab-static-nav", "tab-live-nav", "tab-multi-screen-nav", "tab-interactive-nav", "tab-hybrid-nav");
 
                    $categoryQuery = "SELECT * FROM products";
                    $staticCategoryQuery = "SELECT * FROM products WHERE category='Static'";
                    $liveCategoryQuery = "SELECT * FROM products WHERE category='Live'";
                    $multiScreenCategoryQuery = "SELECT * FROM products WHERE category='Multi-Screen'";
                    $interactiveCategoryQuery = "SELECT * FROM products WHERE category='Interactive'";
                    $hybridCategoryQuery = "SELECT * FROM products WHERE category='Hybrid'";                   

                    $categoryQueries = array($categoryQuery, $staticCategoryQuery, $liveCategoryQuery, $multiScreenCategoryQuery, $interactiveCategoryQuery, $hybridCategoryQuery);                    
                ?>

                <!-- Creating the Tabs -->
                <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                    <li class="nav-item">
                            <a class="nav-link active" id="tab-all-nav" data-toggle="tab" href="#tab-all" role="tab" aria-controls="tab-all" aria-selected="true">All</a>
                    </li>
                    <?php 
                        for($x = 1; $x < count($categories); $x++) {
                            echo "
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" id=\"$categoryIdNavs[$x]\" data-toggle=\"tab\" href=\"#$categoryIds[$x]\" role=\"tab\" aria-controls=\"$categoryIds[$x]\" aria-selected=\"true\">$categories[$x]</a>
                            </li>";
                        }
                    ?>
                </ul>

                <!-- Tab Content Generation -->
                <div class="tab-content" id="myTabContent">
                    <?php 
                        for ($x = 0; $x < count($categories); $x++) {
                            $result = $mysqli -> query($categoryQueries[$x]);
                            if($x==0){
                                echo "<div class=\"tab-pane fade show active \" id=\"".$categoryIds[$x]."\" role=\"tabpanel\" aria-labelledby=\"".$categoryIdNavs[$x]."\">";
                            }else{
                                echo "<div class=\"tab-pane fade \" id=\"".$categoryIds[$x]."\" role=\"tabpanel\" aria-labelledby=\"".$categoryIdNavs[$x]."\">";
                            }
                            echo "<div class=\"row justify-content-center\">";
                            while($row = $result -> fetch_assoc()) {
                                $productId = $row['id'];
                                $filepath = $row['pImage'];
                                $title = $row['pName'];
                                $minOrder = $row['minOrder'];
                                $price = $row['price'];
                                $stock = $row['stock'];
                                if($stock>0){
                                    include 'components/imageCard.php';
                                }
                            }   
                            echo "</div></div>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>