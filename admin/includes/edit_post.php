<?php
require_once "../Models/posts.php";

$title = '';
$id = '';
$image = '';
$category = '';
$status = '';
$image = '';
$tags = '';
$content = '';


if ($_GET['edit']) {
    $id = $_GET['edit'];
    $post = new Posts;
    $post = $db->get_postobject($id);

    $title = $post->gettitle();
    $id = $_GET['edit'];
    $image = $post->getpost_image();
    $category = $post->getpost_category_id();
    $status = $post->getpost_status();
    $tags = $post->getposts_tags();
    $content = $post->getpost_content();
}
if (isset($_POST['update_post'])) {
    if (
        strlen($_POST['title']) == 0  ||
        strlen($_POST['post_tags']) == 0  ||
        strlen($_POST['post_content']) == 0


    ) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">
       must not be empty </div>";
       
    } else {
        require_once "../Control/db.php";
        $db = new Database;
        $post = new Posts;

        $post->settitle($_POST['title']);

        $post->setpost_date(date("Y-m-d"));
        $post->setpost_category_id($db->get_categoryid($_POST['post_category']));
        $post->setpost_content(htmlspecialchars($_POST['post_content']));
        $post->setposts_tags($_POST['post_tags']);
        $db->update_post($post, $id);
    }
}
?>
<h1 class="page-header">
    Edit Post : <?php echo '[' . $title . ']  id:' . $id ?>
</h1>
<form action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value=<?php echo $title; ?> type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select selectedIndex="<?php echo $category; ?>" name="post_category" id="">
            <?php
            $db->getcategorytitle($category);

            ?>
        </select>

    </div>

    <div class="form-group">

        <img width="70" ; src="../images/<?php echo $image; ?>" alt="">

    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $content; ?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update">
    </div>
</form>