<?php

include 'config.php';
$select="SELECT * FROM `patient`";
$patient=mysqli_query($conn,$select);
if(isset($_POST['result'])){
  $name=$_POST['name'];
  $age=$_POST['age'];
 
//image code 
   // Image Code
   $image_name = rand(0 , 90000000) .  $_FILES['image']['name'];
   $tmp_name = $_FILES['image']['tmp_name'];
   $location = "upload/" . $image_name;

   move_uploaded_file($tmp_name, $location);

   $insert= "INSERT INTO `patient`(`id`, `name`, `age`, `gender`, `birthday`, `image`) VALUES ('id','name','[value-3]','[value-4]','[value-5]','[value-6]')" ;
   $i=mysqli_query($conn,$insert);
   
}

// post ,get ,request , $_FIILES > Upload File

// Database Name image > image upload Copy folder 

?>

<h1 class="text-center text-info  mt-2 pt-2">Add patient Page </h1>

<div class="container col-6">
   <div class="card">
       <div class="card-body">
           <form method="post" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="">Name</label>
                   <input type="text" class="form-control" name="name">
               </div>
               <div class="form-group">
                   <label for="">Salary</label>
                   <input type="text" class="form-control" name="salary">
               </div>
               <!-- Upload File form User -->
               <div class="form-group">
                   <label for="">Image</label>
                   <input type="file" class="form-control" name="image">
               </div>

               <div class="form-group">
                   <label for="">Department ID</label>
                   <select name="depId" class="form-control">
                       <?php foreach ($departments as $data) : ?>
                           <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                       <?php endforeach; ?>
                   </select>
               </div>
               <button name="send" class="btn btn-info m-3"> Send Employees </button>
           </form>
       </div>
   </div>
</div>


