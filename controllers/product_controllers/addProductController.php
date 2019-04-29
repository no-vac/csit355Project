<?php
    require '../../server/dbConnection.php';

    // getting pName
    $pName = mysqli_real_escape_string($mysqli, $_POST['pName']);
    
    // getting quantity
    $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);

    // getting pDescription
    $pDescription = mysqli_real_escape_string($mysqli, $_POST['pDescription']);

    // getting category
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);

    // getting price
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);

    // getting tax
    $tax = mysqli_real_escape_string($mysqli, $_POST['tax']);

    // getting productStatus
    $productStatus = mysqli_real_escape_string($mysqli, $_POST['productStatus']);

    // getting minOrder
    $minOrder = mysqli_real_escape_string($mysqli, $_POST['minOrder']);

    // getting product image
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

    if (isset($_POST["pImage"])) {
        $file = $_FILES['file'];

        // getting the file information
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $filesAllowed = array('jpg', 'jpeg', 'png', 'pdf');
        $uploadResult = "";
        if (in_array($fileActualExt, $filesAllowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    //$fileDestination = "../assets/products/$categoryDir";
                    $fileDestinationFile = "uploads/".$fileNameNew;

                    move_uploaded_file($fileTmpName, $fileDestinationFile);
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
    }

    // sql insert
    $addProductSql = "INSERT INTO products(pName, quantity, pDescription, category, price, tax, productStatus, minOrder, pImage) VALUES('$pName', $quantity, '$pDescription', '$category', $price, $tax, '$productStatus', $minOrder, '$fileDestinationFile')";
    mysqli_query($mysqli, $addProductSql);

    header("Location: ../../public_html/profile.php?".$uploadResult."");
?>