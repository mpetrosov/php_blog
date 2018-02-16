<?php
    date_default_timezone_set('Europe/Amsterdam');
    

    include 'comments.inc.php';
    include('../includes/connect.php');
    setComments($conn);   
    deleteComments($conn);     
    getComments($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Document</title>
</head>
<body>

<?php
    echo "<form method='POST' action=''>
        <input type='hidden' name='uid' value='Anonymous'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>        
        <textarea id='comment' name='message'></textarea><br>
        <button type='submit' name='commentSubmit'>Comment</button>
    </form>";

    
    
?>

</body>
</html>

