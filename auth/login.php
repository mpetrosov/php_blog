<?php
include('../includes/connect.php');
if (!empty($_POST['email']) && !empty($_POST['password'])):
    $email = $_POST['email'];
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = $email');
    var_dump($email);
    $records->execute();
    
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])){
        die('We have a login');
    }else{
        die('There has been an error...');
    }

endif;
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

    <form action="login.php" method="POST">
        <input type="text" placeholder="Enter your email" name="email">
        <input type="password" placeholder="and password" name="password">
        <input type="submit">
    </form>
</body>
</html>