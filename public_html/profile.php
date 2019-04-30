<?php $thisPage = 'Profile'; ?>

<html>
    <?php require 'components/header.php'; require '../controllers/access/checkUserAccess.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['addProductBtn'])) {
                require '../controllers/product_controllers/addProductController.php';
            } else if (isset($_POST['editProductBtn'])) {
                require '../controllers/product_controllers/editProductController.php';
            } else if (isset($_POST['deleteProductBtn'])) {
                require '../controllers/product_controllers/deleteProductController.php';
            }
        }
    ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Profile 😎</h2>
                <?php
                    echo '<h4 style="font-weight:normal;">Full Name: <b>'.$_SESSION['fName'].' '.$_SESSION['lName'].'</b></h4>';
                    echo '<h4 style="font-weight:normal;">Email: <b>'.$_SESSION['email'].'</b></h4>';
                    
                    echo '<h4 style="font-weight:normal;">Orders:</h4>';

                    /* query to grab all orders */
                    // getting customer's ID
                    $fName = $_SESSION['fName'];
                    $customerIdSql = "SELECT id FROM `users` WHERE fName = '$fName'";
                    $customerIdResult = mysqli_query($mysqli, $customerIdSql);
                    $customerId = mysqli_fetch_assoc($customerIdResult)["id"];
                    
                    // querying all orders from customer ID
                    $orderSql  = "SELECT * FROM `orders` WHERE userId = '$customerId'";
                    $orderResultSize = mysqli_query($mysqli, $orderSql);
                    $orderRowSize = $orderResultSize -> fetch_assoc();
                    // $orderSize = sizeof($orderRowSize);

                    if($orderRowSize > 0) {
                        echo '<div class="table-responsive-sm table-responsive-md">
                                <table class="table table-bordered table-hover table-striped" id="ordersTable"> 
                                    <thead class="thead-dark">
                                        <tr class=\'ordersTableRow\'> 
                                            <th scope="col" class=\'ordersHeader\'>Product Name</th> 
                                            <th scope="col" class=\'ordersHeader\'>Quantity</th> 
                                            <th scope="col" class=\'ordersHeader\'>Description</th> 
                                            <th scope="col" class=\'ordersHeader\'>Category</th> 
                                            <th scope="col" class=\'ordersHeader\'>Price</th> 
                                            <th scope="col" class=\'ordersHeader\'>Order Status</th> 
                                            <th scope="col" class=\'ordersHeader\'>Order Time Stamp</th> 
                                            <th scope="col" class=\'ordersHeader\'>Image</th> 
                                        </tr>
                                    </thead>
                                <tbody>';
                        $value = 1;
                        $orderResult = mysqli_query($mysqli, $orderSql);
                        while ($orderRow = $orderResult -> fetch_assoc()) {
                            $pName_order = $orderRow["pName"];
                            $quantity_order = $orderRow["quantity"];
                            $pDescription_order = $orderRow["pDescription"];
                            $category_order = $orderRow["category"];
                            $price_order = $orderRow["price"];
                            $orderStatus_order = $orderRow["orderStatus"];
                            $orderTimeStamp_order = $orderRow["orderTimeStamp"];
                            $pImage_order = $orderRow["pImage"];

                            echo '<tr class=\'row'.$value.'\' value='.$value.'> 
                                    <td scope="row" class=\'pName'.$value.'\' value='.$value.'>'.$pName_order.'</td> 
                                    <td class=\'quantity'.$value.'\' value='.$value.'>'.$quantity_order.'</td> 
                                    <td class=\'pDescription'.$value.'\' value='.$value.'>'.$pDescription_order.'</td> 
                                    <td class=\'category'.$value.'\' value='.$value.'>'.$category_order.'</td>
                                    <td class=\'price'.$value.'\' value='.$value.'>'.$price_order.'</td> 
                                    <td class=\'orderStatus'.$value.'\' value='.$value.'>'.$orderStatus_order.'</td> 
                                    <td class=\'orderTimeStamp'.$value.'\' value='.$value.'>'.$orderTimeStamp_order.'</td> 
                                    <td class=\'pImage'.$value.'\' value='.$value.'><img class="border border-dark rounded m-2" src="'.$pImage_order.'" width="50" height="50" /></td>
                                </tr>';
                            $value++;
                        }
                        echo '</tbody></table></div>';
                    } else {
                        echo '<h5 style="font-weight:normal;">No orders present.</h5>';
                    }

                    // SHOP MANAGER ACCESS
                    if ($access == 'A' || $access == 'W' || $access == 'M') {
                        echo '<h4 style="font-weight:normal;">Products:</h4>';

                        /* add, delete, edit product */
                        echo '
                            <nav class="navbar-expand mb-2">
                                <button name="addProductBtn" class="btn btn-success my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#addProductModal">Add Product</button>
                                <button name="editProductBtn" class="btn btn-warning my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#editProductModal">Edit Product</button>
                                <button name="deleteProductBtn" class="btn btn-danger my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#deleteProductModal">Delete Product</button>
                            </nav>
                        ';
                        require 'components/modals.php';

                        /* query to grab all products */
                        $productSql  = "SELECT * FROM `products` ORDER BY `products`.`id` DESC";
                        $productResult = mysqli_query($mysqli, $productSql);
                        echo '<div class="table-responsive-sm table-responsive-md">
                                <table class="table table-bordered table-hover table-striped" id="productsTable"> 
                                    <thead class="thead-dark">
                                        <tr class=\'productsTableRow\'> 
                                            <th scope="col" class=\'productsHeader\'>Product Name</th> 
                                            <th scope="col" class=\'productsHeader\'>Quantity</th> 
                                            <th scope="col" class=\'productsHeader\'>Description</th> 
                                            <th scope="col" class=\'productsHeader\'>Category</th> 
                                            <th scope="col" class=\'productsHeader\'>Price</th> 
                                            <th scope="col" class=\'productsHeader\'>Order Status</th> 
                                            <th scope="col" class=\'productsHeader\'>Order Time Stamp</th> 
                                            <th scope="col" class=\'productsHeader\'>Image</th> 
                                        </tr>
                                    </thead>
                                <tbody>';
                        $value = 1;
                        while ($productRow = $productResult -> fetch_assoc()) {
                            $pName_product = $productRow["pName"];
                            $quantity_product = $productRow["quantity"];
                            $pDescription_product = $productRow["pDescription"];
                            $category_product = $productRow["category"];
                            $price_product = $productRow["price"];
                            $tax_product = $productRow["tax"];
                            $minOrder_product = $productRow["minOrder"];
                            $pImage_product = $productRow["pImage"];

                            echo '<tr class=\'row'.$value.'\' value='.$value.'> 
                                    <td scope="row" class=\'pName'.$value.'\' value='.$value.'>'.$pName_product.'</td> 
                                    <td class=\'quantity'.$value.'\' value='.$value.'>'.$quantity_product.'</td> 
                                    <td class=\'pDescription'.$value.'\' value='.$value.'>'.$pDescription_product.'</td> 
                                    <td class=\'category'.$value.'\' value='.$value.'>'.$category_product.'</td>
                                    <td class=\'price'.$value.'\' value='.$value.'>'.$price_product.'</td> 
                                    <td class=\'orderStatus'.$value.'\' value='.$value.'>'.$tax_product.'</td> 
                                    <td class=\'orderTimeStamp'.$value.'\' value='.$value.'>'.$minOrder_product.'</td> 
                                    <td class=\'pImage'.$value.'\' value='.$value.'><img class="border border-dark rounded m-2" src="'.$pImage_product.'" width="50" height="50" /></td>
                                </tr>';
                            $value++;
                        }
                        echo '</tbody></table></div>';
                    }
                    
                    // WEBMASTER ACCESS
                    if ($access == 'A' || $access == 'W') {}
                    
                    // ADMIN ACCESS
                    if ($access == 'A') {}
                ?>
            </div>
        </div>
        
        <?php require 'components/footer.php'; ?>
    </body>
</html>