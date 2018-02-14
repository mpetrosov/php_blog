<?php
include('includes/connect.php');
date_default_timezone_set('Europe/Amsterdam');

//SELECT * FROM `tbl_products` WHERE MONTH(`date`) = 2 AND YEAR(`date`) = 2018

$categoryId = isset($_GET['cat_id']) ? $_GET['cat_id'] : null;
try {
    $categoryId = (int)$categoryId;
} catch(Exception $err) {
    $categoryId = null;
}

if ($categoryId) {
    $result = mysqli_query($conn,"SELECT * FROM tbl_products WHERE cat_id = $categoryId ORDER BY product_id DESC") or die(mysqli_error($conn));
} else {
    $result = mysqli_query($conn,"SELECT * FROM tbl_products ORDER BY product_id DESC") or die(mysqli_error($conn));
}

while($data = mysqli_fetch_array($result)){
    ?>
    <div class="article">
    <img src="img/nkar1.jpg"/> 
    <a class="title" href="view.php?product_id=<?php echo $data['product_id']; ?>"><h2><?php echo $data["product_name"]; ?></h2></a>
    <p><?php echo $data["description"]; ?></p> 
    <div style="clear:both;"></div>
    </div>
    <?php
}
