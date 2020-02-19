<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/fontawesome.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>School Management</title>
</head>

<body>
    <div class="container mt-5" style="border: 2px solid red">
        <div class="row">
            <div class="col-lg-12 p-5">
                <a href="admin/login.php" class="btn btn-primary" style="float: right;">Log In</a>
                <h1 class="text-center">Welcome to Students Management System</h1>
                <form action="" method="POST">
                    <table class="table table-bordered mt-5" style="width: 400px; margin:0 auto;">
                        <tr>
                            <td class="text-center" colspan="2"><label>Student Information</label></td>
                        </tr>
                        <tr>
                            <td><label for="choose">Choose Class</label></td>
                            <td>
                            <select name="class" id="class" class="form-control" required>
                                <option value="">Select Class</option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                                <option value="3rd">3rd</option>
                                <option value="4th">4th</option>
                                <option value="5th">5th</option>
                                <option value="6th">6th</option>
                                <option value="7th">7th</option>
                                <option value="8th">8th</option>
                                <option value="9th">9th</option>
                                <option value="10th">10th</option>
                                <option value="11th">11th</option>
                                <option value="12th">12th</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="roll">Roll</label></td>
                            <td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="Roll Number" /></td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2"><input class="btn btn-default btn-primary" type="submit" value="Show Info" name="show_info"></td>
                        </tr>
                    </table>
                </form>
            </div>
            username = ahzahed
            password = 12345678
        </div>
        <?php
            require_once './admin/db.php';
            if(isset($_POST['show_info'])){ 
                $class = $_POST['class'];
                $roll = $_POST['roll'];

                $result = mysqli_query($db,"SELECT * FROM `student_info` WHERE `class` = '$class' and `roll` = '$roll'");
                if(mysqli_num_rows($result)==1){ 
                    $student_info = mysqli_fetch_assoc($result)
        ?>
        <div class="row">
            <div class="col-lg-12 pb-5">
                <table class="table table-bordered" style="width: 400px; margin:0 auto;">
                    <tr>
                        <td rowspan="5"><img src="/School Management/img/student_images/<?php echo $student_info['photo']; ?>" width="300px" height="300px" alt=""></td>
                            <td>Name</td>
                            <td><?=$student_info['name'];?></td>
                        </tr>
                    <tr>
                        <td>Roll</td>
                        <td><?=$student_info['roll'];?></td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td><?=$student_info['class'];?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?=$student_info['city'];?></td>
                    </tr>
                    <tr>
                        <td>Parent Contact</td>
                        <td><?=$student_info['parent_contact'];?></td>
                    </tr>
                </table>
            </div>
            <?php }else{ ?>
                <script type="text/javascript">alert('Data Not Found')</script>
            <?php }} ?>
        </div>
    </div>
    

    <script src="./js/jquery-3.4.0.min.js"></script>
	<script src="./js/popper.min.js"></script>
	<script src="./js/bootstrap.js"></script>
    <script src="./js/custom.js"></script>
</body>

</html>