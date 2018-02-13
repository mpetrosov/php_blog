<?php
    include('../includes/connect.php');
    $message='';


    if (!empty($_POST['email']) && !empty($_POST['password'])){
        // enter the new user in the database
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $email = $_POST['email'];
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        
        $stmt = $conn->prepare($sql);
        // $stmt->bindParam(':email', $_POST['email']);
        // $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

        if ($stmt->execute() ){
            $message = 'Successfully created new user';
        }else{
            $message = 'Sorry there must be an issue creating your acount';
        }
    }
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
<?php if (!empty($message)); ?>
    <p><?php echo $message; ?></p>

    <h1>Register</h1>
    <span> or <a href="login.php">login here</a></span>

    <form action="register.php" method="POST">
        <input type="text" placeholder="Enter your email" name="email">
        <input type="password" placeholder="and password" name="password">
        <input type="password" placeholder="confirm password" name="confirm_password">
        <input type="submit">
    </form>
</body>
</html>