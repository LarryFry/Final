<?php include("./view/nav.php") ?>
	<h1>Admin Add Product</h1>

	<div class="employee">
		<div class="employeeImageForm">
			<img src='images/<?php echo($_FILES['prodImg']['name'])?>'/>
			<!-- Image Upload Form -->
			<form action="." method="POST" enctype="multipart/form-data">
					<input type="file" name="prodImg">
					<input type="hidden" name="accessType" value="admin">
					<input type="hidden" name="action" value="add_product">
					<input type="hidden" name="adminAction" value="submit_image">
			</form>
		</div>
		<div class="employeeTextForm">
			<form method="POST" action="." class="editEmp">
					<p>Product Name: </p><input type="text" name="productName" value=""><br/>
					<p>Product Code: </p><input type="text" name="productCode" value=""><br/>
					<p>Price: </p><input type="text" name="Price" value=""><br/>
					<p>Stock: </p><input type="text" name="Stock" value=""><br/>
					<p>Category: </p><input type="text" name="Category" value=""><br/>
					<input type="hidden" name="accessType" value="admin">
					<input type="hidden" name="action" value="add_product">
					<input type="hidden" name="adminAction" value="submit_text">
					<input type="submit" value="Add Product" class="changeEmpSub"/>
			</form>
		</div>
	</div>


<!-- Move image into /images folder-->
<?php
	if(isset($_FILES['prodImg'])){
		$file_name= $_FILES['prodImg']['name'];
		$file_type= $_FILES['prodImg']['type'];
		$file_size= $_FILES['prodImg']['size'];



	 $file_temp_loc = $_FILES['prodImg']['tmp_name'];
		$file_store = "./images/" . $file_name;

		if(move_uploaded_file($file_temp_loc, $file_store)){
			//echo("<script>alert('File Upload Succesful!')</script>");
		}
		else{
				//echo("<script>alert('Error Uploading File.')</script>");
			}
		}
echo("<br><br><br>");
print_r($_FILES['prodImg']);
echo("<br><br><br>");
print_r($_POST);
?>

<?php include("./view/footer.php") ?>
