<?php
    $userSql  = "SELECT * FROM `users`";
    $userResultSize = mysqli_query($mysqli, $userSql);
    $userRowSize = $userResultSize -> fetch_assoc();
    $userEmailOptions = "";

    if($userRowSize > 0) {
        $value = 1;
        $userResult = mysqli_query($mysqli, $userSql);
        while ($userRow = $userResult -> fetch_assoc()) {
            $user_id = $userRow["id"];
            $user_email = $userRow["email"];
            
            $userEmailOptions .= '<option value='.$user_id.'>'.$user_email.'</option>';
            $value++;
        }
    } else {
        echo '<h5 style="font-weight:normal;">No users present.</h5>';
    }

    echo 
    '<div class="modal fade" id="addOrderModal" tabindex="-1" role="dialog" aria-labelledby="addOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalTitle">Add Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="modal-body" action="../controllers/order_controllers/addOrderController.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="addOrder_pName">Product Name</label>
                            <input name="pName" type="text" class="form-control" id="pName" placeholder="Dreamy Clouds" required>
                            <div class="invalid-feedback">Please enter a valid order name.</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="addOrder_quantity">Quantity</label>
                            <input name="quantity" type="number" class="form-control" id="quantity" placeholder="1" required>
                            <div class="invalid-feedback">Please enter a valid quantity.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="addOrder_pDescription">Order Description</label>
                            <input name="pDescription" type="text" class="form-control" id="pDescription" placeholder="This background is for those who look to the skies." required>
                            <div class="invalid-feedback">Please enter a valid order description.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="addOrder_category">Category</label>
                            <select name="category" class="custom-select d-block w-100" id="category" required>
                                <option value="">Choose...</option>
                                <option>Static</option>
                                <option>Multi-Screen</option>
                                <option>Live</option>
                                <option>Interactive</option>
                                <option>Hybrid</option> 
                            </select>
                            <div class="invalid-feedback">Please select a valid category.</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editOrder_userItem">Which User?</label>
                            <select name="original_UserNameId" class="custom-select d-block w-100" id="original_UserNameId" required>
                                '.$userEmailOptions.'
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="addOrder_price">Price</label>
                            <input name="price" type="decimal" class="form-control" id="price" placeholder="20.0" required>
                            <div class="invalid-feedback">Please enter a valid price.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="addOrder_orderStatus">Order Status</label>
                            <input name="orderStatus" type="text" class="form-control" id="orderStatus" placeholder="Shipped" required>
                            <div class="invalid-feedback">Please enter a valid order status.</div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="addOrder_timeStamp">Order Time Stamp</label>
                            <input name="orderTimeStamp" type="datetime-local" class="form-control" id="orderTimeStamp" step="1" required>
                            <div class="invalid-feedback">Please enter a valid order time stamp.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="addOrder_pImage">Order Image</label>
                        <input name="pImage" type="file" class="form-control" id="pImage" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="addOrderBtn" type="submit" class="btn btn-primary">Add Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';

    $orderSql  = "SELECT * FROM `orders`";
    $orderResultSize = mysqli_query($mysqli, $orderSql);
    $orderRowSize = $orderResultSize -> fetch_assoc();
    $orderNameOptions = "";

    if($orderRowSize > 0) {
        $value = 1;
        $orderResult = mysqli_query($mysqli, $orderSql);
        while ($orderRow = $orderResult -> fetch_assoc()) {
            $pName_id = $orderRow["id"];
            $pName_order = $orderRow["pName"];
            
            $orderNameOptions .= '<option value='.$pName_id.'>'.$pName_order.'</option>';
            $value++;
        }
    } else {
        echo '<h5 style="font-weight:normal;">No orders present.</h5>';
    }

    echo 
    '<div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalTitle">Edit Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="modal-body" action="../controllers/order_controllers/editOrderController.php" method="post">
                    <div class="mb-3">
                        <label for="editOrder_item">Which Order?</label>
                        <select name="original_pNameId" class="custom-select d-block w-100" id="original_pNameId" required>
                            '.$orderNameOptions.'
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="editOrder_pName">Order Name</label>
                            <input name="pName" type="text" class="form-control" id="pName" placeholder="Dreamy Clouds">
                            <div class="invalid-feedback">Please enter a valid order name.</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="editOrder_quantity">Quantity</label>
                            <input name="quantity" type="number" class="form-control" id="quantity" placeholder="1">
                            <div class="invalid-feedback">Please enter a valid quantity.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="editOrder_pDescription">Order Description</label>
                            <input name="pDescription" type="text" class="form-control" id="pDescription" placeholder="This background is for those who look to the skies.">
                            <div class="invalid-feedback">Please enter a valid order description.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="editOrder_category">Category</label>
                            <select name="category" class="custom-select d-block w-100" id="category">
                                <option value="">Choose...</option>
                                <option>Static</option>
                                <option>Multi-Screen</option>
                                <option>Live</option>
                                <option>Interactive</option>
                                <option>Hybrid</option> 
                            </select>
                            <div class="invalid-feedback">Please select a valid category.</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="editOrder_userItem">Which User?</label>
                            <select name="userId" class="custom-select d-block w-100" id="userId">
                                '.$userEmailOptions.'
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="editOrder_price">Price</label>
                            <input name="price" type="decimal" class="form-control" id="price" placeholder="20.0">
                            <div class="invalid-feedback">Please enter a valid price.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="editOrder_orderStatus">Order Status</label>
                            <input name="orderStatus" type="text" class="form-control" id="orderStatus" placeholder="Shipped">
                            <div class="invalid-feedback">Please enter a valid order status.</div>
                        </div>

                        <div class="col-md-8 mb-3">
                            <label for="editOrder_timeStamp">Order Time Stamp</label>
                            <input name="orderTimeStamp" type="datetime-local" class="form-control" id="orderTimeStamp" step="1">
                            <div class="invalid-feedback">Please enter a valid order time stamp.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="editOrder_pImage">Order Image</label>
                        <input name="pImage" type="file" class="form-control" id="pImage">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="editOrderBtn" type="submit" class="btn btn-primary">Edit Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';

    echo
    '<div class="modal fade" id="deleteOrderModal" tabindex="-1" role="dialog" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOrderModalTitle">Delete Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="modal-body" action="../controllers/order_controllers/deleteOrderController.php" method="post">
                    <div class="mb-3">
                        <label for="deleteOrder_item">Which Order?</label>
                        <select name="original_pNameId" class="custom-select d-block w-100" id="original_pNameId" required>
                            '.$orderNameOptions.'
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="deleteOrderBtn" type="submit" class="btn btn-primary">Delete Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
?>