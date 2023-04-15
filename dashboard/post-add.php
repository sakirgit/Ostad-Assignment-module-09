<?php 
session_start();
include_once("../db-config.php"); 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

$title = "";
if( isset($_POST['title']) ){
    $title = $_POST['title'];
}

$description = "";
if( isset($_POST['content']) ){
    $description = $_POST['content'];
}

$post_category = "";
if( isset($_POST['post_category']) ){
    $post_category = $_POST['post_category'];
}

function getCategories($mysqli) {
    $sql = "SELECT * FROM post_categories";
    $result = $mysqli->query($sql);
 
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
        return $categories;
    } else {
        return false;
    }
 }

    /* Create a blog post */
    function createPost($title, $description, $post_image, $user_id) {
        global $mysqli;
        $datetime = date('Y-m-d H:i:s');
        $status = 1;
        $sql = "INSERT INTO blog_posts (title, description, post_image, datetime, status, user_id) VALUES ('$title', '$description', '$post_image', '$datetime', $status, $user_id)";
        $mysqli->query($sql);
    }
        
    if( isset( $_POST['post_add'] ) ){

        if( createPost($_POST['title'] ) ){
            header("location: category.php?added-new-category");
        $msg = "Added new category <b>". $_POST['title'] ."</b>";
        $msg_status = "success";
        }
    }
 

    /* Get a blog post by ID */
    function getPostById($id) {
        global $mysqli;
        $sql = "SELECT * FROM blog_posts WHERE id = $id";
        $result = $mysqli->query($sql);
        $post = $result->fetch_assoc();
        return $post;
    }

    /* Update a blog post */
    function updatePost($id, $title, $description, $post_image, $user_id) {
        global $mysqli;
        $sql = "UPDATE blog_posts SET title = '$title', description = '$description', post_image = '$post_image', user_id = $user_id WHERE id = $id";
        $mysqli->query($sql);
    }

    /* Upload an image for a blog post */
    function uploadImage($file) {
        $image_url = '';
        if(isset($file)) {
            $filename = $file['name'];
            $tempname = $file['tmp_name'];
            $folder = "uploads/".$filename;
            move_uploaded_file($tempname, $folder);
            $image_url = $folder;
        }
        return $image_url;
    }

    /* Add a new blog post with image */
    
    if( isset( $_POST['add_blog_post'] ) ){
        $post_image = "";
        if( isset($_FILES['post_image']) ){
            $post_image = uploadImage($_FILES['post_image']);
        }
        $title = $mysqli->real_escape_string($_POST['title']);
        $description = $mysqli->real_escape_string($_POST['description']);
        $user_id = $mysqli->real_escape_string($_SESSION["id"]);
        $sql = "INSERT INTO blog_posts (title, description, post_image, datetime, status, user_id) VALUES ('$title', '$description', '$post_image', NOW(), 1, $user_id)";
        $blog_posts = $mysqli->query($sql);

        $sql_get_last = "SELECT * FROM blog_posts ORDER BY id DESC";
        $res_sql_get_last = $mysqli->query($sql_get_last);
        $last_post = [];
        if ($res_sql_get_last->num_rows > 0) {
            $i = 0;
            while ($row = $res_sql_get_last->fetch_assoc()) {
                if( $i == 0 ){
                    $last_post = $row;
                }
                $i++;
            }
        }
        $last_post = (object) $last_post;
    //    echo '<pre>'; print_r( $last_post->id ); echo '</pre>';
    //    /*
        foreach( $_POST['post_category'] as $cat_k => $cat_v ){
        //    echo '<pre>'; print_r( $cat_v ); echo '</pre>';
            $sql_cat = "INSERT INTO post_and_category (category_id, post_id) VALUES ( $cat_v, $last_post->id )";
            $mysqli->query($sql_cat);
        }
        header("location: post-edit.php?id=". $last_post->id ."&post-added");
    //    */
    }

    $page = 'post-add';

include_once("d-header.php"); 
?>
      <div class="col-md-9">
        <h5>Dashboard</h5>
        <h3>Home page content settings: </h3>
        <hr>
         <h2>Create a New Blog post</h2>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <label for="title">Title:</label>
               <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
               <label for="description">Content:</label>
               <textarea class="form-control" id="description" name="description" rows="12" required></textarea>
            </div>
            <div class="form-group">
               <label for="post_image">Image:</label>
               <input type="file" id="post_image" name="post_image" >
            </div>
            <div class="form-group">
                <h5>Category: </h5>
                <?php
                    $categories = getCategories($mysqli);
                    foreach( $categories as $cat_k => $cat_v ){ ?>
                        <div class="form-check">
                            <input type="checkbox" name="post_category[]" value="<?php echo $cat_v['id']; ?>" class="form-check-input" id="post_category<?php echo $cat_v['id']; ?>" >
                            <label class="form-check-label" for="post_category<?php echo $cat_v['id']; ?>">
                                <?php echo $cat_v['category_title']; ?>
                            </label>
                        </div>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary" name="add_blog_post">Create Post</button>
         </form>
      
<?php include_once("d-footer.php"); ?>
