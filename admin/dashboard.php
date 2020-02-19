<h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
</ol>
<?php
  $count_student = mysqli_query($db,"SELECT * FROM `student_info`");
  $total_student = mysqli_num_rows($count_student);

  $count_user = mysqli_query($db,"SELECT * FROM `users`");
  $total_user = mysqli_num_rows($count_user);
?>

  <div class="row">
    <div class="col-sm-4 bg-info">
      <div class="panel p-3 panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-users fa-5x"></i>
            </div>
            <div class="col-xs-9">
              <div class="pull-right" style="font-size: 45px"><?= $total_student ?></div>
              <div class="clearfix"></div>
              <div class="pull-right">All Students</div>
            </div>
          </div>
        </div>
      </div>
      <a href="index.php?page=allStudents">
        <div class="panel-footer bg-danger">
          <div class="pull-left font-weight-bold text-white">All Students</div>
          <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>

    <div class="col-sm-4 bg-secondary ml-2">
      <div class="panel p-3 panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-3">
              <i class="fa fa-users fa-5x"></i>
            </div>
            <div class="col-xs-9">
              <div class="pull-right" style="font-size: 45px"><?= $total_user ?></div>
              <div class="clearfix"></div>
              <div class="pull-right">All Users</div>
            </div>
          </div>
        </div>
      </div>
      <a href="index.php?page=allUsers">
        <div class="panel-footer bg-danger">
          <div class="pull-left font-weight-bold text-white">All Users</div>
          <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <hr />
  <h3>New Students</h3>
  <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Roll</th>
          <th>City</th>
          <th>Contact</th>
          <th>Photo</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $student_info = mysqli_query($db,"SELECT * FROM `student_info`");
          while($row = mysqli_fetch_assoc($student_info)){?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['roll']; ?></td>
          <td><?php echo $row['city']; ?></td>
          <td><?php echo $row['parent_contact']; ?></td>
          <td><img src="../img/student_images/<?php echo $row['photo']; ?>" width="80px" height="80px" alt=""></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>