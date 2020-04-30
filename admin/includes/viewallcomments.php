<?php

require_once "../Control/db.php";

$db = new Database;
if(isset($_GET['delete'])){
    $db->delete_commentbyid($_GET['delete'],$_GET['postid']);
}

if(isset($_GET['approve'])){
    $db->update_commentstatus($_GET['approve'],'approved',$_GET['postid']);
}
if(isset($_GET['unapprove'])){
    $db->update_commentstatus($_GET['unapprove'],'unapproved',$_GET['postid']);
}
?>
   <h1 class="page-header">
                    Comments
                </h1>
<form action="" method='post'>
    <div class="table-responsive">
        <table class=" table table-bordered ">

<div class="col-xs-4">


 </div>
         
            <thead>
            <tr>
                        <th>Id</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>In Response to</th>
                        <th>Date</th>
                        <th>Approve</th>
                        <th>Unapprove</th>
                        <th>Delete</th>
                    </tr>
            </thead>

            <tbody>

                <?php
                $db->get_allcomments();
                ?>
                <form method="post">

                    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">

             

                </form>
            </tbody>
        </table>

</form>