<?php
    date_default_timezone_set('Europe/Amsterdam');
    include 'comments.inc.php';
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="main.js"></script>
    <title>Document</title>
</head>
<body>
    
<?php
    $cid = $_POST['cid'];
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    echo "<form method='POST' action='".editComments($conn)."'>
        <input type='hidden' name='cid' value='".$cid."'>
        <input type='hidden' name='uid' value='".$uid."'>
        <input type='hidden' name='date' value='".$date."'>        
        <textarea id='comment' name='message'>".$message."</textarea><br>
        <button type='submit' name='commentSubmit'>Edit</button>
    </form>";

?>
</body>
</html>

