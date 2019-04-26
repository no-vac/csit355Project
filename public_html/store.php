<?php $thisPage = 'Store'; ?>

<html>
    <?php require '../components/header.php'; ?>
    <body>
        <?php require '../components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Store 🛍️</h2>
                <?php 
                    /* get all queries here in a loop */
                    $sql = "SELECT pImage FROM products WHERE id='2'";
                    $result = $mysqli -> query($sql);
                    $row = $result -> fetch_assoc();
    
                    $filepath = $row['pImage'];
                    $categories = array("All", "Static", "Live", "Multi-Screen", "Interactive", "Hybrid");
                    $categoryIds = array("tab-all", "tab-static", "tab-live", "tab-multi-screen", "tab-interactive", "tab-hybrid");
                    $categoryIdNavs = array("tab-all-nav", "tab-static-nav", "tab-live-nav", "tab-multi-screen-nav", "tab-interactive-nav", "tab-hybrid-nav");
                    $categoryQueries = array("All", "Static", "Live", "Multi-Screen", "Interactive", "Hybrid");                    
                ?>
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

                <div class="tab-content" id="myTabContent">
                    <?php 
                        echo "<div class=\"tab-pane fade show active\" id=\"tab-all\" role=\"tabpanel\" aria-labelledby=\"tab-all-nav\">$categoryQueries[0]</div>";
                        for ($x = 1; $x < count($categories); $x++) {
                            echo "<div class=\"tab-pane fade\" id=\"$categoryIds[$x]\" role=\"tabpanel\" aria-labelledby=\"$categoryIdNavs[$x]\">$categoryQueries[$x]</div>";
                        }
                    ?>
                </div>

                <?php 
                    // generate all images here
                ?>
                <img src="<?php echo $filepath; ?>" width="175" height="200" />

                <?php
                /*
                    $mysqli -> set_charset("utf8");
                    $productsQuery = 'SELECT * FROM products';

                    $counter = 0;
                    $value = 0;

                    echo '
                    <div class="table-responsive-sm table-responsive-md">
                        <table class="table table-bordered table-hover" id="productsTable">
                            <tr value='.$value.'>';

                    $value++;
                    if($result = $mysqli -> query($productsQuery)) {
                        while ($product = $result -> fetch_assoc()) {
                            $id = $product["id"];
                            $pName = $product["pName"];
                            $quantity = $product["quantity"];
                            $pDescription = $product["pDescription"];
                            $category = $product["category"];
                            $price = $product["price"];
                            $tax = $product["tax"];
                            $productStatus = $product["productStatus"];
                            $minOrder = $product["minOrder"];
                            
                            if($counter == 3) {
                                echo '</tr>';
                                echo '<tr value='.$value.'>';
                                $counter = 0;
                            }

                            echo '<td id=\'product'.$value.'\'">'.$pName.'</td>';

                            $value++;
                            $counter++;
                        }
                    }
                    
                    if($counter != 3) { echo '</tr>'; }

                    echo '
                        </table>
                    </div>';
                */
                ?>
            </div>
        </div>
        <?php require '../components/footer.php'; ?>
    </body>
</html>