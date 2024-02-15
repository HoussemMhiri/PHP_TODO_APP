<?php

function signup_check_errors()
{
    if (isset($_SESSION['signup_errors'])) {
        $errors = $_SESSION['signup_errors'];
        echo '<br>';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }

        unset($_SESSION['signup_errors']);
    } elseif (isset($_GET['signup']) && $_GET['signup'] === 'success') {
        echo '<p>Signup Success</p>';
    }
}
