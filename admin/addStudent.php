<?php
if(isset($_POST['addStudent'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $city = $_POST['city'];
    $parent_contact = $_POST['parent_contact'];
    $class = $_POST['class'];

    $photo = explode('.',$_FILES['photo']['name']);
    $extension = end($photo);
    $photo_name = $roll.'.'.$extension;

    $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `parent_contact`, `photo`) VALUES ('$name','$roll','$class','$city','$parent_contact','$photo_name')";
    $result = mysqli_query($db,$query);
    
    if($result){
        $success = "Data Successfully Uploaded";
        move_uploaded_file($_FILES['photo']['tmp_name'],'../img/student_images/'.$photo_name);
    }else{
        $error = "Something went wrong!";
    }

}
?>

<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small>Add New Student</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard / </a></li>
    <li class="active"><i class="fa fa-user-plus"></i> Add Student</li>
</ol>
<div class="row">
    <?php if(isset($success)) {echo '<p class="alert alert-success col-sm-6">'.$success.'</p>';} ?>
    <?php if(isset($error)) {echo '<p class="alert alert-danger col-sm-6">'.$error.'</p>';} ?>
</div>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" required/>
            </div>

            <div class="form-group">
                 <label for="roll">Roll Number</label>
                 <input type="text" name="roll" placeholder="Student Roll" id="roll" class="form-control" required/>
             </div>
             <div class="form-group">
                 <label for="class">Class Name</label>
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
             </div>
             <div class="form-group">
                 <label for="parent_contact">Parent Contact</label>
                 <input type="text" name="parent_contact" placeholder="01*********" pattern="01[1|5|6|7|8|9][0-9]{8}" id="parent_contact" class="form-control" required/>
             </div>
             <div class="form-group">
                 <label for="city">City</label>
                 <input type="text" name="city" placeholder="Student City" id="city" class="form-control" required/>
             </div>
             <div class="form-group">
                 <label for="photo">Photo</label>
                 <input type="file" name="photo" placeholder="Student Photo" id="photo" class="form-control" required/>
             </div>
             <div class="form-group">
                 <input type="submit" name="addStudent" class="form-control btn btn-primary" />
             </div>
        </form>
    </div>
</div>