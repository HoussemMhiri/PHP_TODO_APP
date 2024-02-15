<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    try {
        include 'db.inc.php';
        include 'signup_model.inc.php';
        include 'signup_contr.inc.php';

        $errors = [];

        if (isInputEmpty($username, $email, $password)) {
            $errors['empty_sigunp'] =  'All fileds are required';
        }
        if (isEmailInvalid($email)) {
            $errors['empty_invalid'] =  'The Email is Invalid';
        }
        if (isUsernameTaken($conn, $username)) {
            $errors['username_taken'] =  'The username already existed';
        }

        if (isEmailRegistered($conn, $email)) {
            $errors['email_registered'] =  'the email already exist';
        }

        include 'session_config.inc.php';
        if ($errors) {
            $_SESSION['signup_errors'] = $errors;
            header('Location: ../register.php');
            die();
        }
        createUser($conn, $username, $email, $password);
        header('Location: ../login.php');
        die();
    } catch (Exception $e) {
        die('Invalid Query' . $e->getMessage());
    }
} else {
    /*   header('Location: ../register.php');
    die(); */
    echo 'Error';
}
