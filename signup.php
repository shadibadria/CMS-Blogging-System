<?php
require_once "./Models/user.php";
require_once "./Control/db.php";
?>

<?php include "./includes/header.php" ?>
<?php include "./includes/Navbar.php" ?>
<?php
if (isset($_POST['create_user'])) {

  if (
    strlen($_POST['username']) == 0  ||
    strlen($_POST['password']) == 0  ||
    strlen($_POST['email']) == 0     ||
    strlen($_POST['firstname']) == 0 ||
    strlen($_POST['lastname']) == 0

  ) {
    echo "<div class=\"alert alert-danger\" role=\"alert\">
        must not be empty </div>";
  } else {
    if ($_POST['password'] != $_POST['repassword']) {
      echo "<div class=\"alert alert-danger\" role=\"alert\">
           password dont match </div>";
    } else {

      $db = new Database;
      $user = new User;

      $user->setpassword($_POST['password']);
      $user->setusername($_POST['username']);
      $user->setfirstname($_POST['firstname']);
      $user->setlastname($_POST['lastname']);
      $user->setemail($_POST['email']);
      $user->setrole('subscriber');

      $db->add_user($user);
    }
  }
}
?>



<div class="login">
  <div class="container">
    <div class="row">
      <div class="col-md-1 m-auto">
      </div>
      <div class="col-md-5 m-auto">
        <h1 class="display-4 text-center">Sign up</h1>
        <p class="lead text-center">Sign in to your account</p>
        <form action='#' method='post'>
          <div class="form-group">
            <label for="firstname">Firstname</label>
            <input maxlength="10" value="<?php if (isset($_POST["firstname"])) echo $_POST["firstname"]; ?>" type="text" class="form-control" name="firstname">
          </div>
          <div class="form-group">
            <label for="lastname">Lastname</label>
            <input maxlength="10" value="<?php if (isset($_POST["lastname"])) echo $_POST["lastname"]; ?>" type="text" class="form-control" name="lastname">
          </div>

          <div class="form-group">
            <label for="username">username</label>
            <input maxlength="10" type="text" value="<?php if (isset($_POST["username"])) echo $_POST["username"]; ?>" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input maxlength="30" type="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input maxlength="10" type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="repassword">Re enter Password</label>
            <input maxlength="10" type="password" class="form-control" name="repassword">
          </div>
          <div class="form-group">
            <input type="submit"value="SignUp" name="create_user" class="btn btn-info btn-block mt-4" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>