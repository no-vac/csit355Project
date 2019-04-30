<?php
    echo 
    '<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalTitle">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="modal-body">
                    <div class="row">
                        <div class="col-md-9 mb-3">
                            <label for="addProduct_pName">Product Name</label>
                            <input name="pName" type="text" class="form-control" id="pName" placeholder="Dreamy Clouds" required>
                            <div class="invalid-feedback">Please enter a valid product name.</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="addProduct_quantity">Quantity</label>
                            <input name="quantity" type="number" class="form-control" id="quantity" placeholder="1" required>
                            <div class="invalid-feedback">Please enter a valid quantity.</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="addProduct_pDescription">Product Description</label>
                            <input name="pDescription" type="text" class="form-control" id="pDescription" placeholder="This background is for those who look to the skies." required>
                            <div class="invalid-feedback">Please enter a valid product description.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="addProduct_category">Category</label>
                            <select class="custom-select d-block w-100" id="category" required>
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
                        <div class="col-md-4 mb-3">
                            <label for="addProduct_price">Price</label>
                            <input name="price" type="decimal" class="form-control" id="price" placeholder="20.0" required>
                            <div class="invalid-feedback">Please enter a valid price.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="addProduct_tax">Tax</label>
                            <input name="tax" type="decimal" class="form-control" id="tax" placeholder=".66" required>
                            <div class="invalid-feedback">Please enter a valid tax.</div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="addProduct_minOrder">Minimum Order</label>
                            <input name="minOrder" type="number" class="form-control" id="minOrder" placeholder="1" required>
                            <div class="invalid-feedback">Please enter a valid minimum order.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="addProduct_pImage">Product Image</label>
                        <input name="pImage" type="file" class="form-control" id="pImage" required>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button name="addProductBtn" type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </div>
    </div>';

    echo
    '<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Edit Product Modal
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>';

    echo
    '<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Delete Product Modal
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>';
?>