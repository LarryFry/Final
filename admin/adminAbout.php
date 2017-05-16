<?php include("./view/nav.php") ?>
<!-- Image uploading Logic Below. -->

<form action="." method="POST">
  <input type="submit" id="addEmp" name="name" value="Add Employee" style="float:right;">
  <input type="hidden" name="accessType" value="admin">
  <input type="hidden" name="action" value="add_employee">
</form>
  <h1>Edit Employees</h1>
  <div class="employeeList">
    <?php foreach($employees as $employee) : ?>
      <div class="employee">
        <div class="employeeImageForm">
          <img src='images/<?php echo $employee['ImageCode'] ?>'/>
          <!-- Image Upload Form -->
          <form action="." method="POST" enctype="multipart/form-data">
              <input type="file" name="empImg">
              <input type="hidden" name="accessType" value="admin">
              <input type="hidden" name="action" value="about_page">
              <input type="hidden" value="<?php echo $employee['ID'] ?>" name="ID" />
              <input type="hidden" name="adminAction" value="edit_image">
              <input type="submit" value="Upload" class="imgUpload">
          </form>
        </div>
        <div class="employeeTextForm">
          <form method="POST" action="." class="editEmp">
              <p>First Name: </p><input type="text" name="FirstName" value="<?php echo $employee['FirstName'] ?>"><br/>
              <p>Last Name: </p><input type="text" name="LastName" value="<?php echo $employee['LastName'] ?>"><br/>
              <p>Title: </p><input type="text" name="Title" value="<?php echo $employee['Title'] ?>"><br/>
              <p>Salary: </p><input type="text" name="Salary" value="<?php echo $employee['Salary'] ?>"><br/>
              <input type="hidden" value="<?php echo $employee['ID'] ?>" name="ID" />
              <input type="hidden" name="accessType" value="admin">
              <input type="hidden" name="action" value="about_page">
              <input type="hidden" name="adminAction" value="edit_employee">
              <input type="submit" value="Change Employee" class="changeEmpSub"/>
          </form>
          <!--  Delete Form -->
          <form class="" action="." method="post">
            <input type="hidden" value="<?php echo $employee['ID'] ?>" name="ID" />


            <input type="hidden" name="accessType" value="admin">
            <input type="hidden" name="action" value="about_page">
            <input type="hidden" name="adminAction" value="delete_emp">
            <input type="submit" name="" value="Delete Employee">
          </form>
        </div>
      </div>
    <?php endforeach ?>
  </div>



  <!--  Move the image to the images dir.-->
    <?php
    if(isset($_FILES['empImg'])){
      $file_name= $_FILES['empImg']['name'];
      //echo("<br><br>$file_name");

      $file_type= $_FILES['empImg']['type'];
    //  echo("<br><br>$file_type");

      $file_size= $_FILES['empImg']['size'];
      //echo("<br><br>$file_size<br><br>");


     $file_temp_loc = $_FILES['empImg']['tmp_name'];
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
