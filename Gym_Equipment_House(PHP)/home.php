<?php
    include('Mysql_Database/connect.php');
    include('Functions/common_functions.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Commerce Website</title>
    <!-- bootstrap css link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="home.css">
    
</head>
<body>
<div class="container-fluid p-0">
    <!-- first  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php"><img src="./images/logo.jpg" class="logo" alt="Nothing Found"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">হোম </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registration.php">নিবন্ধন করুন</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">যোগাযোগ করুন</a>
      </ul>
      <form class="d-flex" role="search" action="search.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" 
        aria-label="Search" name="search_data">
        <input type="submit" value="খোঁজ করুন" class="btn btn-outline-light" name="search_data_product">
        <!-- <a href="login.php" class="btn btn-success" style="margin-left: 10px;">লগইন</a> -->
      </form>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <?php
        if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
          $user_name = $_SESSION['user_name'];
          echo "<a class='nav-link text-white ' href='#'><b>আমাদের পেজে স্বাগতম $user_name </b></a>";
        }
        else{
          echo "<a class='nav-link text-white ' href='#'><b>আমাদের পেজে স্বাগতম </b></a>";
        }
        ?>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <?php
        if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])){
          echo "<a class='nav-link text-white ' href='logout.php'><b> লগ-আউট </b></a>";
        }
        elseif(  !isset($_SESSION['user_name']) ) {
           
            echo "<a class='nav-link text-white ' href='user_login.php'><b>লগইন করুন</b></a>";
      
          }
        
        ?>
      </li>
    </ul>
  </div>
</nav>

<!-- second  -->
<div class="">
    <h2 class="text-center mt-2">জিম সরঞ্জাম ঘর</h2>
    <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate, perspiciatis.</p>
</div>

<!-- third -->
<div class="row">
    <div class="col-md-10"> 
        <!-- products -->
        <div class="row px-3">
        <?php
        getproducts();
        get_categories();

?>
        </div>
    </div>
    <div class="col-md-2 bg-secondary p-0">

        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-dark">
                <a href="#" class="nav-link text-white"><h3>Brands</h3></a>
            </li>
            <?php
               getbrands();
            ?>
        </ul>
        <br>
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-dark">
                <a href="#" class="nav-link text-white"><h3>Categories</h3></a>
            </li>
            <?php
             getcategories();
            ?>
        </ul>
    </div>
    
</div>

<!-- last -->
 <div class="bg-black text-white p-3 text-center">
    <p class="text">All rights reserved <i class="fa-regular fa-copyright"></i> - Designed by Amin Talukder </p>
    </div>

</div>

<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>
</body>
</html>