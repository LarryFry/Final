<?php include("./view/nav.php") ?>

<form action="." method="POST">
  <input type="submit" name="name" value="Add Employee">
  <input type="hidden" name="accessType" value="admin">
  <input type="hidden" name="action" value="add_employee">
</form>
  <h1>List of Editable text boxes of employees</h1>

<?php include("./view/footer.php") ?>
