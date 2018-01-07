<?php
require 'database.php';

/*deletes a specific task with id */
if(isset($_POST['delete_task'])) {
    $st = $pdo->prepare(
        "DELETE FROM todos WHERE id = :id");
    
    $st->execute(array(
        ":id" => $_POST["delete_task"]));   

    header('Location: ../index.php?taskdeleted');
}
?>