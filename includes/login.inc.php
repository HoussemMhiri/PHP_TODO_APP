<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    try {
        include 'db.inc.php';
        include 'login_model.inc.php';
        include 'login_contr.inc.php';

        $errors = [];
        if (isInputEmpty($email, $password)) {
            $errors['input_empty'] = 'All Fields are required';
        }
        $result = geUser($conn, $email);

        if (isEmailNotRegistered($result)) {
            $errors['invalid_email'] = 'wrong email';
        }
        if (!isEmailNotRegistered($result) && isPasswordInvalid($password, $result['password'])) {
            $errors['invalid_password'] = 'wrong password';
        }

        include 'session_config.inc.php';
        if ($errors) {
            $_SESSION['login_errors'] = $errors;
            header('Location: ../login.php');
            die();
        }

        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_username'] = $result['username'];
        header('Location: ../todo.php?login=success');
        die();
    } catch (Exception $e) {
        die('Invalid Query' . $e->getMessage());
    }
} else {
    header('Location: ../login.php');
    die();
}
