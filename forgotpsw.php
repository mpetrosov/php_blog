<?php
include('includes/connect.php');
date_default_timezone_set('Europe/Amsterdam');
session_start();

// $categoryId = isset($_GET['cat_id']) ? $_GET['cat_id'] : null;
// try {
//     $categoryId = (int)$categoryId;
// } catch(Exception $err) {
//     $categoryId = null;
// }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My  blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="comments/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    
    
</head>
<body>
    <div class="wrapper">
        <div class="header">
           <a href="index.php"> <img id="logo" src="img/blog_header.jpg" /></a>
        </div>
        <div class="content">
            <div class="right" id="right">
                <!-- <span id="pwdo-rec" class="switch-forms">password recoveryo</span> -->
                <form class="pwdrecov-form" action ="forgotpsw.php" method="POST">
                    Your email <input class="pwdrecover" type="text"  name="email" placeholder="email"/>
                    <button class="submit" name="submit" type="submit">send</button>
                </form> 
                <!-- <form class="pwdrecov-form hidden" action="includes/pwd_recover.inc.php" method="POST">
                    <input class="pwdrecover" type="text"  name="email" placeholder="email"/>
                    <button class="submit" type="submit">send</button>
                </form>  -->
                <?php

                 if(isset($_POST['email'])) {
                    $email = $_POST['email'];
                    
                    //check if email exists
                    $email_check = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$email."'");
                    $count = mysqli_num_rows($email_check);
                    if ($count != 0 || true){
                            //generate new password
                            $random = rand(72891, 92729);
                            $new_password = $random;

                            //create a copy of new password
                            $email_password = $new_password;

                            //encrypt the new password
                            $new_password = md5($new_password);

                            //update the database
                            // mysqli_query($conn, "update users set password='".$new_password."' WHERE email='".$email."'");

                            //send the password to the user
                            $subject = "Login Information";
                            $message = "Your password has been changed to $email_password";
                            $headers = "From: $email";

                            mail($email, $subject, $message, $headers);
                            echo "Your new password has been sent to you.";
                    
                        } else {
                            echo "This email does not exist.";
                        }
                    
                 }
                ?>  
               
            </div>
            
            <?php 
            global $ajaxLoadProducts;
            $ajaxLoadProducts = 'true';
            include('categories.php'); 
            ?>

        </div>
    </div>
        <div style="clear:both;"></div>
        <div class="footer">My blog 2018</div>
    
        <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  
  <script src="comments/main.js"></script>
</body>
</html>