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


/*Page Navigation Logic is Called*/
if($accessType == "customer"){
  takeMeAway("customer", $action);
}

if($accessType == "admin"){
  takeMeAway("admin");
}


/*Everything Below This Line checks the $action variable, and then includes the corresponding page.*/
  /*Default Page*/

  function takeMeAway($access, $action){
    if($access == "admin"){
      if($action == "cart"){
        include("cart/cart.php");
      }
      if($action == "details"){
        include("public/details.php");
      }
      if($action == "admin_about_edit"){
        include("admin/adminAboutEdit.php");
      }
      if($action == "admin_about_add"){
        include("admin/adminAboutAdd.php");
      }
      if($action == "admin_products_edit"){
        include("admin/adminProductsEdit.php");
      }
      if($action == "admin_products_add"){
        include("admin/adminProductsAdd.php");
      }
    }//End of if "admin"


    if($access == "customer"){
      if($action == "cart"){
        include("cart/cart.php");
      }
      if($action == "details"){
        include("public/details.php");
      }
      if($action == "products_page"){
        include("public/products.php");
      }
      if($action == "about_page"){
        include("public/about.php");
      }


    }//End of if "customer"
  }//End of whatPage

?>
