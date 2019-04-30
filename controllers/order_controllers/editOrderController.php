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

    // getting order image
    if (strlen($_POST["pImage"]) > 0) {
        $pImage = mysqli_real_escape_string($mysqli, $_POST['pImage']);
        $editedAttributeCount > 0 ? $editOrderSql .= ", pImage='$pImage'" : $editOrderSql .= "pImage='$pImage'"; 
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
        $targetDir = "assets/orders/$categoryDir";
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
    $editOrderSql .= " WHERE id='$original_pNameId'";
    mysqli_query($mysqli, $editOrderSql);

    header("Location: ../../public_html/profile.php")
?>