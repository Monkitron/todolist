<?php
require 'database.php';

/*Checks if there are any duplets, if not the content will be saved in the database*/
if(isset($_POST["submit"]) && isset($_POST["title"]) && isset($_POST["createdBy"]) && isset($_POST["priority"])) {
    
    $statement = $pdo->prepare(
        "SELECT * FROM todos WHERE title = :title");
    
    $statement->execute(array(
        ":title" => $_POST["title"]));
    
    $count = $statement->rowCount();
    
    if($count > 0){
        header('location: ../index.php?tryagain');
        
    }else{
    
    $st = $pdo->prepare(
        "INSERT INTO todos (title, createdBy, priority) 
        VALUES (:title, :createdBy, :priority)"
    );
    
    $st->execute(array(
        ":title"        => $_POST["title"],
        ":createdBy"    => $_POST["createdBy"],
        ":priority"     => $_POST["priority"]));

    header('Location: ../index.php?taskadded');
    } 
}