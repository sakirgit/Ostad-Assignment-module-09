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

   /* Delete a blog post */
   function deletePost($id) {
      
      global $mysqli;
      $sql = "DELETE FROM blog_posts WHERE id = $id";
      $result = $mysqli->query($sql);
         
      if ($result) {
         return true;
      } else {
            return false;
      }
   }


if( isset( $_POST['delete_post'] ) ){

   if( deletePost($_POST['post_id'] ) ){
        header("location: posts.php?post-removed");
      $msg_status = "success";
   }
}


    $page = 'post-add';


include_once("d-header.php"); 
?>
      <div class="col-md-9">
        <h5>Dashboard</h5>
        <h3>All Blog posts: </h3>
         <!-- HTML table to display data -->
         <?php 
            if(isset($_GET['post-removed'])){
               echo '<div class="alert alert-info" role="alert">
                     Post Removed!
                  </div>';
            }
         ?>
         <table class="table">
            <thead>
               <tr>
                  <th>SL</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Categories</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  // Query to get all data from the settings_contents table
                  $sql = "SELECT * FROM blog_posts ORDER BY id DESC";

                  $result = $mysqli->query($sql);
               // Loop through all data and print them in table rows
               while ($row = $result->fetch_assoc()) {
                     ?>
                     <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><img src="<?php echo $row['post_image']; ?>" style="max-width: 100px;"></td>
                        <td>
                           <?php 
                              if( post_categories($row['id']) ){
                                 foreach( post_categories($row['id']) as $cat_k => $cat_v ){
                                    echo $cat_v["category_title"] . "<b>, </b>";
                                 }
                              }
                           ?>
                        </td>
                        <td>
                           <a href="post-edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                           <a href="../single-post.php?id=<?php echo $row['id']; ?>">Front View</a> | 
                                    
                           <form action="" method="post" class="delete_form">
                                 <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                 <button type="submit" class="btn btn-link text-danger confirm_to_delet" name="delete_post"> X </button>
                           </form>
                        </td>
                     </tr>
               <?php
               }
               ?>
            </tbody>
         </table>
      
<?php include_once("d-footer.php"); ?>
