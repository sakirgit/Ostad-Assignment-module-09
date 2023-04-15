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

 

    /* Get a blog post by ID */
    function getPostById($id) {
        global $mysqli;
    //    $sql = "SELECT * FROM blog_posts WHERE id = $id";
        $sql = "SELECT  bp.id AS post_id, bp.title, bp.description, bp.post_image, bp.datetime,bp.status, bp.user_id 
                FROM 
                    blog_posts bp
                WHERE 
                    bp.id = $id";
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

    /* Delete a blog post */
    function deletePost($id) {
        global $mysqli;
        $sql = "DELETE FROM blog_posts WHERE id = $id";
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

    if( isset( $_POST['post_update'] ) ){
        /* Update an existing blog post with image */
        $post_id = $_POST['post_id'];

        $id = $mysqli->real_escape_string($_POST['post_id']);
        $title = $mysqli->real_escape_string($_POST['title']);
        $description = $mysqli->real_escape_string($_POST['description']);
        $user_id = $mysqli->real_escape_string($_SESSION["id"]);
        

        if( !empty($_FILES['post_image']['name']) ){
            $post_image = uploadImage($_FILES['post_image']);
            $sql = "UPDATE blog_posts SET title = '$title', description = '$description', post_image = '$post_image', user_id = $user_id WHERE id = $id";
        }else{
            $sql = "UPDATE blog_posts SET title = '$title', description = '$description', user_id = $user_id WHERE id = $id";
        }
        
        $mysqli->query($sql);

        $sql_del_post_cats = "DELETE FROM post_and_category WHERE post_id = $post_id";
        $mysqli->query($sql_del_post_cats);
    //    exit;
        foreach( $_POST['post_category'] as $cat_k => $cat_v ){

            //    echo '<pre>'; print_r( $cat_v ); echo '</pre>';
                $sql_cat = "INSERT INTO post_and_category (category_id, post_id) VALUES ( $cat_v, $post_id )";
                $mysqli->query($sql_cat);
            }

            header("location: post-edit.php?id=" . $post_id . "&success=1");
    }

    $sing_post = [];
    if( isset($_GET['id']) ){
        $sing_post = getPostById($_GET['id']);
    }
    $sing_post = (object) $sing_post;
    $page = 'post-add';

    
function post_categories( $post_id ){
   
    global $mysqli;

    $sql = "SELECT pnc.*, pc.category_title
            FROM 
            post_and_category pnc
                INNER JOIN post_categories pc ON pnc.category_id = pc.id
            WHERE 
            pnc.post_id = $post_id";
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

include_once("d-header.php"); 
?>
      <div class="col-md-9">
        <h5>Dashboard</h5>
        <h3>Home page content settings: </h3>
        <h5><a href="post-add.php">Add New Post</a> </h5>
        <?php 
            
            if( isset($_GET['success']) ){
                echo '<div class="alert alert-success" role="alert">
                    Updated success!
                </div>';
            }else if( isset($_GET['post-added']) ){
                echo '<div class="alert alert-success" role="alert">
                    Added new post!
                </div>';
            }
        ?>
        <hr>
         <h2>Edit blog post</h2>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
               <input type="hidden" class="form-control" id="post_id" name="post_id" value="<?php echo $sing_post->post_id; ?>" required>
            <div class="form-group">
               <label for="title">Title:</label>
               <input type="text" class="form-control" id="title" name="title" value="<?php echo $sing_post->title; ?>" required>
            </div>
            <div class="form-group">
               <label for="description">Content:</label>
               <textarea class="form-control" id="description" name="description" rows="12" required><?php echo $sing_post->description; ?></textarea>
            </div>
            <div class="form-group">
               <label for="post_image">Image:</label>
               <img src="<?php echo $sing_post->post_image; ?>" style="max-width: 100%; max-height: 400px;" class="border" >
               <input type="file" id="post_image" name="post_image" >
            </div>
            <div class="form-group">
                <h5>Category: </h5>
                <?php
                    $categories = getCategories($mysqli);
                    foreach( $categories as $cat_k => $cat_v ){ 
                        $isSelected = "";
                        if( post_categories( $sing_post->post_id ) ){

                            foreach( post_categories( $sing_post->post_id ) as $scat_k => $scat_v  ){
                                if( $scat_v["category_id"] == $cat_v['id'] ){
                                    $isSelected = "checked";
                                }
                            }
                        }
                        ?>
                        <div class="form-check">
                            <input type="checkbox" name="post_category[]" value="<?php echo $cat_v['id']; ?>" class="form-check-input" id="post_category<?php echo $cat_v['id']; ?>" <?php echo $isSelected; ?>>
                            <label class="form-check-label" for="post_category<?php echo $cat_v['id']; ?>">
                                <?php echo $cat_v['category_title']; ?>
                            </label>
                        </div>
                <?php } ?>
            </div>
            <button type="submit" class="btn btn-primary" name="post_update"> &nbsp; Update Post &nbsp; </button>
         </form>
      
<?php include_once("d-footer.php"); ?>
