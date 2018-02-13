<?php
$to      = 'marat.petrosov@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: marat.petrosov@gmail.com' . "\r\n" .
    'Reply-To: marat.petrosov@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
