<?php include("./view/nav.php") ?>
	<h1>Admin Add Product</h1>

	<form class="addProduct" action="." method="post">
		<div class="addProductWrapper">
			<img class="imgPreview" src="http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg" alt="Nice meme">
			<input id="chooseFile"type="file" name="name" value="">
		</div>
		<input id="addProduct" type="submit" name="name" value="Add Product">
	</form>

<?php include("./view/footer.php") ?>
