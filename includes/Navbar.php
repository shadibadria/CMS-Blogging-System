<?php
require_once "./Control/db.php";
$db = new Database;

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
        <a class="navbar-brand" href="index.php">MyBlog</a>
        
      </div>
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="the-navbar-collapse">
      <ul class="nav navbar-nav navbar">
      <li  class="active"><a href="./index.php">Home</a></li>
      <?php if (isset($_SESSION['username'])) {
      echo "<li  ><a href='./admin'>Admin</a></li>'";

      }?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if (!isset($_SESSION['username'])) {

            echo "
               <li><a href='./index.php?index=signup''>signup</a></li>
               <li><a href='./index.php?index=login'>sign in</a></li>
               ";
          } else {

            echo "
            <li class='btn-danger'><a href='./Logout.php'>Logout</a></li>

                ";
          }

          ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>
</header>