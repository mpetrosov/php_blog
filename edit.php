<?php
include('includes/connect.php');
include('includes/conf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // print_r($_POST);
    //$title = isset($_POST['title']) ? $_POST['title'] : die("Bad data");
    $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : die("Bad data");
    $description = isset($_POST['description']) ? $_POST['description'] : die("Bad data");
    $ableComment = isset($_POST['able_comments']) && $_POST['able_comments'] == 'on' ? 1 : 0;

    // If id is present we deal with UPDATES. Otherwise, if id is NOT present, we deal with inserts
    if (isset($_GET["product_id"]) && $_GET["product_id"]) {
        // Update action
        $id = mysqli_real_escape_string($conn, $_GET["product_id"]);

        mysqli_query($conn, 'UPDATE `tbl_products` SET `product_name`="'.$product_name.'", `description`="'.$description.'", `able_comments`='.$ableComment.' WHERE `product_id`='.$id) or die(mysqli_error($conn));
    } else {
        // Insert action
        // We need to get the new $id
        mysqli_query($conn, 'INSERT INTO `tbl_products` (`product_name`, `description`, `able_comments`) VALUES ("'.$product_name.'", "'.$description.'", '.$ableComment.')') or die(mysqli_error($conn));
        $id = mysqli_insert_id($conn);
    }

    // Redirect to view of the inserted/updated
    die(header('Location: '.BASE_URL . "view.php?product_id=$id"));
} else {
    // Edit action, we want to fill in the form and then press Submit

    $id = null;
    $product_name = "";
    $description = "";
    $ableComments = 1;

    if (isset($_GET["product_id"]) && $_GET["product_id"]) {
        $id = mysqli_real_escape_string($conn, $_GET["product_id"]);
        // TODO: check on SQL injections!
        $result = mysqli_query($conn, "SELECT * FROM tbl_products WHERE product_id=$id") or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);
        $product_name = $row['product_name'];
        $description = $row['description'];
        $ableComments = $row['able_comments'];
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit view | My  blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="comments/style.css" />
    <script src="comments/main.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="header">
           <a href="index.php"> <img id="logo" src="img/blog_header.jpg" /></a>
        </div>
        <div class="content">
            <div class="right" id="right"> 
                
                
                <div class="form">

                    <form method="POST">
                        <div class"main">
                            <div class="row">
                                <label for="product_name">Product</label>
                                <input type="text" name="product_name" id="product_name" value="<?php echo $product_name; ?>" />
                            </div>
                            <div class="row">
                                <label for="description">Description</label>
                                <textarea name="description" id="description"><?php echo $description; ?></textarea>
                            </div>
                            <div class="row">
                                <label for="able_comments">Enable comments</label>
                                <input class="checkbox_form" type="checkbox" name="able_comments" <?php echo($ableComments ? 'checked' : ''); ?>>  
                            </div>
                            <div class="buttons">
                                <button class="" type="submit">OK</button>
                            </div>

                        </div>
                    </form>
                        
                </div>

            </div>
            
            <?php include('categories.php'); ?>
        </div>
    </div>
        <div style="clear:both;"></div>
        <div class="footer">My blog 2018</div>
    
    
</body>
</html>