<h1 class="text-primary"><i class="fa fa-user"></i> All Users <small>All Users Table</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard / </a></li>
    <li class="active"><i class="fa fa-user"></i> All Users</li>
</ol> 

        <div class="table-responsive">
          <table class="table table-hover table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Photo</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $users = mysqli_query($db,"SELECT * FROM `users`");
                while($row = mysqli_fetch_assoc($users)){?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo ucwords($row['name']); ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><img src="../img/<?php echo $row['photo']; ?>" width="80px" height="80px" alt=""></td>
                <td>
                    <a href="index.php?page=updateStudent&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"> Edit</i></a>
                    <a href="deleteStudent.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"> Delete</i></a>
                </td>
            </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>