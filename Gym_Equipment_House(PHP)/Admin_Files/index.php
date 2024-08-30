<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

    <style>
        .admin_image
{
    width: 110px;
    object-fit: contain;
    margin-left: 20px;
}
.button button {
    margin: 3px;
}
.bigger_button
{
    padding: 10px; 
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
}

    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
               <a href="index.php"><img src="../images/logo.jpg" class="logo" alt=""></a> 
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">Welcome Guest</a>
                        </li>
                    </ul>
            </nav>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center p-2">
                Manage Details
            </h3>
        </div>
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                <a href="#"><img src="../images/cartoon1.jpg" class="admin_image" alt=""></a>
                    <p class="text-center text-light"> Admin1</p>
                </div>
                    
            <div class="button text-center">
                <button><a href="insert_product.php" class="nav-link text-light bg-dark my-1 bigger_button">Insert Products</a></button>
                <button><a href="product.php" class="nav-link text-light bg-dark my-1 bigger_button">View Products</a></button>
                <button><a href="index.php?insert_categories" class="nav-link text-light bg-dark my-1  bigger_button">Insert Categories</a></button>
                <button><a href="category.php" class="nav-link text-light bg-dark my-1 bigger_button">View Categories</a></button>
                <button><a href="index.php?insert_brands" class="nav-link text-light bg-dark my-1  bigger_button">Insert Brands</a></button>
                <button><a href="brands.php" class="nav-link text-light bg-dark my-1 bigger_button ">View Brands</a></button>
                <button><a href="#" class="nav-link text-light bg-dark my-1 bigger_button">All Orders</a></button>
                <button><a href="#" class="nav-link text-light bg-dark my-1 bigger_button">Payments</a></button>
                <button><a href="user.php" class="nav-link text-light bg-dark my-1 bigger_button">User List</a></button>
                <button><a href="#" class="nav-link text-light bg-dark my-1 bigger_button">Logout</a></button>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_categories']))
        {
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brands']))
        {
            include('insert_brands.php');
        }
        ?>
    </div>
<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>
</body>
</html>