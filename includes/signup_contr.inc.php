<?php

function isInputEmpty($username, $email, $password)
{
    if (empty($username) || empty($email) || empty($password)) {
        return true;
    } else {
        return false;
    }
}


function isEmailInvalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


function isUsernameTaken($conn, $username)
{
    if (getuser($conn, $username)) {
        return true;
    } else {
        return false;
    }
}

function isEmailRegistered($conn, $email)
{
    if (getEmail($conn, $email)) {
        return true;
    } else {
        return false;
    }
}


function createUser($conn, $username, $email, $password)
{
    addUser($conn, $username, $email, $password);
}
