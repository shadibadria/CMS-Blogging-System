
<?php
    require_once "../Models/user.php";

if(isset($_POST['create_user'])){

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
    require_once "../Control/db.php";
    $db = new Database;
     $user = new User;
     
     $user->setpassword($_POST['password']);
     $user->setusername($_POST['username']);
    $user->setfirstname($_POST['firstname']);
     $user->setlastname($_POST['lastname']);
     $user->setemail($_POST['email']);
     $user->setrole($_POST['user_role']);

    $db->add_user($user);
       }
}}
?>
<h1 class="page-header">
                    Add new user    
                </h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input maxlength="10"type="text" class="form-control" name="firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input maxlength="10"type="text" class="form-control" name="lastname">
    </div>
    
    <div class="form-group">
        <select name="user_role" id="">
            <option value="admin">admin</option>
            <option value="subscriber">subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="username">username</label>
        <input maxlength="15"type="text" class="form-control" name="username">
    </div>
  
    <div class="form-group">
        <label for="email">Email</label>
        <input maxlength="30"type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input maxlength="10" type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="repassword">Re enter Password</label>
        <input maxlength="10"type="password" class="form-control" name="repassword">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>