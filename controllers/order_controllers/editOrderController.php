<?php
    require '../../server/dbConnection.php';

    $editOrderSql = "UPDATE orders SET ";
    $editedAttributeCount = 0;

    $original_pNameId = mysqli_real_escape_string($mysqli, $_POST['original_pNameId']);
    
    if (strlen($_POST["pName"]) > 0) {
        $pName = mysqli_real_escape_string($mysqli, $_POST['pName']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", pName='$pName'" : $editOrderSql .= "pName='$pName'"; 
        $editedAttributeCount++;
    }
    
    if (strlen($_POST["quantity"]) > 0) {
        $quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", quantity='$quantity'" : $editOrderSql .= "quantity='$quantity'";
        $editedAttributeCount++;
    }

    if (strlen($_POST["pDescription"]) > 0) {
        $pDescription = mysqli_real_escape_string($mysqli, $_POST['pDescription']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", pDescription='$pDescription'" : $editOrderSql .= "pDescription='$pDescription'"; 
        $editedAttributeCount++;
    }

    if (strlen($_POST["category"]) > 0) {
        $category = mysqli_real_escape_string($mysqli, $_POST['category']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", category='$category'" : $editOrderSql .= "category='$category'"; 
        $editedAttributeCount++;
    }

    if (strlen($_POST["price"]) > 0) {
        $price = mysqli_real_escape_string($mysqli, $_POST['price']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", price='$price'" : $editOrderSql .= "price='$price'"; 
        $editedAttributeCount++;
    } 

    if (strlen($_POST["userId"]) > 0) {
        $userId = mysqli_real_escape_string($mysqli, $_POST['userId']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", userId='$userId'" : $editOrderSql .= "userId='$userId'"; 
        $editedAttributeCount++;
    }

    if (strlen($_POST["orderStatus"]) > 0) {
        $orderStatus = mysqli_real_escape_string($mysqli, $_POST['orderStatus']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", orderStatus='$orderStatus'" : $editOrderSql .= "orderStatus='$orderStatus'"; 
        $editedAttributeCount++;
    }

    if (strlen($_POST["orderTimeStamp"]) > 0) {
        $orderTimeStamp = mysqli_real_escape_string($mysqli, $_POST['orderTimeStamp']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", orderTimeStamp='$orderTimeStamp'" : $editOrderSql .= "orderTimeStamp='$orderTimeStamp'"; 
        $editedAttributeCount++;
    }

    if (isset($_FILES["pImage"])) {
        $currentCategorySql = "SELECT category FROM orders WHERE id='$original_pNameId'";
        $currentCategoryResult = mysqli_query($mysqli, $currentCategorySql);
        $currentCategoryRow = mysqli_fetch_assoc($currentCategoryResult);
        $currentCategory = implode($currentCategoryRow);
        
        if ($currentCategory == "Static") {
            $categoryDir = 'static';
        } else if ($currentCategory == "Multi-Screen") {
            $categoryDir = 'multi-screen';
        } else if ($currentCategory == "live") {
            $categoryDir = 'live';
        } else if ($currentCategory == "Interactive") {
            $categoryDir = 'interactive';
        } else if ($currentCategory == "Hybrid") {
            $categoryDir = 'hybrid';
        }

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
        
        $orderImagePathSql = "SELECT pImage FROM orders WHERE id='$original_pNameId'";
        $orderImagePathResult = mysqli_query($mysqli, $orderImagePathSql);
        $orderImagePath = mysqli_fetch_assoc($orderImagePathResult);
        $completeOrderImagePath = "../".implode($orderImagePath)."";
        unlink($completeOrderImagePath);

        $editedAttributeCount > 0 ? $editOrderSql .= ", pImage='$fileUploadedDestination'" : $editOrderSql .= "pImage='$fileUploadedDestination'"; 
        $editedAttributeCount++;
    }

    // sql update
    $editOrderSql .= " WHERE id='$original_pNameId'";
    mysqli_query($mysqli, $editOrderSql);

    header("Location: ../../public_html/profile.php?".$uploadResult."")
?>