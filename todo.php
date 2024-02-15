<?php
include './includes/db.inc.php';
include './includes/login_view.inc.php';
include './includes/todos_view.inc.php';
include './includes/session_config.inc.php';

$userId = $_SESSION['user_id'];


$sql = "SELECT * FROM `todos` WHERE userId = $userId";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Invalid query' . $conn->error);
}

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1><?php getUsername() ?> </h1>
    <h2>Your Todos:</h2>

    <form action="includes/todos.inc.php" method="post">
        <input type="text" name="task" id="">
        <button>Add</button>
    </form>

    <?php task_checkup_errors()  ?>


    <div>
        <?php foreach ($rows as $row) : ?>
            <div class="d-flex mt-4">
                <?php if ($row['done']) : ?>

                    <div class="mx-2">
                        <input type="checkbox" name="task" id="" checked>
                        <label for="task" class="check"><?php echo $row['task'] ?></label>
                    </div>



                <?php elseif (!$row['done']) :  ?>
                    <div class="mx-2">
                        <input type="checkbox" name="task" id="">
                        <label for="task"><?php echo $row['task'] ?></label>
                    </div>

                <?php endif;  ?>

                <div>
                    <a href=" includes/edit_todo.inc.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Edit</a>
                    <a href="includes/delete_todo.inc.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        <?php endforeach ?>


    </div>

    <a href="includes/logout.inc.php"> <button>logout</button></a>
</body>

</html>