<?php

include 'db.inc.php';


$id = $_GET['id'];
$sql = "DELETE FROM `todos` WHERE id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: ../todo.php?msg=Record Deleted Successfully');
} else {

    echo 'Error: ' . mysqli_error($conn);
}
