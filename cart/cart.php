<?php
  include("./view/nav.php");
  session_start();
?>

    <h1>Cart</h1>

    <!-- Echo out all of the $_SESSION[cart] Items-->
    <?php
      //Retrieve the information form that product's submitted form
      //Determine whether they're here from the cart or from the nav's "cart" link.
      $fromNav = filter_input(INPUT_GET, 'fromNav');
      if(!isset($fromNav)){
        $fromNav = filter_input(INPUT_POST, 'fromNav');
      }

      if($fromNav != 'yes'){
        $link = $_POST['prodID'];
        $prodName = $_POST['prodName'];
        $prodImg = $_POST['imgCode'];
        $prodPrice = $_POST['price'];
        $quantity = $_POST['qty'];
        $description = $_POST['desc'];
      }


      //Set the corresponding $_SESSION with the $_POST
      if($fromNav != 'yes'){
        $_SESSION['cart'][$link]['name'] = $prodName;
        $_SESSION['cart'][$link]['price'] = $prodPrice;
        $_SESSION['cart'][$link]['img'] = $prodImg;
        $_SESSION['cart'][$link]['qty'] = $quantity;
        $_SESSION['cart'][$link]['desc'] = $description;
      }

    ?>
     <form action="." method="POST">
      <!-- Print out Cart Contents-->
      <?php if(isset($_SESSION['cart'])){ ?>
        <?php foreach($_SESSION['cart'] as $item => $key) : ?>
          <div class="cartItem">
              <img src="./images/<?php echo $_SESSION['cart'][$item]['img']?>" alt="Sorry for the broken picture.">
              <div class="cartItemHeader">
              <?php echo '<h2>' . $_SESSION['cart'][$item]['name'].'</h2>'?>
              <?php echo '<h2 class=price>$'.$_SESSION['cart'][$item]['price'].'</h2>'?>
              <?php echo '<h2 class="desc">' . $_SESSION['cart'][$item]['desc'].'</h2>'?>
            </div>
            <div class="qtyBoxAndLabel">
              <h3>Qty</h3>
              <input class="cartQtyBox" id="cartQtyBox" type="text" name="cartQty" value="<?php echo($_SESSION['cart'][$item]['qty'])?>">
            </div>
          </div>
        <?php endforeach; ?>
        <?php  } ?>

      <input type="hidden" name="productNames" value="<?php $_SESSION['cart'][$item]['name'] ?>" />
      <input type="hidden" name="productQty" value="<?php $_SESSION['cart'][$item]['qty'] ?>" />
      <input type="hidden" name="action" value="thank_you" />
      <input type="hidden" name="accessType" value="customer" />
      <input type="submit" value="Check Out!" />
    </form>




    <!-- Debuggin -->
    <?php
      //echo("<br><br><br><b>Here is session:</b> ");
      //Print_r($_SESSION);
      //echo("<br><br><br><b>Here is Post:</b> ");
      //Print_r($_POST);
    ?>

<?php include("./view/footer.php"); ?>
