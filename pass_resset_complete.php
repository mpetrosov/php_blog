<?php
    include('includes/connect.php');


    $newpass = $_POST['newpass'];
    $newpass1 = $_POST['newpass1'];
    $post_email = $_POST['email'];
    $code = $_GET['code'];

    //validation
    if($newpass == $newpass1){
        
        $enc_pass = md5($newpass);
        mysqli_query($conn, "UPDATE users SET password='$enc_pass' WHERE email='$post_email'");
        mysqli_query($conn, "UPDATE users SET passreset='0' WHERE email='$post_email'");

        echo"Your password has been updated<p><a href='http://localhost/php_blog/index.php'>Click here to login</a></p>";

    } else {
        echo "Passwords must match <a href='forgot_password.php?code=$code&email=$post_email'>Click here  to go back</a>";
    }


?>