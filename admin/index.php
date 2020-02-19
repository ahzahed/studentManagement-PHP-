<?php
    session_start();
    require_once './db.php';
    if(!isset($_SESSION['user_login'])){
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/fontawesome.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
  <title>Student Management</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"> <i class="fa fa-user"></i> Amir Hamza</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php"> <i class="fa fa-user-plus"></i> Add User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=userProfile"> <i class="fa fa-user"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"> <i class="fa fa-power-off"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3">
        <div class="list-group">
          <a href="index.php?page=dashboard" class="list-group-item active"><i class="fa fa-dashboard"></i> Dashboard</a>
          <a href="index.php?page=addStudent" class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</a>
          <a href="index.php?page=allStudents" class="list-group-item"><i class="fa fa-users"></i> All Students</a>
          <a href="index.php?page=allUsers" class="list-group-item"><i class="fa fa-users"></i> All Users</a>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="content">
          <?php
            if(isset($_GET['page'])){
              $page = $_GET['page'].'.php';
            }else{
              $page = "dashboard.php";
            }
            if(file_exists($page)){
              require_once $page;
            }else{
              require_once '404.php';
            }
          ?>
        </div>
      </div>
    </div>
  </div>
    

  <script src="../js/jquery-3.4.0.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/custom.js"></script>
</body>

</html>