<?php
    /*Get Default action and access level*/

  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
      /*Default Action*/
      if($action == NULL){
        $action = "products_page";
      }
    }

  $accessType = filter_input(INPUT_POST, 'accessType');
  if($accessType == NULL){
    $accessType = filter_input(INPUT_GET, 'accessType');
    if($accessType == NULL){
      /*Default Access*/
      $accessType = 'customer';
    }
  }



if ($accessType == "admin"){
  $action = filter_input(INPUT_POST, 'action');
      if ($action == 'products_page') {
          $action = 'admin_products_page';
      }
  }

/*Everything Below This Line checks the $action variable, and then includes the corresponding page.*/
  /*Default Page*/
if ($action == "products_page"){
  include("public/products.php");
}
if($action == "admin_products_page"){
  include("admin/adminProducts.php");
}


if($action =="details"){
  include("public/details.php")
}

if($action == "cart"){
  include("cart/cart.php")
}

?>
