<?php
    session_start();
    include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel ="stylesheet" type="text/css" href="css/login_style.css">
  <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <title>Login Below</title>
</head>
<body>
    <div class="header">
        <a href="index.php">Your App Name</a>
    </div>
    <h1>Login</h1>
    <span> or <a href="register.php">register here</a></span>

    <form action="includes/login.inc.php" method="POST">
        <input type="text"  name="username" placeholder="Username/email">
        <input type="password"  name="pwd" placeholder="password">
        <input type="submit">
    </form>
</body>
</html>