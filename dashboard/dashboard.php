<?php 
session_start();
include_once("../db-config.php"); 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}


include_once("d-header.php"); 
?>
      <div class="col-md-9">
        <hr>
        <h2>Welcome to</h2>
        <h2>Dashboard Home Page</h2>
        <hr>
        
<?php include_once("d-footer.php"); ?>
