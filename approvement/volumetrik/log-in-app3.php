<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../src/styles/index.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
<!-- Login -->
    <div class="square">
        <div class="header"><img src="../../src/assets/BAS_logo.png" alt=""></div>
        <div class="line"><p>Login To Approve</p></div>
        <div class="login">
            <form id="loginForm" action="system/log3.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <label for="username">Username</label>
                <br>
                <input type="text" id="username" name="username" required>
                <hr><br>
                <label for="password">password</label>
                <br>
                <input type="password" id="password" name="password" required>
                <hr><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
</div>
</body>
</html>