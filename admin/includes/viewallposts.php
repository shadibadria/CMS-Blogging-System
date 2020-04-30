<?php

require_once "../Control/db.php";

$db = new Database;


if(isset($_GET['delete'])){
    $db->delete_postbyid($_GET['delete']);
}


?>
   <h1 class="page-header">
                    Posts
                </h1>
<form action="" method='post'>
    <div class="table-responsive">
        <table class=" table table-bordered ">

            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Users</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Date</th>
                    <th scope="col">Content</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $db->get_allposts();
                ?>
                <form method="post">

                    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">

                

                </form>
            </tbody>
        </table>
    </div>

</form>