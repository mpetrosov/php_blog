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
                    $id = (isset($_GET["id"]) && $_GET["id"])  ? mysqli_real_escape_string($conn, $_GET["id"]) : die('No id specified');

                    $result = mysqli_query($conn,"SELECT * FROM articles WHERE id=$id") or die(mysqli_error($conn));
                    // $data = mysqli_fetch_array($result);
                    
                    while($data = mysqli_fetch_array($result)){
                        printf('
                            <div>
                                <h1>%s</h1>
                                <p>%s</p>
                            </div>
                        ',$data["title"],$data["text"]);
                    }
                    

                ?>
            
            </div>
            
            <div class="left">
                <div class ="left_menu">
                    <a href="##">Category</a>
                    <a href="##">Articles</a>
                    <a href="##">Video</a>
                    <a href="##">Pfoto</a>
                </div>
            </div>
        </div>
    </div>
        <div style="clear:both;"></div>
        <div class="footer">My blog 2018</div>
    
    
</body>
</html>