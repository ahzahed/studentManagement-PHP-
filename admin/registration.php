<?php
    require_once './db.php';
    session_start();
    if(isset($_POST['registration'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];


        $photo = explode('.',$_FILES['photo']['name']);
        $extension = end($photo);
        $photo_name = $username.'.'.$extension;

        $input_error = array();

        if(empty($name)){
            $input_error['name'] = "The name field is required";
        }
        if(empty($email)){
            $input_error['email'] = "The email field is required";
        }
        if(empty($username)){
            $input_error['username'] = "The username field is required";
        }
        if(empty($password)){
            $input_error['password'] = "The password field is required";
        }
        if(empty($c_password)){
            $input_error['c_password'] = "The conform password field is required";
        }
        if(empty($name)){
            $input_error['name'] = "The name field is required";
        }

        if(count($input_error) == 0){
            $email_check = mysqli_query($db,"SELECT * FROM `users` WHERE `email` = '$email';");
            if(mysqli_num_rows($email_check) == 0){
                $username_check = mysqli_query($db,"SELECT * FROM `users` WHERE `username` = '$username';");
                if(mysqli_num_rows($username_check) == 0){
                    if(strlen($username)>6){
                        if(strlen($password)>7){
                            if($password == $c_password){
                                $password = md5($password);
                                $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
                                $result = mysqli_query($db,$query);
                                if($result){
                                    $_SESSION['data_insert_success'] = "Data Insert Successfully";
                                    move_uploaded_file($_FILES['photo']['tmp_name'],'../img/'.$photo_name);
                                    header('location:registration.php');
                                }
                                else{
                                    $_SESSION['data_insert_error'] = "Data does not Insert Successfully";
                                }

                            }
                            else{
                                $password_not_match = "Password Does not match";
                            }
                        }
                        else{
                            $password_length = "Password More than 8 characters";
                        }
                    }
                    else{
                        $username_length = "Username more than 8 characters";
                    }
                }
                else{
                    $username_error = "This username is already exists";
                }
            }
            else{
                $email_error = "This email is already exists";
            }
        }
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
    <title>User Registration Form</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">User Registration Form</h1>
        <?php if(isset($_SESSION['data_insert_success'])) {echo '<div class="alert alert-success">'.$_SESSION['data_insert_success'].'</div>';} unset($_SESSION['data_insert_success']); ?>
        <?php if(isset($_SESSION['data_insert_error'])) {echo '<div class="alert alert-warning">'.$_SESSION['data_insert_error'].'</div>';} unset($_SESSION['data_insert_error']); ?>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="control-label col-sm-1">Name</label>
                        <div class="col-sm-4">
                            <input type="text" id="name" placeholder="Enter your name" name="name" value="<?php if(isset($name)) {echo $name; } ?>" class="form-control">
                        </div>
                        <label class="error">
                            <?php
                                if(isset($input_error['name'])){
                                    echo ($input_error['name']); 
                                }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-sm-1">Email</label>
                        <div class="col-sm-4">
                            <input type="email" id="email" placeholder="Enter your email" value="<?php if(isset($email)) {echo $email; } ?>" name="email" class="form-control">
                        </div>
                        <label class="error">
                            <?php
                                if(isset($input_error['email'])){
                                    echo ($input_error['email']); 
                                }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                                if(isset($email_error)){
                                    echo $email_error; 
                                }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label col-sm-1">Username</label>
                        <div class="col-sm-4">
                            <input type="text" id="username" placeholder="Enter your username" value="<?php if(isset($username)) {echo $username; } ?>" name="username" class="form-control">
                        </div>
                        <label class="error">
                            <?php
                                if(isset($input_error['username'])){
                                    echo ($input_error['username']); 
                                }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                                if(isset($username_error)){
                                    echo $username_error; 
                                }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                                if(isset($username_length)){
                                    echo $username_length; 
                                }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label col-sm-1">Password</label>
                        <div class="col-sm-4">
                            <input type="password" id="password" placeholder="Enter your Password" value="<?php if(isset($password)) {echo $password; } ?>" name="password" class="form-control">
                        </div>
                        <label class="error">
                            <?php
                                if(isset($input_error['password'])){
                                    echo ($input_error['password']); 
                                }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                                if(isset($password_length)){
                                    echo ($password_length); 
                                }
                            ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="c_password" class="control-label col-sm-1">Confirm password</label>
                        <div class="col-sm-4">
                            <input type="password" id="c_password" placeholder="Enter your conform password" value="<?php if(isset($c_password)) {echo $c_password; } ?>" name="c_password" class="form-control">
                        </div>
                        <label class="error">
                            <?php
                                if(isset($input_error['c_password'])){
                                    echo ($input_error['c_password']); 
                                }
                            ?>
                        </label>
                        <label class="error">
                            <?php
                                if(isset($password_not_match)){
                                    echo ($password_not_match); 
                                }
                            ?>
                        </label>
                        
                    </div>
                    <div class="form-group">
                        <label for="photo" class="control-label col-sm-1">Photo</label>
                        <div class="col-sm-4">
                            <input type="file" id="photo" name="photo" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <input type="submit" value="Registration" name="registration" class="btn btn-info" />
                    </div>
                </form>
            </div>
        </div>
        <br />
        <p>Already have an account? Please, <a href="login.php">Login</a></p>
    </div>
    

    <script src="../js/jquery-3.4.0.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>