<?php
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
                    if ($categoryId) {
                        $result = mysqli_query($conn,"SELECT * FROM tbl_products WHERE cat_id = $categoryId ORDER BY product_id DESC") or die(mysqli_error($conn));
                    } else {
                        $result = mysqli_query($conn,"SELECT * FROM tbl_products ORDER BY product_id DESC") or die(mysqli_error($conn));
                    }

                    while($data = mysqli_fetch_array($result)){
                        ?>
                        <div class="article">
                        <img src="img/nkar1.jpg"/> 
                        <a class="title" href="view.php?id=<?php echo $data['product_id']; ?>"><h2><?php echo $data["product_name"]; ?></h2></a>
                        <p><?php echo $data["description"]; ?></p> 
                        <div style="clear:both;"></div>
                        </div>
                        <?php
                    }

                    
                ?>
            
            </div>
            
            <?php include('includes/html/categories.php'); ?>

        </div>
    </div>
        <div style="clear:both;"></div>
        <div class="footer">My blog 2018</div>
    
    
</body>
</html>