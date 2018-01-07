<?php
require 'partials/database.php';

/*Show a message that a task has been added to the list*/
function message() {
    if (isset($_GET["taskadded"])) {
        echo '<p>Woop woop! Task added <i class="fa fa-hand-peace-o" aria-hidden="true"></i></p>';
        
    }if (isset($_GET["tryagain"])) {
        echo '<p style="color: #F00;">Already on the list, add another task!</p>';
    
    }else 
        echo "";
}