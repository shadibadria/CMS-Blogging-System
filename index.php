<?php

require_once "./Control/db.php";
require_once './Models/comments.php';
$db = new Database;


?>
<?php include "./includes/header.php" ?>
<!-- Navigation -->
<?php include "./includes/Navbar.php" ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class='col-md-8'>

            <!-- Blog Entries Column -->
            <?php
            if (isset($_GET['signup'])) {
                require_once './signup.php';
            } else {
                if (isset($_GET['editprofile'])) {
                    require_once './editprofile.php';
                } else {
                    if (isset($_POST['create_comment'])) {

                        $comment = new Comment;

                        $comment->setcomment_author($_SESSION['username']);
                        $comment->setcomment_email($_SESSION['email']);
                        $comment->setcomment_content($_POST['comment_content']);
                        $comment->setcomment_status('pending');
                        $comment->setcomment_date(date("Y-m-d"));
                        $comment->setpost_id($_GET['id']);


                        $db->add_comment($comment);
                    }

                    if (isset($_GET['cat'])) {
                        $db->get_postbycategory($_GET['cat']);
                    } else {
                        if (isset($_GET['id'])) {
                            $db->get_postinfo($_GET['id']);
                        } else {
                            if (!isset($_POST['search'])) {
                                $db->get_post('');
                            } else {

                                $db->get_post($_POST['search']);
                            }
                        }
                    }
                }
            }
            ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "./includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php include "./includes/footer.php" ?>