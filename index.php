<?php

require_once "./Control/db.php";
require_once './Models/comments.php';
$db = new Database;

session_start();
?>
<?php include "./includes/header.php" ?>
<!-- Navigation -->
<?php include "./includes/Navbar.php" ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class='col-md-8'>

            <?php
            $choice = '';
            if (isset($_GET['index'])) {
                $choice = $_GET['index'];
            }
            switch ($choice):

                case 'login':
                    require_once('./login.php'); //transper the user to the login page
                    break;
                case 'signup':
                    require_once('./signup.php'); //transper the user to the login page
                    break;
                case 'editprofile':
                    require_once './editprofile.php';
                    break;
                case 'logout':
                    require_once('./Logout.php'); //transper the user to the login page
                    break;
                case "cat":
                    $db->get_postbycategory($_GET['cat']);
                    break;
                case 'id':
                    $db->get_postinfo($_GET['id']);
                    break;
                    
                default:
                    if (!isset($_POST['search'])) {
                        $db->get_post('');
                    } else {

                        $db->get_post($_POST['search']);
                    }
            endswitch;

            /*
           
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
         */   ?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "./includes/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>
</div>

<?php include "./includes/footer.php" ?>