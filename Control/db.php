

<?php

//Models
class Database
{

    //** connection**//
    private $host;
    private $db;
    private $charset;
    private $user;
    private $pass;
    private $opt = array(
        PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    private $connection;
    public function __construct(
        string $host = "localhost",
        string $db = "cms",
        string $charset = "utf8",
        string $user = "root",
        string $pass = ""
    ) //costructor to acsses the data base
    {
        $this->host = $host;
        $this->db = $db;
        $this->charset = $charset;
        $this->user = $user;
        $this->pass = $pass;
    }
    //connections                   
    private function connect() //function to connect to the server
    {
        $dns = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $this->connection = new PDO($dns, $this->user, $this->pass, $this->opt);
    }
    //disconnect
    public function disconnect() //disconnect from the database
    {
        $this->connection = null;
    }
    //------------------------------------------------------//

    //** Categories**//

    //get  categories as li
    public function get_categorycount($id)
    {
        $this->connect();
        $counter = 0;

        $searchResult = $this->connection->query("SELECT * FROM posts WHERE post_category_id='$id' ");
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            $counter++;
        }
        $this->disconnect();
        return $counter;
    }
    public function get_category()
    {
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM categories ");
        echo " 
        <li>
        <a href='index.php'class=' fa fa-angle-right'/> ALL CATEGORIES</a>
           </li>
        ";
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {

            echo " 
            <li>
            <a href='?index=cat&cat=" . $line['cat_id'] . "'class='fa fa-angle-right'/> " . strtoupper($line['cat_title']) . "</a>
            <span class='badge pull-right'>" . $this->get_categorycount($line['cat_id']) . "</span>

               </li>
            ";
        }
        $this->disconnect();
    }
    //get categories option
    public function getcategorytitle($id)
    {
        $this->connect();

        $searchResult = $this->connection->query("SELECT * FROM categories ");
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            if ($line['cat_id'] == $id) {
                echo " 
                <option selected value='" . $line['cat_title'] . "'>" . strtoupper($line['cat_title']) . "</option>
                ";
            } else {
                echo " 
             <option value='" . $line['cat_title'] . "'>" . strtoupper($line['cat_title']) . "</option>
             ";
            }
        }
        $this->disconnect();
    }
    //get  categories as table
    public function get_allcategory()
    {
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM categories ");
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            echo " 
            <tr>
            <td>" . $line['cat_id'] . "</td>
            <td>" . $line['cat_title'] . "</td>
            <td><a href='?page=2&edit=" . $line['cat_id'] . "'>Edit</a></td>
            <td><a href='?page=2&delete=" . $line['cat_id'] . "'>Delete</a></td>
            </tr> 
            ";
        }
        $this->disconnect();
    }
    //get  categories by id
    public function get_categorybyid($id)
    {
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM categories WHERE '$id'=cat_id ");
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            return $line['cat_title'];
        }
        $this->disconnect();
    }
    //get  categories id
    public function get_categoryid($name)
    {
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM categories WHERE '$name'=cat_title");
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            return $line['cat_id'];
        }
        $this->disconnect();
    }
    //deltee category by id
    public function delete_categorybyid($id)
    {
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM posts WHERE post_category_id='$id' ");

        if ($searchResult->fetch(PDO::FETCH_ASSOC) == NULL) {
            $this->connection->exec("DELETE FROM categories WHERE '$id'=cat_id ");
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
            Cant Delete Category ,delete post first</div>";
        }

        $this->disconnect();
    }

    //add new category
    public function add_category($category_title)
    {
        $this->connect();
        $category_title = str_replace(array('\'', '\''), "", $category_title);

        $this->connection->exec("INSERT INTO categories(cat_title) VALUES('$category_title')");
        $this->disconnect();
    }
    //update category by id
    public function update_category($id, $title)
    {
        $this->connect();
        $title = str_replace(array('\'', '\''), "", $title);
        $searchResult = $this->connection->query("SELECT * FROM posts WHERE post_category_id='$id' ");

        if ($searchResult->fetch(PDO::FETCH_ASSOC) == NULL) {
            $this->connection->exec("UPDATE cms.categories SET cat_title='$title' WHERE '$id'=cat_id");
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
            Cant update Category ,delete post first</div>";
        }

        $this->disconnect();
    }

    //get all posts 
    public function get_postbycategory($id)
    {
        $flag = 0;
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM posts WHERE post_category_id='$id' ");
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            $flag = 1;

            echo " 
           
           <!-- First Blog Post -->
           <h2>
           

               <a href='?index=id&id=" . $line['post_id'] . "'>" . $line['post_title'] . "</a>
           </h2>
 
           <p class='lead'>
               by <a href=''>" . $line['post_author'] . "</a>
           </p>
           <p><span class='glyphicon glyphicon-time'></span> Posted on " . $line['post_date'] . "</p>
           <hr>
           <img  class='img-responsive' src='./images/" . $line['post_image'] . "' alt=''>
           <hr>
           <p>" . substr($line["post_content"], 0, 50)
                . " ... </p>
 
           <form action='?index=id&id=" . $line['post_id'] . "' method='post'>
           <button class='btn btn-primary' type='submit'>Read More <span class='glyphicon glyphicon-chevron-right'></span>
        </button>
        </form>
           <hr>
 
       ";
        }
        if ($flag == 0) {
            echo "<div class=\"alert alert-success\" role=\"alert\">
                                Not Found</div>";
        }
        $this->disconnect();
    }
    //------------------------------------------------------//


    public function get_postobject($id)
    {

        $post = new Posts;
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM posts WHERE post_id ='$id'");

        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            $post->settitle($line['post_title']);
            $post->setpost_date($line['post_date']);
            $post->setpost_category_id($line['post_category_id']);
            $post->setpost_author($line['post_author']);
            $post->setpost_image($line['post_image']);
            $post->setpost_content($line['post_content']);
            $post->setposts_tags($line['posts_tags']);
            $post->setpost_status($line['post_status']);
        }
        return $post;
    }
    //** Posts**//
    public function get_postinfo($id)
    {
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM posts WHERE post_id ='$id'");
        $postid = '';
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            $postid = $line['post_id'];
            echo " 
      

                <h1>" . $line['post_title'] . "</h1>

                <p class='lead'>
                    by <a href='#'>" . $line['post_author'] . "</a>
                </p>

                <hr>

                <p><span class='glyphicon glyphicon-time'></span> Posted on " . $line['post_date'] . "</p>

                <hr>

                <img class='img-responsive' src='./images/" . $line['post_image'] . "' alt=''>

                <hr>

                <p class='lead'>"
                .
                $line["post_content"]
                . " </p>
                <hr>
                ";
        }
        $this->get_comments($postid);

        $this->disconnect();
    }
    //** Posts**//
    public function get_todayposts()
    {
        $this->connect();
        $date = date("Y-m-d");
        $searchResult = $this->connection->query("SELECT * FROM posts WHERE post_date ='$date'");
        $flag = 0;
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            $flag = 1;
            echo "
            
            <li>
            <div class='post-image'>
                <a href='?index=id&id=" . $line['post_id'] . "'>
                    <img style='width:100px; height:50px'src='./images/" . $line['post_image'] . "' />
                </a>
            </div>
            <div class='post-body'>
                <h6><a href='?index=id&id=" . $line['post_id'] . "'>" . $line['post_title'] . "</a></h6>
                <div class='post-meta'>
                    <span>By " . $line['post_author'] . "</span>
                </div>
            </div>
        </li>
               ";
        }
        if ($flag == 0) {
            echo "
        <li>
            no posts today 
    </li>
                ";
        }

        $this->disconnect();
    }

    //get all posts 
    public function get_post($search)
    {
        $flag = 0;
        $this->connect();
        if (strlen($search) == 0) {
            $searchResult = $this->connection->query("SELECT * FROM posts ");
        } else {
            $search = trim($search, '\'');
            $searchResult = $this->connection->query("SELECT * FROM posts WHERE posts_tags LIKE '%$search%'");
        }
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            $flag = 1;

            echo " 
          <article class='post-item'>
          <div class='post-item-image'>
              <a href='post.html'>
                  <img style='width:100%; height:500px' src='./images/" . $line['post_image'] . "' alt='>
              </a>
          </div>
          <div class='post-item-body'>
              <div class='padding-10'>
                  <h2> <a href='?index=id&id=" . $line['post_id'] . "'>" . $line['post_title'] . "</a>
                  </a></h2>
                  <p>" . substr($line["post_content"], 0, 50)
                . " ... </p>
              </div>
              <div class='post-meta padding-10 clearfix'>
                  <div class='pull-left'>
                      <ul class='post-meta-group'>
                          <li><i class='fa fa-user'></i><a href='#'> " . $line['post_author'] . "</a></li>
                          <li><i class='fa fa-clock-o'></i><time> Posted on " . $line['post_date'] . "</time></li>
                          <li><i class='fa fa-comments'></i><a href='#'>".$this->count_comments($line['post_id'])." Comments</a></li>
                      </ul>
                  </div>
                  <div class='pull-right'>
                      <a href='?index=id&id=" . $line['post_id'] . "'>Continue Reading &raquo;</a>
                  </div>
              </div>
          </div>
      </article>
   
      ";
        }
        if ($flag == 0) {
            echo "<div class=\"alert alert-success\" role=\"alert\">
            No match </div>";
        }
        echo "
        <nav>
        <ul class='pager'>
          <li class='previous disabled'><a href='#'><span aria-hidden='true'>&larr;</span> Newer</a></li>
          <li class='next'><a href='#'>Older <span aria-hidden='true'>&rarr;</span></a></li>
        </ul>
        </nav>
        ";
        $this->disconnect();
    }
    //get all posts  as
    public function get_allposts()
    {
        $this->connect();

        $searchResult = $this->connection->query("SELECT * FROM posts ");

        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            echo " 
     <tr>
    <td>" . $line['post_id'] . "</td>

    <td>" . $line['post_author'] . "</td>

    <td>" . $line['post_title'] . "</td>
    <input type='hidden' name='post_id' value=" . $line['post_category_id'] . ">
    <td>" . ($this->get_categorybyid($line['post_category_id'])) . "</td>

    <td style='max-height:5px!important;max-width:5px!important'>
    <img  class='img-responsive' src='../images/" . $line['post_image'] . "' alt=''>
    </td>
    <td >" . $line['posts_tags'] . "</td>
    <td>" . $line['post_comment_count'] . "</td>
    <td>" . $line['post_date'] . "</td>
    <td>" .
                substr($line["post_content"], 0, 3)

                . "...</td>

    <td><a href='?page=3&&source=edit_post&&edit=" . $line['post_id'] . "'>Edit</a></td>
    <td><a href='?page=3&delete=" . $line['post_id'] . "'>Delete</a></td>
   </tr>

 ";
        }

        $this->disconnect();
    }
    
    //get all posts  as
    public function get_postname($id)
    {
        $this->connect();

        $searchResult = $this->connection->query("SELECT * FROM posts WHERE '$id'=post_id ");

        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {

            return $line['post_title'];
        }

        $this->disconnect();
    }
    public function add_post($post)
    {
        $this->connect();

        $title = $post->gettitle();
        $image = $post->getpost_image();
        $date = $post->getpost_date();
        $content = $post->getpost_content();
        $tags = $post->getposts_tags();
        $status = $post->getpost_status();
        $content = str_replace(array('\'', '\''), "", $content);
        $author = $post->getpost_author();
        $category = $post->getpost_category_id();
        $author = $post->getpost_author();
        $this->connection->exec("INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,posts_tags,post_status) VALUES( $category,'$title','$author','$date','$image','$content','$tags','$status')");
        $this->disconnect();
    }


    public function update_post($post, $id)
    {
        $this->connect();

        $title = $post->gettitle();
        $content = $post->getpost_content();
        $tags = $post->getposts_tags();
        $status = $post->getpost_status();

        $content = str_replace(array('\'', '\''), "", $content);
        $tags = str_replace(array('\'', '\''), "", $tags);
        $title = str_replace(array('\'', '\''), "", $title);
        $category = $post->getpost_category_id();

        $this->connection->exec("UPDATE posts SET post_category_id = '$category',post_title= '$title',post_content='$content',posts_tags='$tags',post_status='$status' WHERE post_id='$id'");
        $this->disconnect();
    }
    //delete post by id
    public function delete_postbyid($id)
    {
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM posts WHERE '$id'=post_id");
        $filename = $searchResult->fetch(PDO::FETCH_ASSOC);
        if (strlen($filename['post_image'] != 0)) {
            unlink(realpath("../images/" . $filename['post_image'] . ""));
        }
        $searchResult = $this->connection->query("DELETE FROM posts WHERE '$id'=post_id ");
        $searchResult = $this->connection->query("DELETE  FROM comments WHERE '$id'=comment_post_id ");

        $this->disconnect();
    }


    /***********************************************/
    //  comments
    /***************************************************/
    

    public function  count_comments($id)
    {
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM comments WHERE comment_post_id='$id' ");
        $count=0;
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            $count++;
        }
        $this->disconnect();
        return $count;
    }
    public function  get_allcomments()
    {
        $this->connect();

        $searchResult = $this->connection->query("SELECT * FROM comments ");

        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            echo " 
 <tr>
<td>" . $line['comment_id'] . "</td>

<td>" . $line['comment_author'] . "</td>
<td>" . $line['comment_content'] . "</td>
<td>" . $line['comment_email'] . "</td>
<td >" . $line['comment_status'] . "</td>

<td><a href='../index.php?id=" . $line['comment_post_id'] . "'>" . $this->get_postname($line['comment_post_id']) . "</a></td>

<td>" . $line['comment_date'] . "</td>
";
            if ($line['comment_status'] == 'approved') {
                echo "
    <td>*</td>
    <td><a href='?page=6&&unapprove=" . $line['comment_id'] . "&&postid=" . $line['comment_post_id'] . "'>unapprove</a></td>
    <td><a href='?page=6&delete=" . $line['comment_id'] . "&&postid=" . $line['comment_post_id'] . "'>Delete</a></td>
    </tr>
    ";
            }
            if ($line['comment_status'] == 'unapproved') {
                echo "
    <td><a href='?page=6&&approve=" . $line['comment_id'] . "&&postid=" . $line['comment_post_id'] . "'>approve</a></td>
    <td>*</td>
    <td><a href='?page=6&delete=" . $line['comment_id'] . "&&postid=" . $line['comment_post_id'] . "'>Delete</a></td>
    </tr>
    ";
            }
            if ($line['comment_status'] == 'pending') {
                echo "
    <td><a href='?page=6&&approve=" . $line['comment_id'] . "&&postid=" . $line['comment_post_id'] . "'>approve</a></td>
    <td>*</td>
    <td><a href='?page=6&delete=" . $line['comment_id'] . "&&postid=" . $line['comment_post_id'] . "'>Delete</a></td>
    </tr>
    ";
            }
        }
        $this->disconnect();
    }


    public function get_comments($id)
    {
        if (isset($_SESSION['email'])) {

            echo "
    <div class='well'>
    <h4>Leave a Comment:</h4>
    <form action='./index.php?id=" . $id . "' method='post' role='form'>
      
        <div class='form-group'>
            <label for='comment'>Your Comment</label>
            <textarea name='comment_content' class='form-control' rows='3'></textarea>
        </div>
        <button type='submit' name='create_comment' class='btn btn-primary'>Submit</button>
    </form>
</div>  
";
        } else {

            echo "<div class=\"alert alert-success\" role=\"alert\">
            Login/Signup to Leave a Comment</div>";
        }
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM comments WHERE comment_post_id='$id' AND comment_status='approved' ");
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            echo "
    <hr>
    <div class='media'>
        <a class='pull-left' href='#'>
            <img class='media-object' src='http://placehold.it/64x64' alt=''>
        </a>
        <div class='media-body'>
            <h4 class='media-heading'>" . $line['comment_author'] . "
                <small>" . $line['comment_date'] . "</small>

            </h4>
            " . $line['comment_content'] . "
        </div>
    </div>


    ";
        }
    }
    //add new category
    public function add_comment($comment)
    {
        $author = $comment->getcomment_author();
        $email = $comment->getcomment_email();
        $content = $comment->getcomment_content();
        $status = $comment->getcomment_status();
        $date = $comment->getcomment_date();
        $postid = $comment->getpost_id();

        $email = str_replace(array('\'', '\''), "", $email);
        $content = str_replace(array('\'', '\''), "", $content);

        $this->connect();
        $this->connection->exec("INSERT INTO comments(
            comment_post_id,
            comment_date,
            comment_author,
            comment_email,
            comment_content,
            comment_status
        ) VALUES(
            '$postid',
            '$date',
            '$author',
            '$email',
            '$content',
            '$status'
            
            )");
        $this->disconnect();
    }

    //deltee category by id
    public function delete_commentbyid($id, $postid)
    {
        $this->connect();
        $this->connection->exec("DELETE  FROM comments WHERE '$id'=comment_id ");
        $searchResult = $this->connection->query("SELECT * FROM posts WHERE '$postid'=post_id ");

        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {

            if ($line['post_comment_count'] == 0) {
            } else {
                $this->connection->exec("UPDATE cms.posts SET post_comment_count=post_comment_count-'1' WHERE '$postid'=post_id");
            }
        }
        $this->disconnect();
    }
    //update category by id
    public function update_commentstatus($id, $status, $postid)
    {

        $this->connect();
        if ($status == 'approved') {
            $this->connection->exec("UPDATE cms.posts SET post_comment_count=post_comment_count+'1' WHERE '$postid'=post_id");
        }
        if ($status == 'unapproved') {
            $searchResult = $this->connection->query("SELECT * FROM posts WHERE '$postid'=post_id ");

            while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {

                if ($line['post_comment_count'] == 0) {
                } else {
                    $this->connection->exec("UPDATE cms.posts SET post_comment_count=post_comment_count-'1' WHERE '$postid'=post_id");
                }
            }
        }
        $this->connection->exec("UPDATE cms.comments SET comment_status='$status' WHERE '$id'=comment_id");
        $this->disconnect();
    }
    /*users */


    public function  get_allusers()
    {
        $this->connect();

        $searchResult = $this->connection->query("SELECT * FROM users ");

        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {
            echo " 
 <tr>
<td>" . $line['user_id'] . "</td>

<td>" . $line['user_username'] . "</td>
<td>" . $line['user_firstname'] . "</td>

<td>" . $line['user_lastname'] . "</td>
<td>" . $line['user_email'] . "</td>
<td >" . $line['user_role'] . "</td>

";
            if ($line['user_role'] == 'admin') {
                echo "
    <td>*</td>
    <td><a href='?page=7&&subscriber=" . $line['user_id'] . "'>subscriber</a></td>
    ";
            }
            if ($line['user_role'] == 'subscriber') {
                echo "
    <td><a href='?page=7&&admin=" . $line['user_id'] . "'>admin</a></td>
    <td>*</td>


    ";
            }
            echo "
            <td><a href='?page=7&source=edit_user&edit=" . $line['user_id'] . "'>Edit</a></td>
            <td><a href='?page=7&delete=" . $line['user_id'] . "'>Delete</a></td>
            </tr>
            ";
        }
        $this->disconnect();
    }


    public function update_userstatus($id, $status)
    {
        $this->connect();
        $this->connection->exec("UPDATE cms.users SET user_role='$status' WHERE '$id'=user_id");
        $this->disconnect();
    }

    //deltee category by id
    public function delete_userbyid($id)
    {
        $this->connect();
        $user = $this->getuserbyid($id);
        $email = $user->getemail();
        if ($_SESSION['userid'] != $id) {
            $searchResult =  $this->connection->query("SELECT * FROM  comments WHERE '$email'=comment_email ");

            while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {

                $this->delete_commentbyid($line['comment_id'], $line['comment_post_id']);
            }

            $this->connection->exec("DELETE  FROM users WHERE '$id'=user_id ");
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
            Cant Delete Admin User</div>";
        }

        $this->disconnect();
    }


    //add new category
    public function add_user($user)
    {
        $password = $user->getpassword();
        $username = $user->getusername();
        $firstname = $user->getfirstname();
        $lastname = $user->getlastname();
        $email = $user->getemail();
        $role = $user->getrole();

        $password = str_replace(array('\'', '\''), "", $password);
        $username = str_replace(array('\'', '\''), "", $username);
        $firstname = str_replace(array('\'', '\''), "", $firstname);
        $lastname = str_replace(array('\'', '\''), "", $lastname);
        $email = str_replace(array('\'', '\''), "", $email);


        $password = password_hash($password, PASSWORD_DEFAULT); //encrype the password
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM users WHERE '$email'=user_email"); //a qurey to check if the user exists in the data base by id

        if (($searchResult->fetch(PDO::FETCH_ASSOC)) == NULL) {

            $this->connection->exec("INSERT INTO users(
            user_password,
            user_username,
            user_firstname,
            user_lastname,
            user_email,
            user_role
        ) VALUES(
            '$password',
            '$username',
            '$firstname',
            '$lastname',
            '$email',
            '$role'
            
            )");

            echo "<div class=\"alert alert-success\" role=\"alert\">
            SignUp Complete !</div>";
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
          Email exsist</div>";
        }


        $this->disconnect();
    }

    public function getuserbyid($id)
    {
        $user = new User;
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM users WHERE user_id ='$id'");

        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {

            $user->setpassword($line['user_password']);
            $user->setusername($line['user_username']);
            $user->setfirstname($line['user_firstname']);
            $user->setlastname($line['user_lastname']);
            $user->setemail($line['user_email']);
            $user->setrole($line['user_role']);
        }
        return $user;
    }

    public function getuserbyemail($email)
    {

        $user = new User;
        $this->connect();
        $searchResult = $this->connection->query("SELECT * FROM users WHERE user_email ='$email'");
        while ($line = $searchResult->fetch(PDO::FETCH_ASSOC)) {

            $user->setpassword($line['user_password']);
            $user->setusername($line['user_username']);
            $user->setfirstname($line['user_firstname']);
            $user->setlastname($line['user_lastname']);
            $user->setemail($line['user_email']);
            $user->setrole($line['user_role']);
            $user->setid($line['user_id']);
        }
        return $user;
    }
    public function update_user($user)
    {
        $password = $user->getpassword();
        $username = $user->getusername();
        $firstname = $user->getfirstname();
        $lastname = $user->getlastname();
        $email = $user->getemail();
        $id = $user->getid();

        $password = str_replace(array('\'', '\''), "", $password);
        $username = str_replace(array('\'', '\''), "", $username);
        $firstname = str_replace(array('\'', '\''), "", $firstname);
        $lastname = str_replace(array('\'', '\''), "", $lastname);
        $email = str_replace(array('\'', '\''), "", $email);

        $this->connect();

        $password = password_hash($password, PASSWORD_DEFAULT); //encrype the password

        $this->connection->exec("UPDATE users SET user_password = '$password',user_username= '$username',
        user_firstname='$firstname',user_lastname='$lastname',user_email='$email' WHERE user_id='$id'");
        $this->disconnect();
    }

    public function login($email, $password) //function to check the log in info of the user 
    {
        $email = str_replace(array('\'', '\''), "", $email);
        $password = str_replace(array('\'', '\''), "", $password);

        $this->connect();
        $searchUser = $this->connection->query("SELECT * FROM users  WHERE '$email'=user_email"); //a qurey to check if the user exists in the data base by id
        $userinfo = $searchUser->fetch(PDO::FETCH_ASSOC);
        if (($userinfo) != NULL) {

            if (password_verify($password, $userinfo['user_password'])) {

                $this->disconnect();
                if ($userinfo['user_role'] == 'admin') {
                    return 'admin';
                } else {
                    return 'sub';
                }
            }
            $this->disconnect();

            return FALSE;
        }
        $this->disconnect();

        return FALSE;
    }
}
