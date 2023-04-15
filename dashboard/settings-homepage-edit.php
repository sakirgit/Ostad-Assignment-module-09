<?php 
session_start();
include_once("../db-config.php"); 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}



   // get form data
   $id = $_POST['id'];
   $title = $_POST['title'];
   $des = $_POST['content'];
   $status = $_POST['status'];
   $content_for = $_POST['content_for'];
   $image = '';

   // check if a new image is uploaded
   if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
       $image = $_FILES['image']['name'];
       $target = "uploads/" . basename($image);

       // move uploaded image to target directory
       if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
           // file uploaded successfully
       } else {
           // failed to upload file
       }
   }

   // update record in database
   $sql = "UPDATE settings_contents SET title='$title', des='$des', status='$status', content_for='$content_for'";

   // check if a new image is uploaded
   if($image != '') {
       $sql .= ", image='$target'";
   }

   $sql .= " WHERE id=$id";

   // execute the SQL statement
   if(mysqli_query($mysqli, $sql)) {
      header("location: settings-homepage.php?edit=" . $id . "&edit-success");
   } else {
       echo "Error updating record: " . mysqli_error($mysqli);
   }


$mysqli->close();
?>
