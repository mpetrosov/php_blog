<?php
include('includes/connect.php');
date_default_timezone_set('Europe/Amsterdam');
// session_start();

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
                
                
               
                <?php
                     $get_code = '';
                    if (isset($_GET['code'])){
                        $get_email = $_GET['email'];
                        $get_code = $_GET['code'];
            
                        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='".$get_email."'");
                        while($row = mysqli_fetch_assoc($query)){
                            $db_code = $row['passreset'];
                            $db_email = $row['email'];
                        }
                 
                        if ( $get_email == $db_email &&  $get_code == $db_code){

                            echo "
                                <form action='pass_resset_complete.php?code=$get_code' method='POST'>
                                Enter a new password <br><input type='password' name='newpass'><br>
                                Re-enter your password<br><input type='password' name='newpass1'><p>
                                <input type='hidden' name='email' value='$db_email'>
                                <button class='submit' name='submit' type='submit'>Update</button>
                            ";
                        }
                    }


                if (empty($_GET['code'])){
                   
                    echo "
                        <form class='pwdrecov-form' action ='forgot_password.php' method='POST'>
                        Your email <input class='pwdrecover' type='text' name='email' placeholder='email'/>
                        <button class='submit' name='submit' type='submit'>send</button>
                        </form>
                        "; 
                    if(isset($_POST['email'])) {
                        $email = $_POST['email'];
                        
                        //check if email exists
                        $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$email."'");
                        $numrow = mysqli_num_rows($query);
                        if ($numrow != 0){


                            while ($row = mysqli_fetch_assoc($query)){
                                $db_email = $row['email'];
                            }

                            if ($email == $db_email) {
                                //generate new password
                                $code = rand(10000, 1000000);

                                //send the password to the user
                                $to = $db_email;
                                $subject = "Password reset";
                                $body = "This is an automated email. Pleas do not reply to this email.
                                    Click to link here http://localhost/php_blog/forgot_password.php?code=$code&email=$email" ;
                                $headers = "From: $email";
                                
                                //update the database
                                mysqli_query($conn, "UPDATE users SET passreset='$code' WHERE email='$email'");

                                mail($to, $subject, $body, $headers);
                                // var_dump($result);
                                
                                echo "Check your email";

                            } else {
                                echo "Email is incorrect";
                            }
                        }
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
  
  <script src="engine.js"></script>
</body>
</html>