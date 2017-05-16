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
        <div class="employeeImageForm">
          <img src='images/<?php echo $product['ImageCode'] ?>'/>
          <!-- Image Upload Form -->
          <form action="." method="POST" enctype="multipart/form-data">
              <input type="file" name="prodImg">
              <input type="hidden" name="accessType" value="admin">
              <input type="hidden" name="action" value="products_page">
              <input type="hidden" value="<?php echo $product['ID'] ?>" name="ID" />
              <input type="hidden" name="adminAction" value="edit_image">
              <input type="submit" value="Upload" class="imgUpload">
          </form>
        </div>
        <form method="POST" action=".">
          <div class="employeeTextForm">
            <p>Product Name:  </p><input type="text" name="ProductName" value="<?php echo $product['ProductName'] ?>"><br />
            <p>Product Code: </p><input type="text" name="ProductCode" value="<?php echo $product['ProductCode'] ?>" /><br />
            <p>Price: </p><input type="text" name="Price" value="<?php echo $product['Price'] ?>"><br />
            <p>Stock: </p><input type="text" name="Stock" value="<?php echo $product['Stock'] ?>"><br />
            <p>Category: </p><input type="text" name="Category" value="<?php echo $product['Category'] ?>"><br />
            <p>Description: </p><input type="text" name="Description" value="<?php echo $product['Description'] ?>"><br />
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




<!--  Move the image to the images dir.-->
  <?php
  if(isset($_FILES['prodImg'])){
    $file_name= $_FILES['prodImg']['name'];
    //echo("<br><br>$file_name");

    $file_type= $_FILES['prodImg']['type'];
  //  echo("<br><br>$file_type");

    $file_size= $_FILES['prodImg']['size'];
    //echo("<br><br>$file_size<br><br>");


   $file_temp_loc = $_FILES['prodImg']['tmp_name'];
   $file_store = "./images/" . $file_name;

    if(move_uploaded_file($file_temp_loc, $file_store)){
      echo("<script>alert('File Upload Succesful!')</script>");
      //echo("<img src='$file_store'>");

    }
    else{
        echo("<script>alert('Error Uploading File.')</script>");
      }
    }
  ?>
<?php include("./view/footer.php") ?>
