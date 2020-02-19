<?php
      $id = base64_decode($_GET['id']);
      $student_info = mysqli_query($db,"SELECT * FROM `student_info` WHERE `id` = '$id'");
      $allInfo =  mysqli_fetch_assoc($student_info);

      if(isset($_POST['updateStudent'])){
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $parent_contact = $_POST['parent_contact'];
        $class = $_POST['class'];
    
        $query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`parent_contact`='$parent_contact' WHERE `id`='$id'";
        $result = mysqli_query($db,$query);
    
        if($result){
            header('location:index.php?page=allStudents');
        }
    }
?>
<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small>Update Student</small></h1>
<ol class="breadcrumb">
    <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard / </a></li>
    <li><a href="index.php?page=dashboard"><i class="fa fa-users"></i> All Student / </a></li>
    <li class="active"><i class="fa fa-pencil-square-o"></i> Update Student</li>
</ol>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" name="name" placeholder="Student Name" id="name" class="form-control" value="<?= $allInfo['name'] ?>"/>
            </div>

            <div class="form-group">
                 <label for="roll">Roll Number</label>
                 <input type="text" name="roll" placeholder="Student Roll" id="roll" class="form-control" value="<?= $allInfo['roll'] ?>"/>
             </div>
             <div class="form-group">
                 <label for="class">Class Name</label>
                 <select name="class" id="class" class="form-control">
                     <option value="">Select Class</option>
                     <option <?php echo $allInfo['class']=='1st'?'selected=""':''; ?> value="1st">1st</option>
                     <option <?php echo $allInfo['class']=='2nd'?'selected=""':''; ?> value="2nd">2nd</option>
                     <option <?php echo $allInfo['class']=='3rd'?'selected=""':''; ?> value="3rd">3rd</option>
                     <option <?php echo $allInfo['class']=='4th'?'selected=""':''; ?> value="4th">4th</option>
                     <option <?php echo $allInfo['class']=='5th'?'selected=""':''; ?> value="5th">5th</option>
                     <option <?php echo $allInfo['class']=='6th'?'selected=""':''; ?> value="6th">6th</option>
                     <option <?php echo $allInfo['class']=='7th'?'selected=""':''; ?> value="7th">7th</option>
                     <option <?php echo $allInfo['class']=='8th'?'selected=""':''; ?> value="8th">8th</option>
                     <option <?php echo $allInfo['class']=='9th'?'selected=""':''; ?> value="9th">9th</option>
                     <option <?php echo $allInfo['class']=='10th'?'selected=""':''; ?> value="10th">10th</option>
                     <option <?php echo $allInfo['class']=='11th'?'selected=""':''; ?> value="11th">11th</option>
                     <option <?php echo $allInfo['class']=='12th'?'selected=""':''; ?> value="12th">12th</option>
                 </select>
             </div>
             <div class="form-group">
                 <label for="parent_contact">Parent Contact</label>
                 <input type="text" name="parent_contact" placeholder="01*********" pattern="01[1|5|6|7|8|9][0-9]{8}" id="parent_contact" value="<?= $allInfo['parent_contact'] ?>" class="form-control" />
             </div>
             <div class="form-group">
                 <label for="city">City</label>
                 <input type="text" name="city" placeholder="Student City" id="city" class="form-control" value="<?= $allInfo['city'] ?>"/>
             </div>
             <!-- <div class="form-group">
                 <label for="photo">Photo</label>
                 <input type="file" name="photo" placeholder="Student Photo" id="photo" class="form-control" required/>
             </div> -->
             <div class="form-group">
                 <input type="submit" name="updateStudent" class="form-control btn btn-primary" />
             </div>
        </form>
    </div>
</div>