<?php



function isInputEmpty($email, $password)
{
    if (empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}


function isEmailNotRegistered($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}


function isPasswordInvalid($password, $hashedPassword)
{
    if (!password_verify($password, $hashedPassword)) {
        return true;
    } else {
        return false;
    }
}
