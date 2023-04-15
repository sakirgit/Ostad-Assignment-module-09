<?php 
session_start();
include_once("../db-config.php"); 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

$msg = "";
$msg_status = "";

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

function getCategoryById($mysqli, $id) {
   
    $sql = "SELECT * FROM post_categories WHERE id='$id'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
        $category = $result->fetch_assoc();
        return $category;
    } else {
        return false;
    }
}


function createCategory($mysqli, $category_title) {
   $sql = "INSERT INTO post_categories (category_title) VALUES ('$category_title')";
   $result = $mysqli->query($sql);

   if ($result) {
       return true;
   } else {
       return false;
   }
}

if( isset( $_POST['cat_add'] ) ){

   if( createCategory($mysqli, $_POST['title'] ) ){
        header("location: category.php?added-new-category");
      $msg = "Added new category <b>". $_POST['title'] ."</b>";
      $msg_status = "success";
   }
}


function updateCategory($mysqli, $id, $category_title) {
   $sql = "UPDATE post_categories SET category_title='$category_title' WHERE id='$id'";
   $result = $mysqli->query($sql);

   if ($result) {
       return true;
   } else {
       return false;
   }
}
if( isset( $_POST['cat_edit'] ) ){

   if( updateCategory($mysqli, $_POST['cat_id'], $_POST['title'] ) ){
        header("location: category.php?category-updated");
   }
}


function deleteCategory($mysqli, $id) {
   $sql = "DELETE FROM post_categories WHERE id='$id'";
   $result = $mysqli->query($sql);

   if ($result) {
       return true;
   } else {
       return false;
   }
}

if( isset( $_POST['delete_cat'] ) ){

   if( deleteCategory($mysqli, $_POST['cat_id'] ) ){
        header("location: category.php?category-removed");
      $msg_status = "success";
   }
}




    $page = 'category';

include_once("d-header.php"); 
?>
      <div class="col-md-9">
        <h5>Dashboard</h5>
        <h3>Home page content settings: </h3>
        <hr>
        <?php 
            if( isset($_GET['edit']) && getCategoryById($mysqli, $_GET['edit']) ){
                $cat = getCategoryById($mysqli, $_GET['edit']);  
                ?>
                <div class="card">
                    <div class="card-body">
                <h4>Edit category: </h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Category Name:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $cat["category_title"]; ?>" required>
                    <input type="hidden" class="form-control" id="cat_id" name="cat_id" value="<?php echo $cat["id"]; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="cat_edit"> &nbsp; Update &nbsp; </button>
                </form>
           </div>
           </div>
                <?php 
                if( $msg_status == "success" ){ ?>
                    <br>
                    <div class="alert alert-success" role="alert">
                    <?php echo $msg;?>
                    </div>
                <?php 
                }
                
            }else{ ?>
                <div class="card">
                    <div class="card-body">
                <h4>Add a New category: </h4>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Category Name:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <button type="submit" class="btn btn-primary" name="cat_add"> &nbsp;  &nbsp; Add &nbsp;  &nbsp; </button>
                </form>
           </div>
           </div>
                <br>
                <?php 
                    if( isset($_GET['added-new-category']) ){
                    echo '<div class="alert alert-success" role="alert">
                            Added new category!
                        </div>';
                    }else if(isset($_GET['category-updated'])){
                        echo '<div class="alert alert-success" role="alert">
                                Category Updated!
                            </div>';
                    }else if(isset($_GET['category-removed'])){
                        echo '<div class="alert alert-danger" role="alert">
                                Category Removed!
                            </div>';
                    }
                    
            } ?>
      <br>
<!-- HTML table to display data -->
<table class="table">
    <thead>
        <tr>
            <th>SL</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
         $categories = getCategories($mysqli);
         
         foreach( $categories as $cat_k => $cat_v ){ ?>

            <tr>
               <td><?php echo $cat_k + 1; ?></td>
               <td><?php echo $cat_v['category_title']; ?></td>
               <td>
                    <a href="category.php?edit=<?php echo $cat_v['id']; ?>">Edit</a> &nbsp; |
                    <form action="" method="post" class="delete_form">
                        <input type="hidden" name="cat_id" value="<?php echo $cat_v['id']; ?>">
                        <button type="submit" class="btn btn-link text-danger" name="delete_cat"> X </button>
                    </form>
                </td>
            </tr>
         <?php } ?>
         
    </tbody>
</table>
<?php include_once("d-footer.php"); ?>
