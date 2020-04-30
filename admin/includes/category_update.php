
<?php

require_once "../Control/db.php";

$db= new Database;
$cat_id=$_GET['edit'];

function get_info(){
  $db= new Database;
  $cat_title=$db->get_categorybyid($_GET['edit']);
  echo $cat_title;
}
?>
    <form action="?page=2" method="POST">
      <div class="form-group">
         <label for="cat-title">Edit Category</label>
         <input value="<?php get_info()?>" type="text" class="form-control" name="thetitle">

         <input value="<?php echo $_GET['edit']?>" readonly type="hidden" class="form-control" name="id">
         </div>
       <div class="form-group">
          <input class="btn btn-primary" type="submit" value="Update Category">
      </div>
    </form>
   