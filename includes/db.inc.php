<?php


define('HOST', 'localhost');
define('NAME', 'root');
define('PASS', '');
define('DB', 'todo_app');

$conn = new mysqli(HOST, NAME, PASS, DB);

if ($conn->connect_error) {
    die('Connection Failed' . $conn->connect_error);
}
