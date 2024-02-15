<?php


function geUser($conn, $email)
{
    $sql = 'SELECT * FROM users WHERE email= ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();


    return $row !== null ? $row : false;
}
