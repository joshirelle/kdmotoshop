<?php

try {
    include_once "../../config/config.php";

    $sql = "UPDATE products SET cat_id = :cat_id, brand_id = :brand_id, name = :name, description = :description, image = :image, image_name = :image_name, qty = :qty, price = :price, is_active = :isActive, is_pre_order = :isPreOrder WHERE name = :oldProdName";
        $pdo_statement = $pdo_conn->prepare($sql);
        $result = $pdo_statement->execute(array(':cat_id' => $_POST['cat_id'], ':brand_id' => $_POST['brand_id'], ':name' => $_POST['name'], ':description' => $_POST['description'], ':image' => $_POST['image'], ':image_name' => $_POST['image_name'], ':qty' => $_POST['qty'], ':price' => $_POST['price'], ':isActive' => $_POST['isActive'], ':isPreOrder' => $_POST['isPreOrder'], ':oldProdName'  => $_POST['oldProdName']));

        if (!empty($result)) {
            echo "Selected record has been updated successfully";
        }
    
} catch (PDOException $e) {
    echo $e;
}   