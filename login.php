<?php
include './includes/db.inc.php';
include './includes/login_view.inc.php';
include './includes/session_config.inc.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Login</h1>
    <form action="includes/login.inc.php" method="post">
        <div class="m-3">
            <label for="email" class="mx-3">email</label>
            <input type="email" name="email" id="">
        </div>
        <div class="m-3">
            <label for="password">password</label>
            <input type="password" name="password" id="">
        </div>
        <button type="submit">Submit</button>
    </form>
    <?php login_checkup_errors()  ?>


    <a href="/register.php"> <button>Register</button></a>
</body>

</html>