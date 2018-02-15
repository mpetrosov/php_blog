<?php
include_once('includes/session.inc.php');
include('includes/connect.php');
date_default_timezone_set('Europe/Amsterdam');

$categoryId = isset($_GET['cat_id']) ? $_GET['cat_id'] : null;
try {
    $categoryId = (int)$categoryId;
} catch(Exception $err) {
    $categoryId = null;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My  blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="screen" href="comments/style.css" />
</head>
<body>
    <div class="wrapper">
        <div class="header">
           <a href="index.php"> <img id="logo" src="img/blog_header.jpg" /></a>
        </div>
        <div class="content">
            <div class="right" id="right"> 
                <?php include('load_products.php'); ?>
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
  crossorigin="anonymous">
  </script>
    <!-- <script src="comments/main.js"></script> -->
    <script src="engine.js"></script>
</body>
</html>