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

?>
