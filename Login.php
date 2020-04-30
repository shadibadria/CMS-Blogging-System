
<?php

require_once "./Control/db.php";
require_once "./Models/user.php";

session_start();


if (isset($_POST['login'])) {
  checkData();
}

require_once "./Control/db.php";

require_once './Models/user.php';

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
  }
}
$_SESSION['try'] = 'false';

header("refresh:0;url='./index.php'");

?>



