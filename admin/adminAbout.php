<?php include("./view/nav.php") ?>

<form action="." method="POST">
  <input type="submit" name="name" value="Add Employee">
  <input type="hidden" name="accessType" value="admin">
  <input type="hidden" name="action" value="add_employee">
</form>
  <h1>List of Editable text boxes of employees</h1>
  <div class="employeeList">
    <?php foreach($employees as $employee) : ?>
      <div class="employee">
        <form method="POST" action=".">
          <img src='images/<?php echo $employee['ImageCode'] ?>'/>
          <p>First Name: </p><input type="text" name="FirstName" value="<?php echo $employee['FirstName'] ?>"><br />
          <p>Last Name: </p><input type="text" name="LastName" value="<?php echo $employee['LastName'] ?>"><br />
          <p>Title: </p><input type="text" name="Title" value="<?php echo $employee['Title'] ?>"><br />
          <p>Salary: </p><input type="text" name="Salary" value="<?php echo $employee['Salary'] ?>"><br />
          <input type="hidden" value="<?php echo $employee['ID'] ?>" name="ID" />
          <input type="hidden" name="accessType" value="admin">
          <input type="hidden" name="action" value="about_page">
          <input type="hidden" name="adminAction" value="edit_employee">
          <input type="submit" value="Change Employee" />
        </form>
      </div>
    <?php endforeach ?>
  </div>
<?php include("./view/footer.php") ?>
