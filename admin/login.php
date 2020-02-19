<?php
    require_once './db.php';
    session_start();
    if(isset($_SESSION['user_login'])){
        header('location:index.php');
    }
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $username_check = mysqli_query($db, "SELECT * FROM `users` WHERE `username` = '$username'");
        if(mysqli_num_rows($username_check)>0){
            $row = mysqli_fetch_assoc($username_check);
            if($row['password'] == md5($password)){
                if($row['status'] == 'active'){
                    $_SESSION['user_login'] = $username;
                    header('location: index.php');
                }
                else{
                    $status_inactive = "Your Status is inactive";
                }
            }
            else{
                $wrong_password = "This password Wrong";
            }
        }
        else{
            $username_not_found = "This username is not valid";
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
    <title>Student Managemetn</title>
</head>

<body>
    <div class="container border mt-5 p-5">
        <h1 class="text-center bg-warning p-3 border">Students Management System</h1>
        <br>
        <div class="row">
            <div class="m-auto">
                <h2 class="text-center">Admin Log In Form</h2>
                <form action="" method="POST">
                    <div>
                        <input type="text" placeholder="Username" name="username" required="" class="form-control" value="<?php if(isset($username)){echo $username;} ?>" />
                    </div>
                    <div>
                        <input type="password" placeholder="Password" name="password" required="" class="form-control" value="<?php if(isset($password)){echo $password;} ?>" />
                    </div>
                    <br />
                    <div class="text-center">
                        <input type="submit" value="Login" name="login" class="btn btn-info" />
                    </div>
                </form>
            </div>
        </div>
        <?php if(isset($username_not_found)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$username_not_found.'</div>';} ?>
        <?php if(isset($wrong_password)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$wrong_password.'</div>';} ?>
        <?php if(isset($status_inactive)){echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$status_inactive.'</div>';} ?>
    </div>
    

    <script src="../js/jquery-3.4.0.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>