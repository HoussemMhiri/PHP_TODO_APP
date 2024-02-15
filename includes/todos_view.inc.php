<?php


function task_checkup_errors()
{
    if (isset($_SESSION["task_errors"])) {
        $error = $_SESSION["task_errors"];
        echo '<br>';

        echo '<p>' . $error . '</p>';
    } elseif (isset($_GET['todo']) && $_GET['todo'] === 'success') {
        echo '<br>';
        echo '<p>Todo add it successfully</p>';
        echo '<meta http-equiv="refresh" content="3;url=../todo.php">';
    }
}
