<?php
    echo 
    '<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalTitle">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="modal-body" action="../controllers/user_controllers/addUserController.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="addUser_fName">First Name</label>
                            <input name="fName" type="text" class="form-control" id="fName" placeholder="Jennifer" required>
                            <div class="invalid-feedback">Please enter a valid name.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="addUser_lName">Last Name</label>
                            <input name="lName" type="text" class="form-control" id="lName" placeholder="Lawrence" required>
                            <div class="invalid-feedback">Please enter a valid name.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="addUser_email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="jenny62@pws.com" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="addUser_access">Access</label>
                            <select name="access" class="custom-select d-block w-100" id="access" required>
                                <option value="">Choose...</option>
                                <option>A</option>
                                <option>W</option>
                                <option>M</option>
                                <option>C</option>
                            </select>
                            <div class="invalid-feedback">Please select a valid access.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="addUser_password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" required>
                        <div class="invalid-feedback">Please enter a valid password.</div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="addUserBtn" type="submit" class="btn btn-primary">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';

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
    '<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalTitle">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="modal-body" action="../controllers/user_controllers/editUserController.php" method="post">
                    <div class="mb-3">
                        <label for="editUser_item">Which User?</label>
                        <select name="originalUser_id" class="custom-select d-block w-100" id="originalUser_id" required>
                            '.$userEmailOptions.'
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="addUser_fName">First Name</label>
                            <input name="fName" type="text" class="form-control" id="fName" placeholder="Jennifer">
                            <div class="invalid-feedback">Please enter a valid name.</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="addUser_lName">Last Name</label>
                            <input name="lName" type="text" class="form-control" id="lName" placeholder="Lawrence">
                            <div class="invalid-feedback">Please enter a valid name.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="addUser_email">Email</label>
                            <input name="email" type="text" class="form-control" id="email" placeholder="jenny62@pws.com">
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="addUser_access">Access</label>
                            <select name="access" class="custom-select d-block w-100" id="access">
                                <option value="">Choose...</option>
                                <option>A</option>
                                <option>W</option>
                                <option>M</option>
                                <option>C</option>
                            </select>
                            <div class="invalid-feedback">Please select a valid access.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="addUser_password">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                        <div class="invalid-feedback">Please enter a valid password.</div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="addUserBtn" type="submit" class="btn btn-primary">Edit User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';

    echo
    '<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="modal-body" action="../controllers/user_controllers/deleteUserController.php" method="post">
                    <div class="mb-3">
                        <label for="deleteUser_item">Which User?</label>
                        <select name="originalUser_id" class="custom-select d-block w-100" id="originalUser_id" required>
                            '.$userEmailOptions.'
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="deleteUserBtn" type="submit" class="btn btn-primary">Delete User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>';
?>