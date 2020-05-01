<?php
require_once "./Control/db.php";

$db = new Database;
session_start();
?>
<header>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#the-navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">MyBlog</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="the-navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="./index.php">Blog</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <?php if (!isset($_SESSION['username'])) {

            echo "
               <li><a href=''./index.php?index=signup''>signup</a></li>
               <li><a href='./index.php?index=login'>sign in</a></li>
               ";
          } else {

            echo "

            <li>
            <form action='./Logout.php' method='post'>
            <button class='btn btn-danger rounded-circle' name='logout' type='submit'>Logout </button>
            </form>
            </li>

                ";
          }

          ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>
</header>