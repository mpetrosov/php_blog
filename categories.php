<?php
include('includes/connect.php');

$result = mysqli_query($conn,"SELECT * FROM tbl_categories ORDER BY cat_name ASC") or die(mysqli_error($conn));
?>
<div class="left">
    <div class="left_form">
        <form name="search_form" action="search.php" method="POST">
            <input class="input_search" type="text" placeholder="Search" name="search">
            <button class="button_search" type="submit" name="submit_search">GO</button>
        </form>
</div>
    <div class ="left_menu">
        <p class="menu_head"><a href="index.php">All categories</a></p>
<?php

while($data = mysqli_fetch_array($result)){
    if ($_SERVER['SCRIPT_NAME'] == '/php_blog/index.php') {
    ?>
        <a href="load_products.php?cat_id=<?php echo $data['cat_id']; ?>" class="category-link"><?php echo $data['cat_name']; ?></a>
    <?php
    } else {
    ?>
        <a href="index.php?cat_id=<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></a>
    <?php
    }

}
?>
    </div>
    <?php
    $id = (isset($_GET["product_id"]) && $_GET["product_id"]) ? mysqli_real_escape_string($conn, $_GET["product_id"]) : null;
    $buttonCaption = $id ? "Edit" : "Create";
    ?>
    <div class="left_bottom">
        <div class ="divbutton">
            <a href="edit.php?product_id=<?php echo $id; ?>"><?php echo $buttonCaption; ?></a>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    <script src="comments/main.js"></script>
    <script src="engine.js"></script>
</head>
<body>
    
</body>
</html>