<?php $thisPage = 'Store'; ?>

<html>
    <?php require '../components/header.php'; ?>
    <body>
        <?php require '../components/nav.php'; ?>
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

                <!-- Creating the Tabs (PUT THIS IN A FOR LOOP) -->
                <ul class="nav nav-tabs text-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-all-nav" data-toggle="tab" href="#tab-all" role="tab" aria-controls="tab-all" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-static-nav" data-toggle="tab" href="#tab-static" role="tab" aria-controls="tab-static" aria-selected="false">Static</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-live-nav" data-toggle="tab" href="#tab-live" role="tab" aria-controls="tab-live" aria-selected="false">Live</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-multi-screen-nav" data-toggle="tab" href="#tab-multi-screen" role="tab" aria-controls="tab-multi-screen" aria-selected="false">Multi-Screen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-interactive-nav" data-toggle="tab" href="#tab-interactive" role="tab" aria-controls="tab-interactive" aria-selected="false">Interactive</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-hybrid-nav" data-toggle="tab" href="#tab-hybrid" role="tab" aria-controls="tab-hybrid" aria-selected="false">Hybrid</a>
                    </li>
                </ul>

                <!-- Tab Content Generation (PUT THIS IN A FOR LOOP) -->
                <div class="tab-content" id="myTabContent">
                    <?php 
                        $result = $mysqli -> query($categoryQuery);
                        echo "<div class=\"tab-pane fade show active\" id=\"tab-all\" role=\"tabpanel\" aria-labelledby=\"tab-all-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            echo "
                            <div>
                                <img class=\"m-2\" src=\"$filepath\" width=\"175\" height=\"200\" />
                                <p>$title</p>
                            </div>";
                        }
                        echo "</div>";

                        $result = $mysqli -> query($staticCategoryQuery);
                        echo "<div class=\"tab-pane fade show active\" id=\"tab-static\" role=\"tabpanel\" aria-labelledby=\"tab-static-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            echo "
                            <div>
                                <img class=\"m-2\" src=\"$filepath\" width=\"175\" height=\"200\" />
                                <p>$title</p>
                            </div>";
                        }
                        echo "</div>";

                        $result = $mysqli -> query($liveCategoryQuery);
                        echo "<div class=\"tab-pane fade show active\" id=\"tab-live\" role=\"tabpanel\" aria-labelledby=\"tab-live-nav\">";
                        while($row = $result -> fetch_assoc()){
                            $filepath = $row['pImage'];
                            $title = $row['pName'];
                            echo "
                            <div>
                                <img class=\"m-2\" src=\"$filepath\" width=\"175\" height=\"200\" />
                                <p>$title</p>
                            </div>";
                        }
                        echo "</div>";
                    ?>
                </div>
            </div>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>