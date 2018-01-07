<?php
    require 'partials/head.php';
    require 'partials/database.php';
    require 'partials/functions.php';
    require 'partials/fetch_task.php';

?>

<div class="list_container">
       
    <header>
        <h1>THE TO DO LIST</h1>
        <h2>GET YOUR SHIT DONE!</h2>
    </header> 
    
    <div class="new_task_container">
        <form action="partials/add_task.php" method="POST">
            <h3>Enter new to do:</h3>  
            
            <label for="title">To do</label>
            <input id="title" type="text" name="title" autocomplete="off" placeholder="Ex. Clean room" required><br>
            <label for="addedBy">Name</label>
            <input type="text" name="createdBy" autocomplete="off" placeholder="Ex. McFly" required><br>
            
            <label for="priority">Priority</label><br>
            <select id="priority" class="custom-select" name="priority">
                <option class="btn" value="high">High</option>
                <option class="btn" value="medium">Medium</option>
                <option class="btn" value="low">Low</option>
            </select>
            
            <input id="addedBy" class="submit" type="submit" name="submit" value="Add">
            
        </form> 
        <p><?php message(); ?></p>
    </div> <!--end container -->
      
<?php  
     
foreach($tasks as $task) {  ?>
    <ul class="task_container">
        <li class="task">
            <span>To do: </span><?= $task["title"]; ?>
            <br>
            <span>Name: </span><?= $task["createdBy"]; ?>
            <br>
            <span>Priority: </span><?= $task["priority"]; ?>
            <br>

            <div class="btn_container">
                <form class="btn_box" action="partials/completed.php" method="POST">
                    <input type="hidden" value="<?= $task['id'];?>" name="completed">
                    <input class="action_btn" type="submit" value="Done">
                </form>


                <form class="btn_box" action="partials/delete_task.php" method="POST">
                    <input type="hidden" value="<?= $task['id'];?>" name="delete_task">
                    <input class="action_btn delete_btn" type="submit" value="Delete">
                </form>

                <form class="btn_box" action="partials/edit.php" method="POST">
                    <label for="edit">Edit task:</label>
                    <input type="hidden" value="<?= $task['id'];?>" name="edit">
                    <input id="edit" type="text" name="title" required>
                    <input class="action_btn edit_btn" type="submit" value="Edit">
                </form>

                <div class="clear"></div>
            </div><!--end btn container-->
            
        </li>
    </ul>    
     <?php } ?>

    <div class="done_container">
        <h3>Done</h3>
        <!--Loops out the "done tasks" that has the value 1 in 'completed'-->
        <?php
        foreach($completedtask as $task){ ?>
            <ul class="task_container">
                <li class="task done">
                    <span>To do: </span><?= $task["title"]; ?>
                    <br>
                    <span>Name: </span><?= $task["createdBy"]; ?>
                </li>
            </ul>
        <?php } ?>
    </div>
    
</div><!--end list container-->  
  
<?php
    require 'partials/footer.php';
?>