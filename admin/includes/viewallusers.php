<?php

require_once "../Control/db.php";
require_once '../Models/user.php';
$db = new Database;
if (isset($_GET['delete'])) {
    $db->delete_userbyid($_GET['delete']);
}
if (isset($_GET['admin'])) {
    $db->update_userstatus($_GET['admin'], 'admin');
}
if (isset($_GET['subscriber'])) {
    $db->update_userstatus($_GET['subscriber'], 'subscriber');
}
?>
<h1 class="page-header">
    Users
</h1>
<form action="" method='post'>
    <div class="table-responsive">
        <table class=" table table-bordered ">
            <div class="col-xs-4">
            </div>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Admin</th>
                    <th>Subscriber</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $db->get_allusers();
                ?>
                <form method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">

                </form>
            </tbody>
        </table>
</form>