<?php

include "../Control/db.php";
$db = new Database;

?>
<?php include "./includes/Header.php" ?>

    <?php include "./includes/Navbar.php";

    ?>

<?php

            if (isset($_GET['page'])) {
              switch ($_GET['page']):
            
                case 1:
                  require_once('./dashboard.php'); //transper the user to the login page
                  break;
                case 2:
                  require_once('./categories.php'); //transper the user to the login page
                  break;
                case 3:
                  require_once('./posts.php'); //transper the user to the login page
                  break;
                case 4:
                  require_once('./includes/add_post.php'); //transper the user to the login page
                  break;
                case 5:
                  require('./post.php'); //transper the user to the login page
                  break;
                case 6:
                  require('./comments.php'); //transper the user to the login page
                  break;
                  case 7:
                    require('./users.php'); //transper the user to the login page
                    break;
                default:
                  require_once('./dashboard.php'); //transper the user to the login page
            
              endswitch;
            } else {
              require_once('./index.php'); //transper the user to the login page
            
            }


            ?>

<?php include "./includes/Footer.php";

?>