<?php include("./view/nav.php") ?>
<form action="." method="POST">
  <input type="hidden" name="action" value="add_product">
  <input type="hidden" name="accessType" value="admin">
  <input type="submit" value="Add Product" style="float: right;">
</form>
  <h1>Edit Products</h1>
  <div class="employeeList">
    <?php foreach($products as $product) : ?>
      <div class="employee">
        <form method="POST" action=".">
          <img src='images/<?php echo $product['ImageCode'] ?>'/>
          <div class="employeeTextForm">
            <p>Product Name:  </p><input type="text" name="ProductName" value="<?php echo $product['ProductName'] ?>"><br />
            <p>Product Code: </p><input type="text" name="ProductCode" value="<?php echo $product['ProductCode'] ?>" /><br />
            <p>Price: </p><input type="text" name="Price" value="<?php echo $product['Price'] ?>"><br />
            <p>Stock: </p><input type="text" name="Stock" value="<?php echo $product['Stock'] ?>"><br />
            <p>Category: </p><input type="text" name="Category" value="<?php echo $product['Category'] ?>"><br />
            <input type="hidden" value="<?php echo $product['ID'] ?>" name="ID" />
            <input type="hidden" name="accessType" value="admin">
            <input type="hidden" name="action" value="products_page">
            <input type="hidden" name="adminAction" value="edit_product">
            <input type="submit" value="Change Product" class="changeEmpSub"/>
          </div>
        </form>
        <form class="" action="." method="post">
          <input type="hidden" value="<?php echo $product['ID'] ?>" name="ID" />


          <input type="hidden" name="accessType" value="admin">
          <input type="hidden" name="action" value="products_page">
          <input type="hidden" name="adminAction" value="delete_prod">
          <input type="submit" name="" value="Delete Product">
        </form>
      </div>
    <?php endforeach ?>
  </div>
<?php include("./view/footer.php") ?>
