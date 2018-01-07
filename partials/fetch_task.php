<?php
require 'database.php';

/*Fetches all tasks (completed and uncompleted) and sorts them after id*/
$st1 = $pdo->prepare("SELECT * FROM todos WHERE completed = 0 ORDER BY id DESC");
$st1->execute();
$tasks = $st1->fetchAll(PDO::FETCH_ASSOC);

$st2 = $pdo->prepare("SELECT * FROM todos WHERE completed = 1 ORDER BY id DESC");
$st2->execute();
$completedtask = $st2->fetchAll(PDO::FETCH_ASSOC);

?>