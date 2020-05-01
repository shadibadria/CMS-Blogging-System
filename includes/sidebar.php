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
                <h4>Today Posts</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">

                    <ul class="popular-posts">
                     
                    <?php  $db->get_todayposts(); ?>
 
                                

                </ul>
            </div>
        </div>


    </aside>


</div>