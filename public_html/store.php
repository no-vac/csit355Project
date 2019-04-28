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

                <!-- Tab Content Generation (PUT THIS IN A FOR LOOP) -->
                <div class="tab-content" id="myTabContent">
                    <?php 
                        /* CRISTIAN'S ATTEMPT AT A FOR LOOP
                        for ($x = 0; $x < count($categories); $x++) {
                            $result = $mysqli -> query($categoryQueries[$x]);
                            echo "<div class=\"tab-pane fade show active\" id=\"".$categoryIds[$x]."\" role=\"tabpanel\" aria-labelledby=\"".$categoryIdNavs[$x]."\">";
                            while($row = $result -> fetch_assoc()) {
                                $filepath = $row['pImage'];
                                $title = $row['pName'];
                                include 'components/imageCard.php';
                        }   
                        echo "</div>";
                        }*/
                        
                        $result = $mysqli -> query($categoryQuery);
                        echo "<div class=\"tab-pane fade show active\" id=\"tab-all\" role=\"tabpanel\" aria-labelledby=\"tab-all-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            include 'components/imageCard.php';
                        }
                        echo "</div>";

                        $result = $mysqli -> query($staticCategoryQuery);
                        echo "<div class=\"tab-pane fade\" id=\"tab-static\" role=\"tabpanel\" aria-labelledby=\"tab-static-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            include 'components/imageCard.php';
                        }
                        echo "</div>";

                        $result = $mysqli -> query($liveCategoryQuery);
                        echo "<div class=\"tab-pane fade\" id=\"tab-live\" role=\"tabpanel\" aria-labelledby=\"tab-live-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            include 'components/imageCard.php';
                        }
                        echo "</div>";

                        $result = $mysqli -> query($multiScreenCategoryQuery);
                        echo "<div class=\"tab-pane fade\" id=\"tab-multi-screen\" role=\"tabpanel\" aria-labelledby=\"tab-multi-screen-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            include 'components/imageCard.php';
                        }
                        echo "</div>";

                        $result = $mysqli -> query($interactiveCategoryQuery);
                        echo "<div class=\"tab-pane fade\" id=\"tab-interactive\" role=\"tabpanel\" aria-labelledby=\"tab-interactive-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            include 'components/imageCard.php';
                        }
                        echo "</div>";

                        $result = $mysqli -> query($hybridCategoryQuery);
                        echo "<div class=\"tab-pane fade\" id=\"tab-hybrid\" role=\"tabpanel\" aria-labelledby=\"tab-hybrid-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            include 'components/imageCard.php';
                        }
                        echo "</div>";
                    ?>
                </div>
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>