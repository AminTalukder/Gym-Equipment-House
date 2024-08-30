<?php
include('../Mysql_Database/connect.php');

if(isset($_POST['insert_products']))
{
    $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_keywords = mysqli_real_escape_string($conn, $_POST['product_keywords']);
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $product_brand = mysqli_real_escape_string($conn, $_POST['product_brand']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_status = 'true';

    $product_image1 = mysqli_real_escape_string($conn, $_FILES['product_image1']['name']);
    $product_image2 = mysqli_real_escape_string($conn, $_FILES['product_image2']['name']);
    $product_image3 = mysqli_real_escape_string($conn, $_FILES['product_image3']['name']);

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    if($product_title == '' || $product_description == '' || $product_keywords == '' || $product_category == '' || $product_brand == '' || $product_price == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == '')
    {
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    }

    else
    {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        $insert_product = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) 
        VALUES ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";
        
        $result = mysqli_query($conn, $insert_product);
        
        if($result)
        {
            echo "<script>alert('Product Inserted Successfully')</script>";
        }
        else
        {
            echo "Error: " . mysqli_error($conn); // Print any SQL error for debugging purposes.
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Insert Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

</head>
<body class="bg-light">
    <div class="container mt-2">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-otline mb-4 w-50 m-auto">
                <lable for="product_title" class="form-label">Product Title</lable>
                <input type="text" name="product_title"id="product_title" class="form-control"placeholder="Enter Product Title" required>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <lable for="product_description" class="form-label">Product Description</lable>
                <input type="text" name="product_description"id="product_description" class="form-control"placeholder="Enter Product Description" required>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <lable for="product_keywords" class="form-label">Product Keywords</lable>
                <input type="text" name="product_keywords"id="product_keywords" class="form-control"placeholder="Enter Product Keyword" autocomplete="off" required>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                        $sel_qurey= "SELECT * from categories";
                        $result_qurey= mysqli_query($conn,$sel_qurey);
                        while($row= mysqli_fetch_assoc($result_qurey))
                        {
                          $category_title= $row['category_title'];
                          $category_id = $row['category_id'];
                          echo "<option value='$category_id'>$category_title</option> ";
                        }
                    ?>
                </select>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select a Brand</option>
                    <?php
                        $sel_qurey= "SELECT * from brands";
                        $result_qurey= mysqli_query($conn,$sel_qurey);
                        while($row= mysqli_fetch_assoc($result_qurey))
                        {
                          $brands_title= $row['brand_title'];
                          $brands_id = $row['brand_id'];
                          echo "<option value='$brands_id'>$brands_title</option> ";
                        }
                    ?>
                </select>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <lable for="product_image1" class="form-label">Product Image</lable>
                <input type="file" name="product_image1"id="product_image1" class="form-control" required>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <lable for="product_image2" class="form-label">Product Image</lable>
                <input type="file" name="product_image2"id="product_image2" class="form-control" required>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <lable for="product_image3" class="form-label">Product Image</lable>
                <input type="file" name="product_image3"id="product_image3" class="form-control" required>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <lable for="product_price" class="form-label">Product Price</lable>
                <input type="text" name="product_price"id="product_price" class="form-control"placeholder="Enter Product Price" autocomplete="off" required>
            </div>
            <div class="form-otline mb-4 w-50 m-auto">
                <input type="submit" name="insert_products" class="btn btn-info" value="Insert Product">
            </div>


        </form>
    </div>
    
</body>
</html>