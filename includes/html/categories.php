<?php
include('includes/connect.php');

$result = mysqli_query($conn,"SELECT * FROM tbl_categories ORDER BY cat_name ASC") or die(mysqli_error($conn));
?>
<div class="left">
    <div class ="left_menu">
        <p class="menu_head">Category</p>
<?php
while($data = mysqli_fetch_array($result)){
    ?>
        <a href="index.php?cat_id=<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></a>
    <?php
}
?>
    </div>
    <div class="left_bottom">
        <div class ="divbutton">
            <a href="edit.php">Login</a>
        </div>
    </div>
</div>
