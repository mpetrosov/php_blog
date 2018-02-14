<?php
include('includes/connect.php');
include_once('includes/auth.inc.php');

// SELECT DISTINCT MONTH(`date`) AS `month`, YEAR(`date`) AS `year` FROM `tbl_products`
// we add two GET arguments:
// - month
// - year
// example: load_products.php?month=2&year=2018

$result = mysqli_query($conn,"SELECT * FROM tbl_categories ORDER BY cat_name ASC") or die(mysqli_error($conn));
?>
<div class="left">
    <div class="left_form">
        <form class="search_form" name="search_form" action="search.php" method="POST">
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

    <?php
    if (isAdmin()) {
    ?>
    <div class="left_bottom">
        <div class ="divbutton">
            <a href="edit.php?product_id=<?php echo $id; ?>"><?php echo $buttonCaption; ?></a>
        </div>
    </div>
    <?php
    }
    ?>

    <div class="left_login">
    <?php
    if (!isAuthenticated()) {
    ?>
        <span class="switch-forms">sign up</span>
        <form class="register-form hidden" action="includes/register.inc.php" method="POST">
            <input class="signup_up" type="text" name="email" placeholder="example@example.com" >
            <input class="signup_middel" type="text" name="username" placeholder="Username" >
            <input class="signup_down" type="password" name="pwd" placeholder="Password" >
            <button class="submit" type="submit">signup</button>
        </form>
        <form class="login-form" action="includes/login.inc.php" method="POST">
            <input class="login_up" type="text"  name="username" placeholder="Username/email"/>
            <input class="login_down" type="password"  name="pwd" placeholder="password"/>
            <button class="submit" type="submit">login</button>
        </form>
    <?php
    } else {
    ?>
        <a href="logout.php">Log out</a>
    <?php
    }
    ?>
    </div>

</div>
