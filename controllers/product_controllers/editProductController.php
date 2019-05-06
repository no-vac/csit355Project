<?php
    require '../../server/dbConnection.php';

    $editProductSql = "UPDATE products SET ";
    $editedAttributeCount = 0;

    $original_pNameId = mysqli_real_escape_string($mysqli, $_POST['original_pNameId']);
    
    // getting pName
    if (strlen($_POST["pName"]) > 0) {
        $pName = mysqli_real_escape_string($mysqli, $_POST['pName']);
        $editedAttributeCount > 0 ? $editProductSql .= ", pName='$pName'" : $editProductSql .= "pName='$pName'"; 
        $editedAttributeCount++;
    }
    
    // getting quantity
    if (strlen($_POST["quantity"]) > 0) {
        $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
        $editedAttributeCount > 0 ? $editProductSql .= ", quantity='$quantity'" : $editProductSql .= "quantity='$quantity'";
        $editedAttributeCount++;
    }

    // getting pDescription
    if (strlen($_POST["pDescription"]) > 0) {
        $pDescription = mysqli_real_escape_string($mysqli, $_POST['pDescription']);
        $editedAttributeCount > 0 ? $editProductSql .= ", pDescription='$pDescription'" : $editProductSql .= "pDescription='$pDescription'"; 
        $editedAttributeCount++;
    }

    // getting category
    if (strlen($_POST["category"]) > 0) {
        $category = mysqli_real_escape_string($mysqli, $_POST['category']);
        $editedAttributeCount > 0 ? $editProductSql .= ", category='$category'" : $editProductSql .= "category='$category'"; 
        $editedAttributeCount++;
    }

    // getting price
    if (strlen($_POST["price"]) > 0) {
        $price = mysqli_real_escape_string($mysqli, $_POST['price']);
        $editedAttributeCount > 0 ? $editProductSql .= ", price='$price'" : $editProductSql .= "price='$price'"; 
        $editedAttributeCount++;
    } 

    // getting tax
    if (strlen($_POST["tax"]) > 0) {
        $tax = mysqli_real_escape_string($mysqli, $_POST['tax']);
        $editedAttributeCount > 0 ? $editProductSql .= ", tax='$tax'" : $editProductSql .= "tax='$tax'"; 
        $editedAttributeCount++;
    }

    // getting minOrder
    if (strlen($_POST["minOrder"]) > 0) {
        $minOrder = mysqli_real_escape_string($mysqli, $_POST['minOrder']);
        $editedAttributeCount > 0 ? $editProductSql .= ", minOrder='$minOrder'" : $editProductSql .= "minOrder='$minOrder'"; 
        $editedAttributeCount++;
    } 

    // getting product image
    if (strlen($_FILES["pImage"]) > 0) {
        // getting the category of item
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

        $editedAttributeCount > 0 ? $editProductSql .= ", pImage='$fileUploadedDestination'" : $editProductSql .= "pImage='$fileUploadedDestination'"; 
        $editedAttributeCount++;
    }

    // sql update
    $editProductSql .= " WHERE id='$original_pNameId'";
    mysqli_query($mysqli, $editProductSql);

    header("Location: ../../public_html/profile.php")
?>