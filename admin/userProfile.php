<?php 
    $logged_user = $_SESSION['user_login'];
    $user_data = mysqli_query($db,"SELECT * FROM `users` WHERE `username` = '$logged_user'");
    $user_value = mysqli_fetch_assoc($user_data);
?>

<h1 class="text-primary"><i class="fa fa-user"></i> User Profile <small>My Profile</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-user"></i> Profile</li>
</ol>

<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered">
            <tr>
                <td>User Id</td>
                <td><?= $user_value['id']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= ucwords($user_value['name']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?= $user_value['username']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $user_value['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= ucwords($user_value['status']); ?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?= $user_value['regdate']; ?></td>
            </tr>
        </table>
        <a href="" class="btn btn-info btn-sm">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href="#">
            <img class="img-thumbnail" src="../img/<?=$user_value['photo']; ?>" alt="">
        </a>
        <br><br>
        <?php
            if(isset($_POST['upload'])){
                $photo = explode('.',$_FILES['photo']['name']);
                $extension = end($photo);
                $photo_name = $logged_user.'.'.$extension;

                $upload = mysqli_query($db,"UPDATE `users` SET `photo`='$photo_name' WHERE `username`='$logged_user'");
                if($upload){
                    move_uploaded_file($_FILES['photo']['tmp_name'],'../img/'.$photo_name);
                }
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="photo">Profile Picture</label>
            <input type="file" name="photo" id="photo" required>
            <input type="submit" name="upload" value="Upload" class="btn btn-sm btn-primary">
        </form>
    </div>
</div>