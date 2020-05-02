<?php

require_once "./Control/db.php";
require_once "./Models/user.php";

function checkData() // function to check the user inin info
{


  $db = new Database;
  $temp = $db->login($_POST['email'], $_POST['password']);
  if ($temp != false) {

    $user = $db->getuserbyemail($_POST['email']);
    $_SESSION['role'] = $user->getrole();
    $_SESSION['userid'] = $user->getid();
    $_SESSION['username'] = $user->getusername();
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['try'] = 'true';

    header("refresh:0;url='./index.php'");
  } else {
    $_SESSION['try'] = 'false';
  }
}

if (isset($_POST['login'])) {
  if (isset($_SESSION['try']) == 'false') {
    echo "<div class=\"alert alert-danger\" role=\"alert\">
          Invalid Password / Email</div>";
    unset($_SESSION['try']);
  } else {
    checkData();
  }
}
?>


<div class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-1 m-auto">
      </div>

      <div class="col-md-5 m-auto">

        <h1 class="display-4 text-center">Log In</h1>
        <p class="lead text-center">Sign in to your account</p>
        <form action='#' method='post'>
          <div class="form-group">
            <input type="email" class="form-control form-control-lg" placeholder="Email Address" name="email" />
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" />
          </div>
          <input type="submit" name="login" class="btn btn-info btn-block mt-4" />
        </form>
      </div>
    </div>
  </div>
</div>