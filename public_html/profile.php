<?php $thisPage = 'Profile'; ?>

<html>
    <?php require 'components/header.php'; require '../controllers/access/checkUserAccess.php'; ?>
    <body>
        <?php require 'components/nav.php'; ?>
        <div class="container-fluid">
            <div class="jumbotron m-4">
                <h2>Profile 😎</h2>
                <?php
                    echo '<h4 style="font-weight:normal;">Full Name: <b>'.$_SESSION['fName'].' '.$_SESSION['lName'].'</b></h4>';
                    echo '<h4 style="font-weight:normal;">Email: <b>'.$_SESSION['email'].'</b></h4>';
                    
                    if ($access == 'A' || $access == 'C') { // CUSTOMER ACCESS
                        $access == 'C' ? $accessOut = "<h4 style=\"font-weight:normal\">My Orders:</h4>" : $accessOut = "<h4 style=\"font-weight:normal\">Orders:</h4>"; 
                        echo $accessOut;

                        if ($access == 'A') {
                            echo '
                            <nav class="navbar-expand mb-2">
                                <button name="addOrderBtn" class="btn btn-success my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#addOrderModal">Add Order</button>
                                <button name="editOrderBtn" class="btn btn-warning my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#editOrderModal">Edit Order</button>
                                <button name="deleteOrderBtn" class="btn btn-danger my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#deleteOrderModal">Delete Order</button>
                            </nav>
                            ';
                            require 'components/modals/orderModals.php';
                        }

                        /* query to grab all orders */
                        if ($access == 'C') {
                            // getting customer's ID
                            $fName = $_SESSION['fName'];
                            $customerIdSql = "SELECT id FROM `users` WHERE fName = '$fName'";
                            $customerIdResult = mysqli_query($mysqli, $customerIdSql);
                            $customerId = mysqli_fetch_assoc($customerIdResult)["id"];
                            $orderSql  = "SELECT * FROM `orders` WHERE userId = '$customerId'";
                        } else {
                            $orderSql  = "SELECT * FROM `orders` ORDER BY `orders`.`id` DESC";
                        }

                        $orderResultSize = mysqli_query($mysqli, $orderSql);
                        $orderRowSize = $orderResultSize -> fetch_assoc();

                        if($orderRowSize > 0) {
                            echo '<div class="table-responsive-sm table-responsive-md">
                                    <table class="table table-bordered table-hover table-striped" id="ordersTable"> 
                                        <thead class="thead-dark">
                                            <tr class=\'ordersTableRow\'> 
                                                <th scope="col" class=\'ordersHeader\'>Product Name</th> 
                                                <th scope="col" class=\'ordersHeader\'>Quantity</th> 
                                                <th scope="col" class=\'ordersHeader\'>Description</th> 
                                                <th scope="col" class=\'ordersHeader\'>Category</th> 
                                                <th scope="col" class=\'ordersHeader\'>Price</th>';
                                                if ($access = 'A') { echo '<th scope="col" class=\'ordersHeader\'>User ID</th>'; }
                                                echo'<th scope="col" class=\'ordersHeader\'>Order Status</th> 
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
                                $userId_order = $orderRow["userId"];
                                $orderStatus_order = $orderRow["orderStatus"];
                                $orderTimeStamp_order = $orderRow["orderTimeStamp"];
                                $pImage_order = $orderRow["pImage"];

                                echo '<tr class=\'row'.$value.'\' value='.$value.'> 
                                        <td scope="row" class=\'pName'.$value.'\' value='.$value.'>'.$pName_order.'</td> 
                                        <td class=\'quantity'.$value.'\' value='.$value.'>'.$quantity_order.'</td> 
                                        <td class=\'pDescription'.$value.'\' value='.$value.'>'.$pDescription_order.'</td> 
                                        <td class=\'category'.$value.'\' value='.$value.'>'.$category_order.'</td>
                                        <td class=\'price'.$value.'\' value='.$value.'>'.$price_order.'</td>';
                                        if ($access = 'A') { echo '<td class=\'userId'.$value.'\' value='.$value.'>'.$userId_order.'</td>'; }
                                        echo '<td class=\'orderStatus'.$value.'\' value='.$value.'>'.$orderStatus_order.'</td> 
                                        <td class=\'orderTimeStamp'.$value.'\' value='.$value.'>'.$orderTimeStamp_order.'</td> 
                                        <td class=\'pImage'.$value.'\' value='.$value.'><img class="border border-dark rounded m-2" src="'.$pImage_order.'" width="50" height="50" /></td>
                                    </tr>';
                                $value++;
                            }
                            echo '</tbody></table></div>';
                        } else {
                            echo '<h5 style="font-weight:normal;">No orders present.</h5>';
                        }
                    }
                    if ($access == 'A' || $access == 'W' || $access == 'M') { // SHOP MANAGER ACCESS
                        echo '<h4 style="font-weight:normal;">Products:</h4>';

                        /* add, delete, edit product */
                        echo '
                            <nav class="navbar-expand mb-2">
                                <button name="addProductBtn" class="btn btn-success my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#addProductModal">Add Product</button>
                                <button name="editProductBtn" class="btn btn-warning my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#editProductModal">Edit Product</button>
                                <button name="deleteProductBtn" class="btn btn-danger my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#deleteProductModal">Delete Product</button>
                            </nav>
                        ';
                        require 'components/modals/productModals.php';

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
                                            <th scope="col" class=\'productsHeader\'>Tax</th> 
                                            <th scope="col" class=\'productsHeader\'>Minimum Order</th> 
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
                                    <td class=\'tax'.$value.'\' value='.$value.'>'.$tax_product.'</td> 
                                    <td class=\'minOrder'.$value.'\' value='.$value.'>'.$minOrder_product.'</td> 
                                    <td class=\'pImage'.$value.'\' value='.$value.'><img class="border border-dark rounded m-2" src="'.$pImage_product.'" width="50" height="50" /></td>
                                </tr>';
                            $value++;
                        }
                        echo '</tbody></table></div>';
                    }
                    
                    // WEBMASTER ACCESS
                    if ($access == 'A' || $access == 'W') {

                    }
                    
                    // ADMIN ACCESS
                    if ($access == 'A') {
                        echo '<h4 style="font-weight:normal;">Users:</h4>';

                        /* add, delete, edit users */
                        echo '
                            <nav class="navbar-expand mb-2">
                                <button name="addUserBtn" class="btn btn-success my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#addUserModal">Add User</button>
                                <button name="editUserBtn" class="btn btn-warning my-2 my-sm-0 mr-2" type="submit" data-toggle="modal" data-target="#editUserModal">Edit User</button>
                                <button name="deleteUserBtn" class="btn btn-danger my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#deleteUserModal">Delete User</button>
                            </nav>
                        ';
                        require 'components/modals/userModals.php';

                        /* query to grab all users */
                        $userSql  = "SELECT * FROM `users` ORDER BY `users`.`id` DESC";
                        $userResult = mysqli_query($mysqli, $userSql);
                        echo '<div class="table-responsive-sm table-responsive-md">
                                <table class="table table-bordered table-hover table-striped" id="usersTable"> 
                                    <thead class="thead-dark">
                                        <tr class=\'usersTableRow\'> 
                                            <th scope="col" class=\'usersHeader\'>First Name</th> 
                                            <th scope="col" class=\'usersHeader\'>Last Name</th> 
                                            <th scope="col" class=\'usersHeader\'>Email</th>
                                            <th scope="col" class=\'usersHeader\'>Access</th>
                                        </tr>
                                    </thead>
                                <tbody>';
                        $value = 1;
                        while ($userRow = $userResult -> fetch_assoc()) {
                            $fName_user = $userRow["fName"];
                            $lName_user = $userRow["lName"];
                            $email_user = $userRow["email"];
                            $access_user = $userRow["access"];

                            echo '<tr class=\'row'.$value.'\' value='.$value.'> 
                                    <td scope="row" class=\'fName'.$value.'\' value='.$value.'>'.$fName_user.'</td> 
                                    <td class=\'lName'.$value.'\' value='.$value.'>'.$lName_user.'</td> 
                                    <td class=\'email'.$value.'\' value='.$value.'>'.$email_user.'</td> 
                                    <td class=\'access'.$value.'\' value='.$value.'>'.$access_user.'</td>
                                </tr>';
                            $value++;
                        }
                        echo '</tbody></table></div>';
                    }
                ?>
            </div>
        </div>
        
        <?php require 'components/footer.php'; ?>
    </body>
</html>