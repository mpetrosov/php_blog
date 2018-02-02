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
            <div class="left"> 
                <?php
                    $result = mysqli_query($conn,"SELECT * FROM articles") or die(mysqli_error($conn));
                    
                    while($data = mysqli_fetch_array($result)){
                        printf('
                        <div class="article">
                        <img src="img/nkar1.jpg"/> 
                        <a class="title" href ="#"><h2>%s</h2></a> 
                            <p>%s<a href="view.php?id=%s">read more..</a></p>
                        <div style="clear:both;"></div>
                        </div>
                        ',$data["title"], $data["teaser"], $data["id"]);
                    }
                ?>
            
            </div>
            
            <div class="right">
                <div class ="right_menu">
                    <a href="##">Category</a>
                    <a href="##">Articles</a>
                    <a href="##">Video</a>
                    <a href="##">Pfoto</a>
                </div>
                <div class="right_bottom">
                    <div class ="divbutton">
                        <a href="edit.php">POST</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div style="clear:both;"></div>
        <div class="footer">My blog 2018</div>
    
    
</body>
</html>