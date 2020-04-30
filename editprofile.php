
<?php
require_once "./Models/user.php";
require_once "./Control/db.php";
?>
<?php

if (!isset($_SESSION['userid'])) {
    header("refresh:0;url='./index.php'");
}
?>
<?php include "./includes/header.php"?>
   <?php include "./includes/Navbar.php"?>
   <?php

   
$db= new Database;

    $id = $_SESSION['userid'];
    $user = new User;
    $user = $db->getuserbyid($id);
    $password = $user->getpassword();
    $username = $user->getusername();
    $firstname = $user->getfirstname();
    $lastname = $user->getlastname();
    $email = $user->getemail();

if (isset($_POST['update_user'])) {

    if(
        strlen($_POST['username'])==0  ||
        strlen($_POST['password'])==0  ||
        strlen($_POST['email'])==0     ||
        strlen($_POST['firstname'])==0 ||
        strlen($_POST['lastname'])==0  
        ){
           echo "<div class=\"alert alert-danger\" role=\"alert\">
           must not be empty </div>";
          
       }else{
       if($_POST['password']!=$_POST['repassword']){
          echo "<div class=\"alert alert-danger\" role=\"alert\">
              password dont match </div>";
             
       }else{
     $user = new User;
     $user->setid( $_SESSION['userid']);
     $user->setpassword($_POST['password']);
     $user->setusername($_POST['username']);
    $user->setfirstname($_POST['firstname']);
     $user->setlastname($_POST['lastname']);
     $user->setemail($_POST['email']);
    $db->update_user($user);}
}}
?>
<h1 class="page-header">
<?php echo $firstname; ?> Profile 
</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" value=<?php echo $firstname; ?> class="form-control" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text"value=<?php echo $lastname; ?> class="form-control" name="lastname">
    </div>

    <div class="form-group">
        <label for="username">username</label>
        <input type="text" value=<?php echo $username; ?> class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" value=<?php echo $email; ?> class="form-control"  name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="repassword">Re enter Password</label>
        <input maxlength="10"type="password" class="form-control" name="repassword">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
    </div>
</form>

          
       
