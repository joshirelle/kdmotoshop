<?php

try {
    include_once "../../config/config.php";
    $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

         //echo "Connection has been set successfully";
        $sql = "INSERT INTO products(cat_id, brand_id, name, description, qty, price, image)VALUES(:cat_id, :brand_id, :name, :description, :qty, :price, :image)";
        $pdo_statement = $pdo_conn->prepare($sql);
        $result = $pdo_statement->execute(array(':cat_id' => $_POST['cat_id'], ':brand_id' => $_POST['brand_id'], ':name' => $_POST['name'], ':description' => $_POST['description'], ':qty' => $_POST['qty'], ':price' => $_POST['price'], ':image' => $image));
} catch (PDOException $e) {
    echo $e;
}