<?php
require('./model/database.php');
require('./model/products_db.php');
require('./model/employees_db.php');

if(empty($_POST) && empty($_GET)){//If $_POST and $_GET aren't set, start a new session. This will hold the cart info.
  session_start();
}


  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
      /*Default Action*/
      if($action == NULL){
        $action = "home";
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

  $adminAction = filter_input(INPUT_POST, 'adminAction');
  if($adminAction == NULL){
    $adminAction = filter_input(INPUT_GET, 'adminAction');
  }




/*Page Navigation Logic is Called*/
if($accessType == "customer"){
  takeMeAway("customer", $action, $adminAction);
}

if($accessType == "admin"){
  takeMeAway("admin", $action, $adminAction);
}


/*Everything Below This Line checks the $action variable, and then includes the corresponding page.*/
  /*Default Page*/

  function takeMeAway($access, $action, $adminAction){
    //If "admin" block below
    if($access == "admin"){
      if($action == "cart"){
        echo("Tried to go to 'admin view' page that doesn't have one.\n Make a JS alert or something, and redirect them to home/home.php.");
        echo("Or we can flash the button or something, indicating that the button is unclickable at this time.");
      }
      if($action == "details"){
        echo("Tried to go to 'admin view' page that doesn't have one.\n Make a JS alert or something, and redirect them to home/home.php.");
        echo("Or we can flash the button or something, indicating that the button is unclickable at this time.");
      }
      if($action == "about_page"){
        if($adminAction == "edit_employee"){
          $ID = filter_input(INPUT_POST, 'ID');
          $FirstName = filter_input(INPUT_POST, 'FirstName');
          $LastName = filter_input(INPUT_POST, 'LastName');
          $Title = filter_input(INPUT_POST, 'Title');
          $Salary = filter_input(INPUT_POST, 'Salary');
          edit_employee($ID, $FirstName, $LastName, $Title, $Salary);
        }
          //change_image($ImageCode);  

        $employees = get_employees();
        include("admin/adminAbout.php");
      }
      if($action == "products_page"){
        if($adminAction == "edit_product"){
          $ID = filter_input(INPUT_POST, 'ID');
          $ProductName = filter_input(INPUT_POST, 'ProductName');
          $ProductCode = filter_input(INPUT_POST, 'ProductCode');
          $Price = filter_input(INPUT_POST, 'Price');
          $Stock = filter_input(INPUT_POST, 'Stock');
          $Category = filter_input(INPUT_POST, 'Category');
          edit_product($ID, $ProductName, $ProductCode, $Price, $Stock, $Category);
        }
        $products = get_products();
        include("admin/adminProducts.php");
      }
      if($action == "add_employee"){
        include("admin/adminAboutAdd.php");
      }
      if($action == "add_product"){
        include("admin/adminProductsAdd.php");
      }
      if($action == "home"){
        include("home/home.php");
      }
    }//End of if "admin"


    //If "customer" block below
    if($access == "customer"){
      if($action == "cart"){
        include("cart/cart.php");
      }
      if($action == "details"){
        include("public/details.php");
      }
      if($action == "products_page"){
        $products = get_products();
        include("public/products.php");
      }
      if($action == "about_page"){
        $employees = get_employees();
        include("public/about.php");
      }
      if($action == "home"){
        include("home/home.php");
      }
      if($action == "add_product"){
        echo("Tried to go to 'customer view' page that doesn't have one.\n Make a JS alert or something and let them stay, or redirect them to home/home.php.");
        echo("Or we can flash the button or something, indicating that the button is unclickable at this time.");
      }
      if($action == "add_employee"){
        echo("Tried to go to 'customer view' page that doesn't have one.\n Make a JS alert or something and let them stay, or redirect them to home/home.php.");
        echo("Or we can flash the button or something, indicating that the button is unclickable at this time.");
      }



    }//End of if "customer"
  }//End of whatPage

?>
