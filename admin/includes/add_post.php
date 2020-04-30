<?php
require_once "../Models/posts.php";

if (isset($_POST['create_post'])) {
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
      $post->setpost_author($_SESSION['username']);
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post->setpost_image($_FILES['image']['name']);
    $post->setpost_content(htmlspecialchars($_POST['post_content']));
    $post->setposts_tags($_POST['post_tags']);
    $post->setpost_author($_SESSION['username']);

    $post_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($post_image_temp, "../images/" . $post->getpost_image() . "");
    $db->add_post($post);
}}
?>
<h1 class="page-header">
    Add new Post
</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="post_category" id="">
            <?php
            $db->getcategorytitle($title);
            ?>
        </select>

    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea id="content" class="form-control " name="post_content" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>