<?php
include('includes/connect.php');
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
                    $result = mysqli_query($conn,
                    "SELECT product_name, product_id
                    FROM tbl_products
                    WHERE cat_id = 1") or die(mysqli_error($conn));
                    
                    while($data = mysqli_fetch_array($result)){
                        printf('
                        <div class="article">
                        <img src="img/nkar1.jpg"/> 
                        <p>%s</p> 
                        <p>%s</p>    
                        <div style="clear:both;"></div>
                        </div>
                        ',$data["product_id"], $data["product_name"]);
                    }
                ?>
            
            </div>
            
            <div class="left">
            <div class ="left_menu">
                <p class="menu_head">Category</p>
                <a href="samsung.php">Samsung</a>
                <a href="iphone.php">IPHONE</a>
                <a href="nokia.php">NOKIA</a>
                <a href="htc.php">HTC</a>
            </div>
                <div class="left_bottom">
                    <div class ="divbutton">
                        <a href="edit.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div style="clear:both;"></div>
        <div class="footer">My blog 2018</div>
    
    
</body>
</html>