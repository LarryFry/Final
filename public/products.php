
<?php include("./view/nav.php"); ?>

    <h1>Customer's Product Page </h1>
    <div class="productsFormContainer">
      <?php foreach($products as $product) : ?>
        <div class="productsFormContainer2">
          <!-- Here is the Product Form (Goes to Details Page)-->
          <form class="productsForm" action="." method="POST">
            <div onclick="javascript:this.parentNode.submit();">
              <img src='images/<?php echo $product['ImageCode'] ?>' />
              <h2><?php echo $product['ProductName'] ?></h2>
              <h3>List Price: $<?php echo $product['Price'] ?></h3>
              <input type="hidden" name="productID" value="<?php echo $product['ID']?>" />
              <input type="hidden" name="action" value="details" />
            </div>
          </form>

          <!-- Here is the "Cart" form. (Goes to Cart Page) -->
          <form class="" action="." method="post">
            <input type="hidden" name="action" value="cart">
            <input class="cartBtn" type="submit" value="Add To Cart">
          </form>
        </div>
      <?php endforeach; ?>
    </div>


  <?php include("./view/footer.php"); ?>
