 <?php

    require_once "page_choice.php";

    if (!$_SESSION['email']) {
        header("refresh:0;url='../index.php'");
    }
    ?>

 <!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="../index.php">CMS Admin</a>
     </div>
     <!-- Top Menu Items -->
     <ul class="nav navbar-right top-nav">

        
     </ul>  
     <ul class="nav navbar-right top-nav">

         <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                 <?php

                    if ($_SESSION['username']) {
                        echo $_SESSION['username'];
                    }

                    ?>

                 <b class="caret"></b></a>

             <ul class="dropdown-menu">
                 <li>
                     <a href="../index.php?editprofile=true"><i class="fa fa-fw fa-user"></i> Edit Profile</a>
                 </li>
                 <li class="divider"></li>
                 <li>
                     <a href="../Logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                 </li>
             </ul>
         
         </li>
             <li>
             <a href="../index.php"><i class="fa  fa-bookmark"></i> Blog</a>
         </li>
     </ul>
     
     <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
     <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav side-nav">
             <li>
                 <a href="?page=1"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
             </li>
             <li>
                 <a href="javascript:" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                 <ul id="demo2" class="collapse">
                     <li>
                         <a href="?page=3">view all posts</a>
                     </li>
                     <li>
                         <a href="?source=add_post&page=3">Add posts</a>
                     </li>
                 </ul>
             </li>
             <li>
                 <a href="?page=2"><i class="fa fa-fw fa-wrench"></i> Categories</a>
             </li>
             <li>
                 <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                 <ul id="demo" class="collapse">
                     <li>
                         <a href="?source=a&page=7">View all users</a>
                     </li>
                     <li>
                         <a href="?source=add_user&page=7">Add user</a>
                     </li>
                 </ul>
             </li>

             <li>
                 <a href="?page=6"><i class="fa fa-fw fa-file"></i> Comments</a>
             </li>

         </ul>
     </div>
     <!-- /.navbar-collapse -->
 </nav>