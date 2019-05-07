<?php
    echo '
    <hr class="mb-4">
    <form class="needs-validation" action="../controllers/confirmPurchase.php" method="post" novalidate>
        <h4 class="mb-3">Billing Address</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value='.$_SESSION["fName"].' required disabled>
                <div class="invalid-feedback">Valid first name is required.</div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value='.$_SESSION["lName"].' required disabled>
                <div class="invalid-feedback">Valid last name is required.</div>
            </div>
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value='.$_SESSION["email"].' disabled>
            <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
        </div>
        
        <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">Please enter your shipping address.</div>
        </div>

        <div class="row">
            <div class="col-md-8 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                    <option value="">Choose...</option>';
                    require "defaultCountries.php"; 
                echo '</select>
                <div class="invalid-feedback">Please select a valid country.</div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="zip">Zip</label>
                <input type="number" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">Zip code required.</div>
            </div>
        </div>

        <!-- PAYMENT -->
        <h4 class="mb-3">Payment</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">Name on card is required</div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="number" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">Credit card number is required</div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="number" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">Expiration date required</div>
            </div>

            <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="number" class="form-control" id="cc-cvv" placeholder="" maxlength="3" required>
                <div class="invalid-feedback">Security code required</div>
            </div>
        </div>
        <hr class="mb-4">
        <button id="confirmPurchaseBtn" class="btn btn-primary btn-lg btn-block" name="confirmPurchaseBtn">Purchase Product(s)</button>
    </form>';
?>