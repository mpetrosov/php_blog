<?php
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
    <title>Register Below</title>
</head>
<body>
    <div class="header">
        <a href="index.php">Your App Name</a>
    </div>

    <h1>Register</h1>
    <span> or <a href="login.php">login here</a></span>

    <form action="includes/register.inc.php" method="POST">
        <input type="text" name="email" placeholder="example@example.com" >
        <input type="text" name="username" placeholder="Username" >
        <input type="password" name="pwd" placeholder="Password" >
        <input type="submit">
    </form>
</body>
</html>