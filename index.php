<?php
  /*Default Access*/
$accessType = "customer";
if $accessType = "customer"{
  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
        /*Default Action*/
      if ($action == NULL) {
          $action = 'products_page';
      }
  }
}



if $accessType = "admin"{
  $action = filter_input(INPUT_POST, 'action');
      if ($action == 'products_page') {
          $action = 'admin_products_page';
      }
      if($action == "details"){
        $action = 'admin_product_details_page'
      }
      if($action == "cart"){
        $action = 'admin_cart_page'
      }
  }
}

  /*Default Page*/
if $action = "products_page"{
  include("products.php");
}

?>
