<?php
  include("./view/nav.php");
  session_start();
  ?>

    <h1>Customer's Product Page </h1>
    <div class="productsFormContainer">
      <?php foreach($products as $product) : ?>
        <div class="productsFormContainer2">
          <!-- Here is the Product Form (Goes to Details Page)-->
          <form class="productsForm" action="." method="POST">
            <div onclick="javascript:this.parentNode.submit();">
              <img src='images/<?php echo $product['ImageCode'] ?>' />
              <h2><?php echo $product['ProductName'] ?></h2>
              <h3>List Price: <span style="color:green;">$<?php echo $product['Price'] ?></span></h3>
              <h3>Quantity In Stock: <?php echo $product['Stock'] ?> </h3>
              <input type="hidden" name="productID" value="<?php echo $product['ID']?>" />
              <input type="hidden" name="action" value="details" />
            </div>
          </form>

          <!-- Here is the "Cart" form. (Goes to Cart Page) -->
          <form class="" action="." method="post">
            <input type="hidden" name="action" value="cart">

            <!-- These will be posted, and then stored in session-->
            <input type="hidden" name="prodName" value="<?php echo($product['ProductName']);?>">
            <input type="hidden" name="prodID" value="<?php echo($product['ID']);?>">
            <input type="hidden" name="imgCode" value="<?php echo($product['ImageCode']);?>">
            <input type="hidden" name="price" value="<?php echo($product['Price']);?>">
            <input style="width:20px;"type="text" name="qty" value="1">

            <input class="cartBtn" type="submit" value="Add To Cart">
          </form>
        </div>
      <?php endforeach; ?>
    </div>


  <?php include("./view/footer.php"); ?>
