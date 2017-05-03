<?php include("./view/nav.php") ?>
	<h1>Admin Add Product</h1>

	<form class="addProduct" action="." method="post">
		<div class="addProductWrapper">
			<img class="imgPreview" src="http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg" alt="Nice meme">
			<input id="chooseFile"type="file" name="name" value="">
			<?php


				$target_dir = "C:\\xampp\htdocs\Final\images";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "File is not an image.";
				        $uploadOk = 0;
				    }
				}

				
			?>
		</div>
		<input id="addProduct" type="submit" name="name" value="Add Product">
	</form>

<?php include("./view/footer.php") ?>
