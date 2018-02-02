<?php
include('includes/connect.php');
include('includes/conf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = isset($_POST['title']) ? $_POST['title'] : die("Bad data");
    $teaser = isset($_POST['teaser']) ? $_POST['teaser'] : die("Bad data");
    $text = isset($_POST['text']) ? $_POST['text'] : die("Bad data");

    // If id is present we deal with UPDATES. Otherwise, if id is NOT present, we deal with inserts
    if (isset($_GET["id"]) && $_GET["id"]) {
        // Update action
        $id = mysqli_real_escape_string($conn, $_GET["id"]);

        mysqli_query($conn, 'UPDATE `articles` SET `title`="'.$title.'", `teaser`="'.$teaser.'", `text`="'.$text.'" WHERE `id`='.$id) or die(mysqli_error($conn));
    } else {
        // Insert action
        // We need to get the new $id
        mysqli_query($conn, 'INSERT INTO `articles` (`title`, `teaser`, `text`) VALUES ("'.$title.'", "'.$teaser.'", "'.$text.'")') or die(mysqli_error($conn));
        $id = mysqli_insert_id($conn);
    }

    // Redirect to view of the inserted/updated
    die(header('Location: '.BASE_URL . "view.php?id=$id"));
} else {
    // Edit action, we want to fill in the form and then press Submit

    $id = null;
    $title = "";
    $teaser = "";
    $text = "";

    if (isset($_GET["id"]) && $_GET["id"]) {
        $id = mysqli_real_escape_string($conn, $_GET["id"]);
        // TODO: check on SQL injections!
        $result = mysqli_query($conn, "SELECT * FROM articles WHERE id=$id") or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $teaser = $row['teaser'];
        $text = $row['text'];
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
                
                
                <div class="form">

                    <form method="POST">
                        <div class"main">
                            <div class="row">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="<?php echo $title; ?>" />
                            </div>
                            <div class="row">
                                <label for="teaser">Short description</label>
                                <textarea name="teaser" id="teaser"><?php echo $teaser; ?></textarea>
                            </div>
                            <div class="row">
                                <label for="text">Text</label>
                                <textarea name="text" id="text"><?php echo $text; ?></textarea>
                            </div>
                            <div class="buttons">
                                <button class="" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                        
                </div>

            </div>
            
            <div class="right">
                <div class ="right_menu">
                    <a href="##">Main</a>
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