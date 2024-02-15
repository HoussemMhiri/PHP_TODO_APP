<?php

function getUsername()
{
    if (isset($_SESSION['user_id'])) {
        echo "Welcome $_SESSION[user_username]";
    }
}


function login_checkup_errors()
{
    if (isset($_SESSION['login_errors'])) {
        $errors = $_SESSION['login_errors'];
        echo '<br>';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['login_errors']);
    } elseif (isset($_GET['login']) && $_GET['login'] === 'success') {
        echo '<br>';
        echo '<p>Login Success</p>';
    }
}
