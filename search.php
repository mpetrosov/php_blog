<?php
include('includes/connect.php');
date_default_timezone_set('Europe/Amsterdam');

// $categoryId = isset($_GET['cat_id']) ? $_GET['cat_id'] : null;
// try {
//     $categoryId = (int)$categoryId;
// } catch(Exception $err) {
//     $categoryId = null;
// }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My  blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="comments/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
    <script src="comments/main.js"></script>
    <script src="engine.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="header">
           <a href="index.php"> <img id="logo" src="img/blog_header.jpg" /></a>
        </div>
        <div class="content">
            <div class="right" id="right">
                <h1>Search page</h1> 
                <?php 
                    if (isset($_POST['submit_search'])){
                        $search = mysqli_real_escape_string($conn, $_POST['search']);
                        $sql = "SELECT * FROM tbl_products WHERE product_name LIKE '%$search%' OR description LIKE '%$search%' OR date LIKE '%$search%'";
                        $result = mysqli_query($conn, $sql);
                        $queryResult = mysqli_num_rows($result);

                        if ($queryResult > 0) {
                            while ($row = mysqli_fetch_assoc($result)){
                                echo" <h3>".$row['product_name']."</h3>
                                     <p>".$row['description']."</p>
                                     <p>".$row['date']."</p>";
                            }
                        } else {
                            echo "There are no results matching your search";
                        }
                    }
                ?>  
               
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
    
    
</body>
</html>