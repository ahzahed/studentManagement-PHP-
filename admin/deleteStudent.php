<?php
  require_once './db.php';
  $id = base64_decode($_GET['id']);
  mysqli_query($db, "DELETE FROM `student_info` WHERE `id` ='$id'");

  header("location:index.php?page=allStudents");
?>