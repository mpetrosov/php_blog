<?php
include('includes/connect.php');

$productId = isset($_GET['id']) ? $_GET['id'] : null;
try {
    $productId = (int)$productId;
} catch(Exception $err) {
    $productId = null;
}

$result = mysqli_query($conn,"SELECT * FROM comments WHERE product_id=$productId ORDER BY date DESC") or die(mysqli_error($conn));

while($data = mysqli_fetch_array($result)){
    ?>
        <div class="comment-box">
            <p>
                <?php echo $data['date']; ?><br/>
                <?php echo nl2br($data['message']); ?>
            </p>
            <form class="delete-form" method="POST" action="/php_blog/comments/index.php?next=<?php echo $_SERVER['REQUEST_URI']; ?>">
                <input type="hidden" name="cid" value="<? php echo $data['cid']; ?>">
                <button type="submit" name="commentDelete">Delete</button>
            </form>

            <form class="edit-form" method="POST" action="/php_blog/comments/editcomment.php?next=<?php echo $_SERVER['REQUEST_URI']; ?>">
                <input type="hidden" name="cid" value="<?php echo $data['cid']; ?>">
                <input type="hidden" name="uid" value="<?php echo $data['uid']; ?>">
                <input type="hidden" name="date" value="<?php echo $data['date']; ?>">
                <input type="hidden" name="message" value="<?php echo $data['message']; ?>">
                <button>Edit</button>
            </form>

        </div>
    <?php
}
