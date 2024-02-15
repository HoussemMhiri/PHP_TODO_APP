<?php


function createTask($conn, $task, $userId)
{
    $done = 0;
    $sql = "INSERT INTO todos (userId, task, done ) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isi', $userId, $task, $done);
    $stmt->execute();
}
