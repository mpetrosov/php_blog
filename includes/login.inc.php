<?php
    session_start();

    if (isset($_POST['submit']) || true) {
        include_once 'connect.php';

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        //Error handlers
        //Check for empty fields
        if ( empty($username) ||empty($pwd)){
            header("Location: ../index.php?login=empty");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck < 1){
                header("Location: ../index.php?login=error");
                exit();
            } else {
                if ($row = mysqli_fetch_assoc($result)){
                    //De-hashing the password
                    $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                    if ($hashedPwdCheck == false){
                        header("Location: ../index.php?login=error");
                        exit();
                    } elseif ($hashedPwdCheck == true) {
                        //Log in the user here 
                        $_SESSION['u_id'] = $row['user_id'];
                        $_SESSION['u_email'] = $row['email'];
                        $_SESSION['u_username'] = $row['username'];
                        $_SESSION['u_is_admin'] = $row['is_admin'];
                        header("Location: ../index.php?login=success");
                        exit();
                    }
                }
            }
        }
    } else {
        header("Location: ../index.php?login=error");
        exit();
    }
