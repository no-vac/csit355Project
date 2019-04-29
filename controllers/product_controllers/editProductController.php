<?php
    require '../server/dbConnection.php';

    // GET THE VALUE FROM THIS
    $original_pName = mysqli_real_escape_string($mysqli, $_POST['original_pName']);

    // getting pName
    if (isset($_POST["pName"]) {$pName = mysqli_real_escape_string($mysqli, $_POST['pName'])};
    
    // getting quantity
    if (isset($_POST["quantity"]) {$quantity = mysqli_real_escape_string($mysqli, $_POST['quantity'])};

    // getting pDescription
    if (isset($_POST["pDescription"]) {$pDescription = mysqli_real_escape_string($mysqli, $_POST['pDescription'])};

    // getting category
    if (isset($_POST["category"]) {$category = mysqli_real_escape_string($mysqli, $_POST['category'])};

    // getting price
    if (isset($_POST["price"]) {$price = mysqli_real_escape_string($mysqli, $_POST['price'])};

    // getting tax
    if (isset($_POST["tax"]) {$tax = mysqli_real_escape_string($mysqli, $_POST['tax'])};

    // getting productStatus
    if (isset($_POST["productStatus"]) {$productStatus = mysqli_real_escape_string($mysqli, $_POST['productStatus'])};

    // getting minOrder
    if (isset($_POST["minOrder"]) {$minOrder = mysqli_real_escape_string($mysqli, $_POST['minOrder'])};

    // getting product image
    if (isset($_POST["pImage"]) {
        // getting the category if item
        if ($category == "Static") {
            $categoryDir = 'static';
        } else if ($category == "Multi-Screen") {
            $categoryDir = 'multi-screen';
        } else if ($category == "live") {
            $categoryDir = 'live';
        } else if ($category == "Interactive") {
            $categoryDir = 'interactive';
        } else if ($category == "Hybrid") {
            $categoryDir = 'hybrid';
        }

        /*
        $targetDir = "assets/products/$categoryDir";
        $targetFile = $target_dir . basename($_FILES["pImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["pImage"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["pImage"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["pImage"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }*/

        $image = addslashes(file_get_contents($_FILES['pImage']['tmp_name'])); //SQL Injection defence!
    }

    // sql insert
    $addProductSql = "UPDATE products SET pName='$pName', quantity=$quantity, pDescription='$pDescription', category='$category', price=$price, tax=$tax, productStatus='$productStatus', minOrder=$minOrder, pImage='$image' WHERE pName='$original_pName'";
    mysqli_query($mysqli, $addProductSql);

    header("Location: ../public_html/profile.php")
?>