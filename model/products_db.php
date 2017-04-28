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

 ?>
