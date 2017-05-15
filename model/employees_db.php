<?php
  function get_employees() {
      global $db;
      $query = 'SELECT * FROM employees
                ORDER BY ID';
      $statement = $db->prepare($query);
      $statement->execute();
      $employees = $statement->fetchAll();
      $statement->closeCursor();
      return $employees;
  }
  function edit_employee($ID, $FirstName, $LastName, $Title, $Salary){
      global $db;
      $query = 'UPDATE employees SET FirstName = :FirstName, LastName = :LastName ,
          Title = :Title ,  Salary = :Salary
          WHERE employees.ID = :ID';
      $statement = $db->prepare($query);
      $statement -> bindValue(":FirstName", $FirstName);
      $statement -> bindValue(":LastName", $LastName);
      $statement -> bindValue(":Title", $Title);
      $statement -> bindValue(":Salary", $Salary);
      $statement -> bindValue(":ID", $ID);
      $statement -> execute();
      $statement -> closeCursor();
  }

  function change_image($ImageCode, $ID){
    global $db;
    $query = 'UPDATE employees SET ImageCode = :ImageCode
                WHERE employees.ID = :ID';
    $statement = $db->prepare($query);
    $statement -> bindValue(":ImageCode", $ImageCode);
    $statement -> bindValue(":ID", $ID);
    $statement -> execute();
    $statement -> closeCursor();
  };

  function insertEmpTextFields($ID, $First, $Last, $Title, $Salary){
    global $db;
    $query = 'UPDATE employees
  	           SET FirstName = :first , LastName = :last, Title = :title, Salary = :salary
                WHERE employees.ID = :ID';
    $statement = $db->prepare($query);
    $statement -> bindValue(":first", $First);
    $statement -> bindValue(":last", $Last);
    $statement -> bindValue(":title", $Title);
    $statement -> bindValue(":salary", $Salary);
    $statement -> bindValue(":ID", $ID);
    $statement -> execute();
    $statement -> closeCursor();
  }


  function insertImageCodeEmp($ImageCode){
    global $db;
    $query = 'INSERT INTO employees(ImageCode)
                VALUES(:ImageCode)';
    $statement = $db->prepare($query);
    $statement -> bindValue(":ImageCode", $ImageCode);
    $statement -> execute();
    $statement -> closeCursor();
  }


  function get_ID_Emp($ImageCode){
    global $db;
    $query = 'SELECT ID from employees
                where employees.ImageCode = :ImageCode';
    $statement = $db->prepare($query);
    $statement -> bindValue(":ImageCode", $ImageCode);
    $statement -> execute();
    return $statement;
    $statement -> closeCursor();
  }

?>
