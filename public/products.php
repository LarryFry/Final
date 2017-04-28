
<?php include("./view/nav.php"); ?>

    <h1>Customer's Product Page</h1>

    <!-- Display the Products in the Database. When the form is clicked, use JS and submit it.-->
    <!-- This is hardcoded now, Larry has the dynamic way to do it. This will work for hardcode logic until we get connected to the DB and start pulling in.-->
    <?php foreach($products as $product) : ?>
      <form class="productsForm" action="." method="POST">
        <div onclick="javascript:this.parentNode.submit();">
          <img src='images/<?php echo $product['ImageCode'] ?>' />
          <h2><?php echo $product['ProductName'] ?></h2>
          <h3>List Price: <?php echo $product['Price'] ?></h3>
          <input type="hidden" name="productID" value="<?php echo $product['ID']?>" />
          <input type="hidden" name="action" value="product_detail" />
        </div>
      </form>
    <?php endforeach; ?>


  <?php include("./view/footer.php"); ?>
