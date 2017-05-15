<?php include("./view/nav.php") ?>
	<h1>Admin About Add</h1>

	<div class="empAddFormContainer">
		<div class="empAddForm">
			<img src='images/<?php echo($_FILES['empImg']['name'])?>' alt="Choose An Image"/>
			<!-- Image Upload Form -->
			<form action="." method="POST" enctype="multipart/form-data" class="addEmp">
					<input type="file" name="empImg" class="chooseFile">
					<input type="hidden" name="accessType" value="admin">
					<input type="hidden" name="action" value="add_employee">
					<input type="hidden" name="adminAction" value="submit_add_form">

					<p>First Name:</p><input type="text" name="First" value=""><br/>
					<p>Last Name:</p><input type="text" name="Last" value=""><br/>
					<p>Title:</p><input type="text" name="Title" value=""><br/>
					<p>Salary</p><input type="text" name="Salary" value=""><br/>
					<input type="submit" value="Add Employee" class="changeEmpSub"/>
			</form>
		</div>
	</div>

<!-- Move image into /images folder -->
<?php
	if(isset($_FILES['empImg'])){
		$file_name= $_FILES['empImg']['name'];
		$file_type= $_FILES['empImg']['type'];
		$file_size= $_FILES['empImg']['size'];


	 $file_temp_loc = $_FILES['empImg']['tmp_name'];
		$file_store = "./images/" . $file_name;

		if(move_uploaded_file($file_temp_loc, $file_store)){
			//echo("<script>alert('File Upload Succesful!')</script>");
		}
		else{
				//echo("<script>alert('Error Uploading File.')</script>");
			}
		}
?>

<?php include("./view/footer.php") ?>
