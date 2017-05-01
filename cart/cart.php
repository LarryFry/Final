]<?php
  include("./view/nav.php");
  session_start();
?>

    <h1>This is the cart.</h1>

    <!-- Echo out all of the $_SESSION[cart] Items-->
    <?php
      //Retrieve the information form that product's submitted form

      //if qty is a number, execute the code below. (if qty > 0 can be the condition)
      $link = $_POST['prodID'];
      $prodName = $_POST['prodName'];
      $prodImg = $_POST['imgCode'];
      $prodPrice = $_POST['price'];
      $quantity = $_POST['qty'];

      //Set the corresponding $_SESSION with the $_POST
      $_SESSION['cart'][$link]['name'] = $prodName;
      $_SESSION['cart'][$link]['price'] = $prodPrice;
      $_SESSION['cart'][$link]['img'] = $prodImg;
      $_SESSION['cart'][$link]['qty'] = $quantity;

    ?>
      <!-- Print out Cart Contents-->
     <?php foreach($_SESSION['cart'] as $item => $key) : ?>
       <div class="cartItem">
           <img src="./images/<?php echo $_SESSION['cart'][$item]['img']?>" alt="Sorry for the broken picture. We'll make sure to fire someone.">
           <div class="cartItemHeader">
           <?php echo '<h2 >' . $_SESSION['cart'][$item]['name'].'</h2>'?>
           <?php echo '<h2 class=price>$'.$_SESSION['cart'][$item]['price'].'</h2>'?>
         </div>
         <div class="qtyBoxAndLabel">
           <h3>Qty</h3>
           <input class="cartQtyBox"type="text" name="cartQty" value="<?php echo($_SESSION['cart'][$item]['qty'])?>">
         </div>
       </div>
     <?php endforeach; ?>





    <!-- Debuggin -->
    <?php
      echo("<br><br><br><b>Here is session:</b> ");
      Print_r($_SESSION);
      echo("<br><br><br><b>Here is Post:</b> ");
      Print_r($_POST);


    ?>
<?php include("./view/footer.php"); ?>
