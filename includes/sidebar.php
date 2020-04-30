<?php
require_once "./Control/db.php";
require_once "./Models/posts.php";
$db = new Database;


?>


<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    <aside class="right-sidebar">
        <form action="./index.php" method="post">
            <div class="search-widget">
                <div class="input-group">
                    <input type="text" name="search" class="form-control input-lg" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-lg btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div><!-- /input-group -->
            </div>
        </form>
        <div class="widget">
            <div class="widget-heading">
                <h4>Categories</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    <?php $db->get_category(); ?>

                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    <li>
                        <div class="post-image">
                            <a href="#">
                                <img src="img/Post_Image_5_thumb.jpg" />
                            </a>
                        </div>
                        <div class="post-body">
                            <h6><a href="#">Blog Post #5</a></h6>
                            <div class="post-meta">
                                <span>36 minutes ago</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="post-image">
                            <a href="#">
                                <img src="img/Post_Image_4_thumb.jpg" />
                            </a>
                        </div>
                        <div class="post-body">
                            <h6><a href="#">Blog Post #4</a></h6>
                            <div class="post-meta">
                                <span>36 minutes ago</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="post-image">
                            <a href="#">
                                <img src="img/Post_Image_3_thumb.jpg" />
                            </a>
                        </div>
                        <div class="post-body">
                            <h6><a href="#">Blog Post #3</a></h6>
                            <div class="post-meta">
                                <span>36 minutes ago</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    <li><a href="#">PHP</a></li>
                    <li><a href="#">Codeigniter</a></li>
                    <li><a href="#">Yii</a></li>
                    <li><a href="#">Laravel</a></li>
                    <li><a href="#">Ruby on Rails</a></li>
                    <li><a href="#">jQuery</a></li>
                    <li><a href="#">Vue Js</a></li>
                    <li><a href="#">React Js</a></li>
                </ul>
            </div>
        </div>
    </aside>


    <div class="well">
        <?php

        if (isset($_SESSION['email'])) {
            if (isset($_SESSION['try']) == 'true') {
                echo "<div class=\"alert alert-success\" role=\"alert\">
                                Login Successful</div>";
                unset($_SESSION['try']);
            }
            echo "
                <form action='./Logout.php' method='post'>
                <h4>Welcome " . $_SESSION['username'] . "
                <span class='badge badge-pill badge-infos'>" . $_SESSION['role'] . "</span>

                </h4>

                <button class='btn btn-danger' name='logout' type='submit'>Logout
                </form>";
        } else {
            if (isset($_SESSION['try']) == 'false') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                    Invalid Password / Email</div>";
                unset($_SESSION['try']);
            }



            echo " <h4>Login</h4>
                <form action='./Login.php' method='post'>
                    <div class='form-group'>
                        <input name='email' type='text' class='form-control' placeholder='Enter Email'>
                    </div>
                    <div class='input-group'>
                        <input name='password' type='password' class='form-control' placeholder='Enter Password'>
                        <span class='input-group-btn'>
                            <button class='btn btn-primary' name='login' type='submit'>Submit
                            </button>
                        </span>
                    </div>
                </form>";
        }
        ?>

    </div>

   



</div>