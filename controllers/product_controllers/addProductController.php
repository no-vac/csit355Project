<?php
    require '../../server/dbConnection.php';

    $pName = mysqli_real_escape_string($mysqli, $_POST['pName']);
    $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
    $pDescription = mysqli_real_escape_string($mysqli, $_POST['pDescription']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $tax = mysqli_real_escape_string($mysqli, $_POST['tax']);
    $minOrder = mysqli_real_escape_string($mysqli, $_POST['minOrder']);

    // getting the category if item
    if ($category == "Static") {
        $categoryDir = 'static';
    } else if ($category == "Multi-Screen") {
        $categoryDir = 'multi-screen';
    } else if ($category == "Live") {
        $categoryDir = 'live';
    } else if ($category == "Interactive") {
        $categoryDir = 'interactive';
    } else if ($category == "Hybrid") {
        $categoryDir = 'hybrid';
    }

    // uploading image
    $file = mysqli_real_escape_string($mysqli, $_FILES['pImage']);
    $fileName = $_FILES['pImage']['name'];
    $fileTmpName = $_FILES['pImage']['tmp_name'];
    $fileSize = $_FILES['pImage']['size'];
    $fileError = $_FILES['pImage']['error'];
    $fileType = $_FILES['pImage']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $filesAllowed = array('jpg', 'jpeg', 'png', 'pdf');
    $uploadResult = "";
    if (in_array($fileActualExt, $filesAllowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNewName = uniqid($categoryDir, false).".".$fileActualExt;
                $fileDestination = "../../assets/products/$categoryDir/".$fileNewName;
                $fileUploadedDestination = "../assets/products/$categoryDir/".$fileNewName;

                move_uploaded_file($fileTmpName, $fileDestination);
                $uploadResult = "add_product_upload_success";
            } else {
                $uploadResult = "add_product_err_file_too_big";
            }
        } else {
            $uploadResult = "add_product_err";
        }
    } else {
        $uploadResult = "add_product_err_file_type";
    }

    // sql insert
    $addProductSql = "INSERT INTO products(pName, quantity, pDescription, category, price, tax, minOrder, pImage) VALUES('$pName', $quantity, '$pDescription', '$category', $price, $tax, $minOrder, '$fileUploadedDestination')";
    mysqli_query($mysqli, $addProductSql);

    header("Location: ../../public_html/profile.php?".$uploadResult."");
?>