<?php 
session_start();
include_once("../db-config.php"); 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}



// Define variables and initialize with empty values
$title = $description = $image = "";
$status = 1; // Set the post status to active by default

// Process form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate title
    if(empty(trim($_POST["title"]))){
        die("Please enter a title.");
    } else{
        $title = trim($_POST["title"]);
    }

    // Validate content
    if(empty(trim($_POST["content"]))){
        die("Please enter post content.");
    } else{
        $description = trim($_POST["content"]);
    }

    // Validate image upload
    if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        die("Please select an image to upload.");
    } else {
        $target_dir = "uploads/"; // Set the target directory
        $image = $target_dir . basename($_FILES["image"]["name"]); // Get the filename
        $imageFileType = strtolower(pathinfo($image,PATHINFO_EXTENSION)); // Get the file extension

        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false) {
            die("File is not an image.");
        }

        // Check if file already exists
        if (file_exists($image)) {
            die("Sorry, file already exists.");
        }

        // Allow only certain file formats
        if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
            die("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        // Upload the file
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
            die("Sorry, there was an error uploading your file.");
        }
    }

    // Prepare an insert statement
    $sql = "INSERT INTO settings_contents (title, des, image, status) VALUES (?, ?, ?, ?)";

    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssi", $title, $description, $image, $status);

        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Redirect to the dashboard page with a success message
            header("location: settings-homepage.php?success=1");
            exit();
        } else{
            die("Oops! Something went wrong. Please try again later.");
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $mysqli->close();

    $page = 'setting';
}

include_once("d-header.php"); 
?>
      <div class="col-md-9">
        <h5>Dashboard</h5>
        <h3>Home page content settings: </h3>
        <hr>
         <?php 
         if( isset($_GET['edit']) ){ 
            
            $item_id = $_GET['edit'];
            // Query to get the data of the item to be edited
            $sql = "SELECT * FROM settings_contents WHERE id = $item_id";

            $result = $mysqli->query($sql);

            // Fetch the data of the item to be edited
            $row = $result->fetch_assoc();
            if( isset($_GET['edit-success']) ){
               echo '<div class="alert alert-success" role="alert">
                     Updated success!
                  </div>';
            }
            ?>

            <div class="card">
                <div class="card-body">
                    <h2>Edit content</h2>
                    <h4><a href="settings-homepage.php">Add new</a></h4>
                    <form action="settings-homepage-edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea class="form-control" id="content" name="content" rows="5" required><?php echo $row['des']; ?></textarea>
                    </div>
                    <div class="form-group">
                    <img src="<?php echo $row['image']; ?>" style="max-width: 200px;" >
                        <label for="image">Image Change:</label>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                                <option value="1" <?php if ($row['status'] == 1) echo 'selected'; ?>>Active</option>
                                <option value="0" <?php if ($row['status'] == 0) echo 'selected'; ?>>Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Content for</label>
                        <select name="content_for" class="form-control">
                                <option value="" > Select </option>
                                <option value="logo" <?php if ($row['content_for'] == "logo") echo 'selected'; ?>>Site Logo</option>
                                <option value="home-welcome-message" <?php if ($row['content_for'] == "home-welcome-message") echo 'selected'; ?>>home-welcome-message </option>
                                <option value="footer-logo" <?php if ($row['content_for'] == "footer-logo") echo 'selected'; ?>>footer-logo </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
                    <?php
                
                }else{ ?>

                <div class="card">
                    <div class="card-body">
                        <h4>Create a besic content for site</h4>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image" >
                        </div>
                        <div class="form-group">
                            <label for="status">Content for</label>
                            <select name="status" class="form-control" name="content_for">
                                    <option value="" > Select </option>
                                    <option value="logo" >Site Logo</option>
                                    <option value="footer-logo" >footer-logo </option>
                                    <option value="home-welcome-message" >home-welcome-message </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>
                </div>
                <?php 
                } ?>
<hr>

<!-- HTML table to display data -->
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Content for</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php

         // Query to get all data from the settings_contents table
         $sql = "SELECT * FROM settings_contents";

         $result = $mysqli->query($sql);
        // Loop through all data and print them in table rows
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['des']; ?></td>
                <td><img src="<?php echo $row['image']; ?>" style="max-width: 100px;" ></td>
                <td><?php echo $row['content_for']; ?></td>
                <td><a href="settings-homepage.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
// Close database connection
$mysqli->close();
?>


<?php include_once("d-footer.php"); ?>
