<?php
require 'database.php';

/*Updates a task in the database column 'completed', it changes the value 0 to 1*/
    $st = $pdo->prepare("UPDATE todos SET completed = '1' WHERE id = :completed"); 
    $st->execute(array
    (
        ":completed" => $_POST["completed"],
    ));

    header('Location: ../index.php?completed');
 
?>