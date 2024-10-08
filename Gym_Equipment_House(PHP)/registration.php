

<?php 
  include('Mysql_Database/connect.php');
  include('Functions/common_functions.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ব্যবহারকারীর রেজিস্ট্রেশান</title>

    <!-- Boostrap Css Link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
</head>

<body>
  
<div class="container-fluid my-3">

    <h2 class="text-center"> ব্যবহারকারীর রেজিস্ট্রেশান </h2>

      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">

          <form action="" method="post" enctype="multipart/form-data">

          <!-- User Name -->
            <div class="form-outline mb-4">
              <label for="user_username" class="form-label"> ব্যবহারকারীর নাম </label>

              <input type="text" id="user_username" class="form-control" placeholder="আপনার নাম লিখুন" 
              autocomplete="off" required="required" name="user_username"/>
            </div>

            <!-- Email -->
            <div class="form-outline mb-4">
              <label for="user_email" class="form-label"> ই-মেইল </label>

              <input type="email" id="user_email" class="form-control" placeholder="আপনার ইমেইল লিখুন" 
              autocomplete="off" required="required" name="user_email"/>
            </div>

            <!-- Img -->
            <div class="form-outline mb-4">
              <label for="user_image" class="form-label"> প্রোফাইল ছবি </label>

              <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
            </div>

          
            <!-- password -->
            <div class="form-outline mb-4">
              <label for="user_password" class="form-label"> পাসওয়ার্ড </label>

              <input type="password" id="user_password" class="form-control" placeholder="আপনার পাসওয়ার্ড লিখুন" 
              autocomplete="off" required="required" name="user_password"/>
            </div>

            <!-- Conf password -->
            <div class="form-outline mb-4">
              <label for="conf_user_password" class="form-label"> পাসওয়ার্ড নিশ্চিত করুন </label>

              <input type="password" id="conf_user_password" class="form-control" placeholder="আপনার পাসওয়ার্ড নিশ্চিত করুন" 
              autocomplete="off" required="required" name="conf_user_password"/>
            </div>

             <!-- User Address -->
             <div class="form-outline mb-4">
              <label for="user_address" class="form-label"> ঠিকানা </label>

              <input type="text" id="user_address" class="form-control" placeholder="আপনার ঠিকানা লিখুন" 
              autocomplete="off" required="required" name="user_address"/>
            </div>

            <!-- Contact -->
            <div class="form-outline mb-4">
              <label for="user_contact" class="form-label"> যোগাযোগ </label>

              <input type="text" id="user_contact" class="form-control" placeholder="আপনার মোবাইল নাম্বার প্রবেশ করুন" 
              autocomplete="off" required="required" name="user_contact"/>
            </div>

            <!-- Button -->
            <div class="text-center">
              <input type="submit" value="রেজিস্ট্রেশান" class="bg-dark py-2 px-3 text-white" name="user_register">
              <p class="fw-bold mt-2 pt-1 small"> ইতিমধ্যে একটি একাউন্ট আছে? <a href="user_login.php"> লগ-ইন </a> </p>

            </div>

          </form>

        </div>
      </div>

</div>

  
</body>
</html>

<?php
if(isset($_POST['user_register'])){

 $user_username=$_POST['user_username'];
 $user_email=$_POST['user_email'];  
 $user_password=$_POST['user_password'];
 $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
 $conf_user_password=$_POST['conf_user_password'];
 $user_address=$_POST['user_address'];
 $user_contact=$_POST['user_contact'];
 $user_image=$_FILES['user_image']['name'];
 $user_image_tmp=$_FILES['user_image']['tmp_name'];




$regexN= '/^([A-Za-z])+\s([A-Za-z]?)+\s?([A-Za-z])+$/';
 
if(preg_match($regexN,$user_username)){
   echo"Valid Name";
}
else{
   echo"Invalid Name";
}

echo"\n";


 $regexE = '/^[a-z\d\._-]+@([a-z\d-]+\.)+[a-z]{2,6}$/i';
 if(preg_match($regexE,$user_email)){
     echo"Valid Mail";
 }
 else{
     echo"Invalid mail";
 }

 echo"\n";


 $regexP = '/^[a-zA-Z0-9]{7,25}$/';
 
 
 if(preg_match($regexP,$user_password)){
     echo"Valid Password";
 }
 else{
     echo"Invalid Password";
 }
 echo"\n";

$regexM='/^(?:\+?88)?01[3-9]\d{8}$/';
if(preg_match($regexM,$user_contact)){
    echo"Valid Mobile Number";
}
else{
    echo"Invalid Mobile Number";
}

echo"\n";



$select_query="SELECT * FROM user_table where user_name = '$user_username' or user_email='$user_email'";
$result=mysqli_query($conn,$select_query); 

$rows_count=mysqli_num_rows($result);

if($rows_count>0){
  echo"<script>alert('User Name or Email or Both of them Already Exist')</script>";
}

else if($user_password!=$conf_user_password){
  echo"<script>alert('Password Did not match!! Try Again')</script>";
}

else{



 move_uploaded_file($user_image_tmp,"./product_images/$user_image");

 $insert_query= "INSERT INTO user_table (user_name,user_email,user_password,user_image,user_address,user_mobile) 
 VALUES ('$user_username','$user_email','$hash_password','$user_image','$user_address','$user_contact')";

 $sql_execute = mysqli_query($conn,$insert_query);

}

$_SESSION['user_name']=$user_username;


}
?>