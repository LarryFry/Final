<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}
function edit_product($ID, $ProductName, $ProductCode, $Price, $Stock, $Category){
    global $db;
    $query = 'UPDATE products SET ProductName = :ProductName, ProductCode = :ProductCode ,
        Price = :Price ,  Stock = :Stock, Category = :Category
        WHERE products.ID = :ID';
    $statement = $db->prepare($query);
    $statement -> bindValue(":ProductName", $ProductName);
    $statement -> bindValue(":ProductCode", $ProductCode);
    $statement -> bindValue(":Price", $Price);
    $statement -> bindValue(":Stock", $Stock);
    $statement -> bindValue(":Category", $Category);
    $statement -> bindValue(":ID", $ID);
    $statement -> execute();
    $statement -> closeCursor();
}


 ?>
