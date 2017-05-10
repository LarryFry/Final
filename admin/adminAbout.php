<?php include("./view/nav.php") ?>

<form action="." method="POST">
  <input type="submit" id="addEmp" name="name" value="Add Employee">
  <input type="hidden" name="accessType" value="admin">
  <input type="hidden" name="action" value="add_employee">
</form>
  <h1>Edit Employees</h1>
  <div class="employeeList">
    <?php foreach($employees as $employee) : ?>
      <div class="employee">
<<<<<<< HEAD
=======


>>>>>>> df3fc2281edd077211b41baa794e0c56394e4ed3
        <!-- Image Upload Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="myFile" class="myFile">
            <input type="submit" value="Upload Image">
        </form>

        <form method="POST" action="." class="editEmp">
          <img src='images/<?php echo $employee['ImageCode'] ?>'/>
          <div class="empTextBoxes">
            <p>First Name: </p><input type="text" name="FirstName" value="<?php echo $employee['FirstName'] ?>"><br/>
            <p>Last Name: </p><input type="text" name="LastName" value="<?php echo $employee['LastName'] ?>"><br/>
            <p>Title: </p><input type="text" name="Title" value="<?php echo $employee['Title'] ?>"><br/>
            <p>Salary: </p><input type="text" name="Salary" value="<?php echo $employee['Salary'] ?>"><br/>
            <input type="hidden" value="<?php echo $employee['ID'] ?>" name="ID" />
            <input type="hidden" name="accessType" value="admin">
            <input type="hidden" name="action" value="about_page">
            <input type="hidden" name="adminAction" value="edit_employee">
            <input type="submit" value="Change Employee" class="changeEmpSub"/>
          </div>
        </form>
      </div>
    <?php endforeach ?>
  </div>






  <!-- Image uploading Logic Below. -->
  <?php
  if(isset($_FILES['myFile'])){
  $file_name= $_FILES['myFile']['name'];
  echo("<br><br>$file_name");

  $file_type= $_FILES['myFile']['type'];
  echo("<br><br>$file_type");

  $file_size= $_FILES['myFile']['size'];
  echo("<br><br>$file_size<br><br>");


  $file_temp_loc = $_FILES['myFile']['tmp_name'];
  $file_store = "uploads/" . $file_name;

  if(move_uploaded_file($file_temp_loc, $file_store)){
    echo("File uploaded succesfully. Check the dir. to see them!");
    echo("<img src='$file_store'>");
    var_dump($_POST);
  }
  }
  else{
    echo("File not uploaded succesfully.<br><br>");
  }
  ?>
<?php include("./view/footer.php") ?>
