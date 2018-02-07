<?php
include('includes/connect.php');
include('comments/comments.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My  blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="header">
           <a href="index.php"> <img id="logo" src="img/blog_header.jpg" /></a>
        </div>
        <div class="content">
            <div class="right"> 
                <?php
                    $id = (isset($_GET["id"]) && $_GET["id"])  ? mysqli_real_escape_string($conn, $_GET["id"]) : die('No id specified');

                    $result = mysqli_query($conn,"SELECT * FROM tbl_products WHERE product_id=$id") or die(mysqli_error($conn));
                    $commentsAllowed = null;
                    $data = mysqli_fetch_array($result);
                ?>
                            <div>
                                <h1><?php echo $data["product_name"]; ?></h1>
                                <p><?php echo $data["description"]; ?></p>
                            </div>
                <?php
                if ((bool)$data['able_comments']) {
                ?>
                    <form method="POST" action='/php_blog/comments/index.php?next=<?php echo $_SERVER['REQUEST_URI']; ?><?php echo setComments($conn); ?>'>
                        <input type="hidden" name='uid' value='Anonymous'>
                        <input type="hidden" name='product_id' value="<?php echo $id; ?>">
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="checkbox" name="able_comments" checked>   
                        <textarea name="message"></textarea><br>
                        <button type="submit" name='commentSubmit'>Comment</button>
                    </form>
                <?php
                }
                ?>
                    <?php include('includes/html/comments.php'); ?>

            </div>
        
            <?php include('includes/html/categories.php'); ?>

        </div>
    </div>
        <div style="clear:both;"></div>
        <div class="footer">My blog 2018</div>
    
    
</body>
</html>