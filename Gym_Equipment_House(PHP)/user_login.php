
<?php 
session_start();

  include('Mysql_Database/connect.php');
  include('Functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>

    <!-- Boostrap Css Link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
</head>

<body>
  
  
<div class="container-fluid my-3">

    <h2 class="text-center"> লগইন </h2>

      <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">

          <form action="" method="post">

          <!-- User Name -->
            <div class="form-outline mb-4">
              <label for="user_username" class="form-label"> ব্যবহারকারীর নাম </label>

              <input type="text" id="user_username" class="form-control" placeholder="আপনার নাম লিখুন" 
              autocomplete="off" required="required" name="user_username"/>
            </div>

            
            <!-- password -->
            <div class="form-outline mb-4">
              <label for="user_password" class="form-label"> পাসওয়ার্ড </label>

              <input type="password" id="user_password" class="form-control" placeholder="আপনার পাসওয়ার্ড লিখুন" 
              autocomplete="off" required="required" name="user_password"/>
            </div>                                

            <!-- Button -->
            <div class="text-center">
              <input type="submit" value="লগইন" class="bg-dark py-2 px-3 text-white" name="user_login">
              <p class="fw-bold mt-2 pt-1 small"> তোমার কি একাউন্ট নেই? <a href="registration.php">নিবন্ধন</a> </p>
              
              

            </div>
          </form>
        </div>
      </div>
</div>

</body>
</html>

<!-- php code -->
<?php

if(isset($_POST['user_login'])){
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];

$select_query= "SELECT * FROM user_table where user_name='$user_username'";

$result= mysqli_query($conn,$select_query);
$row_count=mysqli_num_rows($result);

$row_data= mysqli_fetch_assoc($result);




if($row_count>0){
  $_SESSION['user_name'] = $user_username;
  if(password_verify($user_password,$row_data['user_password'])){

    echo"<script>alert('আপনি সফলভাবে লগ ইন করেছেন')</script>";
    echo"<script>window.open('home.php','_self')</script>";

    

  }
  else{
    echo"<script>alert('ইনভ্যালিড ক্রেডেনটিয়ালস')</script>";

  }

}

else{
  echo"<script>alert('ইনভ্যালিড ক্রেডেনটিয়ালস')</script>";
}

}
?>