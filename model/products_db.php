<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM Products
              WHERE  ProductCode IS NOT NULL AND
	                   Price is not null AND
                     Stock is not null AND
                     Category is not null AND
                     ProductName is not null AND
                     ImageCode is not null';
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
function updateStock($productNames, $qtys){
  foreach ($productNames as $key => $value){
    global $db;
    $query = "UPDATE products
              SET Stock = Stock - $qtys[$key]
              WHERE products.ProductName = '$value'";
    $statement = $db->prepare($query);
    $statement -> execute();
    $statement -> closeCursor();
    echo $value;
  }
}



//This will instanciate the new product with just Image code and an ID.
function insertImageCode($ImageCode){
  global $db;
  $query = 'INSERT INTO products(ImageCode)
              VALUES(:ImageCode)';
  $statement = $db->prepare($query);
  $statement -> bindValue(":ImageCode", $ImageCode);
  $statement -> execute();
  $statement -> closeCursor();
}


function get_ID($ImageCode){
  global $db;
  $query = 'SELECT ID from products
              where products.ImageCode = :ImageCode';
  $statement = $db->prepare($query);
  $statement -> bindValue(":ImageCode", $ImageCode);
  $statement -> execute();
  return $statement;
  $statement -> closeCursor();
}

function add_img($ImageCode, $ID){
  global $db;
  $query = 'UPDATE products SET ImageCode = :ImageCode
              WHERE employees.ID = :ID';
  $statement = $db->prepare($query);
  $statement -> bindValue(":ImageCode", $ImageCode);
  $statement -> bindValue(":ID", $ID);
  $statement -> execute();
  $statement -> closeCursor();
};

function insertProdTextFields($ProductName, $ProductCode, $Price, $Stock, $Category, $ID){
  global $db;
  $query = 'UPDATE products
	           SET ProductName = :prodName , ProductCode = :prodCode, Price = :price, Stock = :stock, Category = :category
              WHERE products.ID = :ID';
  $statement = $db->prepare($query);
  $statement -> bindValue(":prodName", $ProductName);
  $statement -> bindValue(":prodCode", $ProductCode);
  $statement -> bindValue(":price", $Price);
  $statement -> bindValue(":stock", $Stock);
  $statement -> bindValue(":category", $Category);
  $statement -> bindValue(":ID", $ID);
  $statement -> execute();
  $statement -> closeCursor();
}

 ?>
