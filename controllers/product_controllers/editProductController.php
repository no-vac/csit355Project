<?php
    require '../server/dbConnection.php';

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

    // getting productStatus
    if (strlen($_POST["productStatus"]) > 0) {
        $editedAttributeCount++;
        $productStatus = mysqli_real_escape_string($mysqli, $_POST['productStatus']);
        $editedAttributeCount > 0 ? $editProductSql .= ", productStatus='$productStatus'" : $editProductSql .= "productStatus='$productStatus'"; 
    }

    // getting minOrder
    if (strlen($_POST["minOrder"]) > 0) {
        $minOrder = mysqli_real_escape_string($mysqli, $_POST['minOrder']);
        $editedAttributeCount > 0 ? $editProductSql .= ", minOrder='$minOrder'" : $editProductSql .= "minOrder='$minOrder'"; 
        $editedAttributeCount++;
    } 

    // getting product image
    if (strlen($_POST["pImage"]) > 0) {
        $pImage = mysqli_real_escape_string($mysqli, $_POST['pImage']);
        $editedAttributeCount > 0 ? $editProductSql .= ", pImage='$pImage'" : $editProductSql .= "pImage='$pImage'"; 
        $editedAttributeCount++;
        
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
        }

        $pImage = addslashes(file_get_contents($_FILES['pImage']['tmp_name'])); */
    }

    // sql update
    $editProductSql .= " WHERE id='$original_pNameId'";
    mysqli_query($mysqli, $editProductSql);

    header("Location: ../public_html/profile.php")
?>