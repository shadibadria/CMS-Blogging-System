<?php
require_once "./Control/db.php";
require_once "./Models/posts.php";
$db = new Database;


?>


<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">



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

        <!-- Side Widget Well -->
    </div>
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="./index.php" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>
    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php $db->get_category(); ?>


                </ul>
            </div>

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>



</div>