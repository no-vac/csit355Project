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
                    echo '<h4 style="font-weight:normal;">Orders:</h4>';
                    /* query to grab all orders */
                    // getting customer's ID
                    $fName = $_SESSION['fName'];
                    $customerIdSql = "SELECT id FROM `users` WHERE fName = '$fName'";
                    $customerIdResult = mysqli_query($mysqli, $customerIdSql);
                    $customerId = mysqli_fetch_assoc($customerIdResult)["id"];
                    
                    // querying all orders from customer ID
                    $orderSql  = "SELECT * FROM `orders` WHERE userId = '$customerId'";
                    $orderResult = mysqli_query($mysqli, $orderSql);
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
                    while ($orderRow = $orderResult -> fetch_assoc()) {
                        $pName = $orderRow["pName"];
                        $quantity = $orderRow["quantity"];
                        $pDescription = $orderRow["pDescription"];
                        $category = $orderRow["category"];
                        $price = $orderRow["price"];
                        $orderStatus = $orderRow["orderStatus"];
                        $orderTimeStamp = $orderRow["orderTimeStamp"];
                        $pImage = $orderRow["pImage"];

                        echo '<tr class=\'row'.$value.'\' value='.$value.'> 
                                <td scope="row" id=\'pName'.$value.'\' value='.$value.'>'.$pName.'</td> 
                                <td id=\'quantity'.$value.'\' value='.$value.'>'.$quantity.'</td> 
                                <td id=\'pDescription'.$value.'\' value='.$value.'>'.$pDescription.'</td> 
                                <td id=\'category'.$value.'\' value='.$value.'>'.$category.'</td>
                                <td id=\'price'.$value.'\' value='.$value.'>'.$price.'</td> 
                                <td id=\'orderStatus'.$value.'\' value='.$value.'>'.$orderStatus.'</td> 
                                <td id=\'orderTimeStamp'.$value.'\' value='.$value.'>'.$orderTimeStamp.'</td> 
                                <td id=\'pImage'.$value.'\' value='.$value.'><img class="border border-dark rounded m-2" src="'.$pImage.'" width="50" height="50" /></td>
                            </tr>';
                        $value++;
                    }
                    echo '</tbody></table></div>';
                ?>
            </div>
        </div>
        <?php require 'components/footer.php'; ?>
    </body>
</html>