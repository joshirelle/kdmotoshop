<?php

try {
    include_once "../../config/config.php";
    $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

    if (!empty($image)) {
        // echo "Image is not empty";
        // echo "Connection has been set successfully";  

        $sql = "UPDATE products SET cat_id = :cat_id, brand_id = :brand_id, name = :name, description = :description, image = :image, image_name = :image_name, qty = :qty, price = :price, is_active = :isActive, is_pre_order = :isPreOrder WHERE name = :oldProdName";
        $pdo_statement = $pdo_conn->prepare($sql);
        $result = $pdo_statement->execute(array(':cat_id' => $_POST['cat_id'], ':brand_id' => $_POST['brand_id'], ':name' => $_POST['name'], ':description' => $_POST['description'], ':image' => $image, ':image_name' => $_POST['image_name'], ':qty' => $_POST['qty'], ':price' => $_POST['price'], ':isActive' => $_POST['isActive'], ':isPreOrder' => $_POST['isPreOrder'], ':oldProdName'  => $_POST['oldProdName']));

        // if (!empty($result)) {
        //     echo "Selected record has been updated successfully";
        // }
    } else {
        echo "Image is empty";
    }
    
    
} catch (PDOException $e) {
    echo $e;
}   