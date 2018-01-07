<?php
require 'database.php';

if(isset($_POST["title"], $_POST["edit"])) {
    
    $statement = $pdo->prepare(
        "SELECT * FROM todos WHERE title = :title");
    
    $statement->execute(array(
        ":title" => $_POST["title"]));
    
    $count = $statement->rowCount();
    
    if($count > 0){
        header('Location: ../index.php?edit fail');
        
    }else {
        
    $st = $pdo->prepare(
        "UPDATE todos SET title = :title WHERE id = :id");
 
    $st->execute(array(
        ":id" => $_POST["edit"],
        ":title" => $_POST["title"]));

        header('Location: ../index.php?edit sucess');
   }

}
