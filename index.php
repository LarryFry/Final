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


/*Everything Below This Line checks the $action variable,
  and then includes the corresponding page.*/

  function takeMeAway($access, $action, $adminAction){
    //If "admin" block below
    if($access == "admin"){
      if($action == "cart"){
        echo '<script language="javascript">';
        echo 'alert("No admin section for cart view. Changing Access Level to Customer.")';
        echo '</script>';
        $access = "customer";
      }
      if($action == "details"){
        echo '<script language="javascript">';
        echo 'alert("No admin section for details view. Redirecting to Admin Products.")';
        echo '</script>';
        $action="products_page";
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

        //Edit Pages Img Logic
        if($adminAction == "edit_image"){
          $ID = filter_input(INPUT_POST, 'ID');
          $ImageCode = $_FILES['empImg']['name'];
          change_image($ImageCode, $ID);
        }

        $employees = get_employees();
        include("admin/adminAbout.php");
      }//End of action="about_page"


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
        $ProductName = filter_input(INPUT_POST, 'ProductName');
        $ProductCode = filter_input(INPUT_POST, 'ProductCode');
        $Price = filter_input(INPUT_POST, 'Price');
        $Stock = filter_input(INPUT_POST, 'Stock');
        $Category = filter_input(INPUT_POST, 'Category');

        if($adminAction == 'submit_image'){
          $ImageCode = $_FILES['prodImg']['name'];
          // Instanciate the new product with just Image code and an ID.
          insertImageCode($ImageCode);
          //Get ID based off ImageCode
          $ID = get_ID($ImageCode);
        }
        if($adminAction == 'submit_text'){
          echo("I'm trying to insert everything.");
          insertProdTextFields($ProductName, $ProductCode, $Price, $Stock, $Category, $ID);
        }
        include("admin/adminProductsAdd.php");
      }

      if($action == "home"){
        include("home/home.php");
      }
    }//End of if "admin"


    //If "customer" block below
    if($access == "customer"){
      if($action == "add_product"){
        echo '<script language="javascript">';
        echo 'alert("No customer section for add employee view. Redirecting to Products.")';
        echo '</script>';
        $action="products_page";
      }
      if($action == "add_employee"){
        echo '<script language="javascript">';
        echo 'alert("No customer section for add product view. Redirecting to About Us.")';
        echo '</script>';
        $action="about_page";
      }
      if($action == "cart"){
        echo '<script language="javascript">';
        echo 'alert("YER GOIN TO THE CART NOW")';
        echo '</script>';
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

      if($action == "thank_you"){
        session_start();
        if(isset($_SESSION['cart'])){
          foreach($_SESSION['cart'] as $item => $key) :
            $productNames[] = $_SESSION['cart'][$item]['name'];
            $qtys[] = $_SESSION['cart'][$item]['qty'];
          endforeach;
        }
        updateStock($productNames, $qtys);
        include("view/thankyou.php");
      }
    }//End of if "customer"
  }//End of takeMeAway

?>
