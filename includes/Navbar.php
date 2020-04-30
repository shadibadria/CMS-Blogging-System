<?php
require_once "./Control/db.php";
require_once "./admin/page_choice.php";

$db = new Database;
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">BlogSystem</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">

                <?php $db->get_category(); ?>

                <li>
                    <?php
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] == 'admin') {
                            echo " <a  href='./admin'>Dashboard</a>";
                        }
                    }

                    ?>
                </li>

            </ul>
            <?php if(isset($_SESSION['username'])){

                echo "
                
                <ul class='nav navbar-nav navbar-right'>
                <li class='dropdown'>
                  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                     ".  $_SESSION['username']." <span class='caret'></span></a>
                  <ul class='dropdown-menu'>
                    <li><a href='./index.php?editprofile=true'>Edit Profile</a></li>
                    <li><a href='./logout.php'>Logout</a></li>
                    
                   
                  </ul>
                ";
            }else{
                echo "
                
                <ul class='nav navbar-nav navbar-right'>
              
                    <li><a href='./index.php?signup=true'>SignUp</a></li>
                    
                   
                  </ul>
                ";

                
            } ?>
     
        </li>
      </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>