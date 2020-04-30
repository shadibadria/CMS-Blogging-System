<div id="page-wrapper">
    <div class="container-fluid">
        <?php
        include_once "../Control/db.php";

        $db = new Database;
        ?>
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">
                    Categories
                </h1>
                <div class="col-xs-5">
                    <form action="?page=2" method="POST">
                        <div class="form-group">
                            <label   for="cat-title">Add Category</label>
                            <input maxlength="10"  type="text" class="form-control" name="cat_title "required/>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>
                    <?php
                    if (isset($_GET['edit'])) {

                        include "includes/category_update.php";
                    }

                    if (isset($_POST['thetitle'])) {

                        $cat_title = $_POST['thetitle'];
                        $db->update_category($_POST['id'], $cat_title);
                    }

                    if (isset($_POST['cat_title'])) {
                        $cat_title = $_POST['cat_title'];
                        $db->add_category($cat_title);
                    }
                    if (isset($_GET['delete'])) {
                        $cat_id = $_GET['delete'];
                        $db->delete_categorybyid($cat_id);
                    }
                    ?>
                </div>
                <div class="col-xs-6">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $db->get_allcategory();
                            ?>
                        </tbody>

                    </table>
                </div>

            </div>

        </div>

    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>