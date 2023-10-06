<?php

try {
    include_once "config/config.php";

    //echo "Connection has been set successfully";
    $sql = "SELECT a.cat_name, b.brand_name, p.name, p.description, p.image, p.image_name, p.qty, p.price, p.is_active, p.is_pre_order
    FROM products p
    JOIN categories a ON a.cat_id = p.cat_id
    JOIN brands b ON b.brand_id = p.brand_id";
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->execute();
	$prodRows = $pdo_statement->fetchAll();
} catch (PDOException $e) {
    echo $e;
}