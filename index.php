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

        if($adminAction == "delete_emp"){
          $ID = filter_input(INPUT_POST, 'ID');
          delete_emp($ID);
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
          $Description = filter_input(INPUT_POST, 'Description');
          edit_product($ID, $ProductName, $ProductCode, $Price, $Stock, $Category,$Description);
        }

        if($adminAction == "delete_prod"){
          $ID = filter_input(INPUT_POST, 'ID');
          delete_prod($ID);
        }

        if($adminAction == "edit_image"){
          $ID = filter_input(INPUT_POST, 'ID');
          $ImageCode = $_FILES['prodImg']['name'];
          change_image_prod($ImageCode, $ID);
        }


        $products = get_products();
        include("admin/adminProducts.php");
      }



      if($action == "add_employee"){
        if($adminAction == "submit_add_form"){
        // Get everything from the post.
          $ID = filter_input(INPUT_POST, 'ID');
          $First = filter_input(INPUT_POST, 'First');
          $Last = filter_input(INPUT_POST, 'Last');
          $Title = filter_input(INPUT_POST, 'Title');
          $Salary = filter_input(INPUT_POST, 'Salary');
          $ImageCode = $_FILES['empImg']['name'];
        //-----------
          $varArrayEmp=[$ID,$First,$Last,$Title,$Salary,$ImageCode];
          // Make sure user didn't submit any empty fields or a single space.
          foreach ($varArrayEmp as $key):
            if(empty($key) || $key == ' ')
            {
              $emptyDetectedEmp='true';
              echo("<script>alert('Make sure all text fields have an entry, and that you uploaded an image.')</script>");
              break;
            }
            else{
              $emptyDetectedEmp="false";
            }
          endforeach;
          if($emptyDetectedEmp != 'true'){
            // Instanciate the new product with just Image code and an ID.
            insertImageCodeEmp($ImageCode);
            //Get ID based off ImageCode
            $ID = get_ID_Emp($ImageCode);
            $result = $ID->fetch(PDO::FETCH_ASSOC);
            $ID = $result['ID'];
            insertEmpTextFields($ID, $First, $Last, $Title, $Salary);
          }
        }
        include("admin/adminAboutAdd.php");
      }

      if($action == "add_product"){
        if($adminAction == 'submit_add_form_prod'){
          $ProductName = filter_input(INPUT_POST, 'ProductName');
          $ProductCode = filter_input(INPUT_POST, 'ProductCode');
          $Price = filter_input(INPUT_POST, 'Price');
          $Stock = filter_input(INPUT_POST, 'Stock');
          $Category = filter_input(INPUT_POST, 'Category');
          $Description = filter_input(INPUT_POST, 'Description');
          $ImageCode = $_FILES['prodImg']['name'];
          $varArrayProd=[$ProductName, $ProductCode, $Price, $Stock, $Category, $Description, $ImageCode,];

          // Make sure user didn't submit any empty fields or a single space.
          foreach ($varArrayProd as $key):
            if(empty($key) || $key == ' ')
            {
              $emptyDetectedProd='true';
              echo("<script>alert('Make sure all text fields have an entry, and that you uploaded an image.')</script>");
              break;
            }
            else{
              $emptyDetectedProd="false";
            }
          endforeach;
          if($emptyDetectedProd != 'true'){
            // Instanciate the new product with just Image code and an ID.
            insertImageCode($ImageCode);
            //Get ID based off ImageCode
            $ID = get_ID($ImageCode);
            $result = $ID->fetch(PDO::FETCH_ASSOC);
            $ID = $result['ID'];
            insertProdTextFields($ProductName, $ProductCode, $Price, $Stock, $Category, $ID, $Description);
          }
        }
        include("admin/adminProductsAdd.php");
      }//End of action = "Add Product"





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
        include("cart/cart.php");
      }


      if($action == "details"){
        $ID = filter_input(INPUT_POST, 'productID');
        $product = get_product($ID);
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

        //Send the email to the admin
        include("./email/email.php");
        include("view/thankyou.php");
      }


    }//End of if "customer"
  }//End of takeMeAway

?>
