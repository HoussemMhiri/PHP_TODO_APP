<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_SPECIAL_CHARS);
    try {
        include 'db.inc.php';
        include 'todos_model.inc.php';
        include 'todos_contr.inc.php';



        $errors = [];
        if (isTaskEmpty($task)) {
            $errors['no_task'] =  'You should add a Task';
        }

        include 'session_config.inc.php';
        if ($errors) {
            $_SESSION["task_errors"] = $errors;
            header('Location: ../todo.php');
            die();
        }

        $userId = $_SESSION['user_id'];

        $todo = createTask($conn, $task, $userId);
        header('Location: ../todo.php?todo=success');
        die();
    } catch (Exception $e) {
        die("Invalid Query" . $e->getMessage());
    }
} else {
    header('Location: ../todo.php');
    die();
}
