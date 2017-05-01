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
?>
