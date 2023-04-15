<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
            <img src="../img/logo-sm.png"  height="30" class="d-inline-block align-top " alt=""> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"> </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" >Admin Panel</a>
        </li>
        
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../"><b>Front Home</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">.</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">User Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
          <a href="dashboard.php" class="list-group-item list-group-item-action">Dashboard Home</a>
          <a href="settings-homepage.php" class="list-group-item list-group-item-action">General Settings</a>
          <a href="posts.php" class="list-group-item list-group-item-action">Blog Posts</a>
          <a href="post-add.php" class="list-group-item list-group-item-action">Add new Post</a>
          <a href="category.php" class="list-group-item list-group-item-action">Category Settings</a>
        </div>
      </div>