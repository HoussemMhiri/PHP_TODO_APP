<?php
include 'db.inc.php';

$id = $_GET['id'];

$sql = "SELECT `task` FROM `todos` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Invalid Query' . $conn->error);
}

$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = filter_input(INPUT_POST, 'task', FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "UPDATE `todos` SET `task`='$task' WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: ../todo.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Edit Task</h2>
    <form action="" method="post">
        <label for="task">Your Task: </label>
        <input type="text" name="task" id="" value="<?php echo $row['task'] ?>">
        <button type="submit">Submit</button>
    </form>
</body>

</html>