<?php include("./view/nav.php") ?>

  <h1>Product Details</h1>

  <div class="productsFormContainer">
    <?php foreach($product as $prod) : ?>

        <!-- Here is the Product Form (Goes to Details Page)-->

            <img src='images/<?php echo $prod['ImageCode'] ?>' />
            <h2><?php echo $prod['ProductName'] ?></h2>
            <h3>List Price: <span style="color:green;">$<?php echo $prod['Price'] ?></span></h3>
            <h3>Quantity In Stock: <?php echo $prod['Stock'] ?> </h3>
            <h3>Description: <?php echo $prod['Description'] ?></h3>


        <!-- Here is the "Cart" form. (Goes to Cart Page) -->
        <form class="" action="." method="post">
          <input type="hidden" name="action" value="cart">
          <!-- These will be posted, and then stored in session-->
          <input type="hidden" name="prodName" value="<?php echo($prod['ProductName']);?>">
          <input type="hidden" name="prodID" value="<?php echo($prod['ID']);?>">
          <input type="hidden" name="imgCode" value="<?php echo($prod['ImageCode']);?>">
          <input type="hidden" name="price" value="<?php echo($prod['Price']);?>">
          <input type="hidden" name="desc" value="<?php echo($prod['Description']);?>">
          <input style="width:20px;"type="text" name="qty" value="1">

          <input class="cartBtn" type="submit" value="Add To Cart">
        </form>

    <?php endforeach; ?>
  </div>


<?php include("./view/footer.php"); ?>
