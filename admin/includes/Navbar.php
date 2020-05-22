
<?php

session_start();
if (!$_SESSION['email']) {
    header("refresh:0;url='../index.php'");
}
?>



  <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CMS</b>ADMIN</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">   <?php

if ($_SESSION['username']) {
    echo $_SESSION['username'];
}

?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                <?php

if ($_SESSION['username']) {
    echo $_SESSION['username'];
}

?>                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../index.php?editprofile=true" class="btn btn-default btn-flat">Edit Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../Logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
    

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="?page=1">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=3"><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="?source=add_post&page=3"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Users </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?source=a&page=7"><i class="fa fa-circle-o"></i> All users</a></li>
            <li><a href="?source=add_user&page=7"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>
        <li><a href="?page=2"><i class="fa fa-folder"></i> <span>Categories</span></a></li>
        <li><a href="?page=6"><i class="fa fa-folder"></i> <span>Comments</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
