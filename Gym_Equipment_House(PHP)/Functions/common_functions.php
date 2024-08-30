<?php
  
  include('./Mysql_Database/connect.php');

    function getproducts()
    {
      global $conn;

      if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
      $select_qurey= "SELECT * from products ORDER BY rand()";
      $result_qurey = mysqli_query($conn,$select_qurey);
      while($row=mysqli_fetch_assoc($result_qurey))
      {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo "<div class='col-md-4'>
        <div class='card mb-2'>
<img src='./Admin_Files/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title </h5>
<p class='card-text'>$product_description</p>
<a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View Product</a>
<a href='home.php?add-to-cart=$product_id' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Add to cart'><i class='fa-solid fa-cart-plus'></i></a>
</div>
</div>
</div>";

}



 }
}
}

function getbrands()
{
  global $conn;
  $sel_brand= "SELECT * from brands";
  $result_brand= mysqli_query($conn,$sel_brand);
  while($row_data = mysqli_fetch_assoc($result_brand))
  {
    $brand_title= $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo " <li class='nav-item'>
    <a href='home.php?brand=$brand_title' class='nav-link text-white'><h5>$brand_title</h5></a>
    </li>";
  }
}

function getcategories()
{
  global $conn;
  $sel_cat= "SELECT * from categories";
  $result_cat= mysqli_query($conn,$sel_cat);
  while($row_data = mysqli_fetch_assoc($result_cat))
  {
    $cat_title= $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo " <li class='nav-item'>
    <a href='home.php?brand=$category_id' class='nav-link text-white'><h5>$cat_title</h5></a>
    </li>";
  }
}




function get_categories()
{
    global $conn;

    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM products WHERE brand_id = $brand_id";
        $result_query = mysqli_query($conn, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            // Retrieve product data and display it
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];

            // Output product information
            echo "<div class='col-md-4'>
                <div class='card mb-2'>
                    <img src='./Admin_Files/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <i class='fa-regular fa-star'></i>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-dark'>View Product</a>
                        <a href='home.php?add-to-cart=$product_id' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Add to cart'><i class='fa-solid fa-cart-plus'></i></a>
                    </div>
                </div>
            </div>";
        }
    }
}


function searchproduct()
{
  global $conn;
  if(isset($_GET['search_data_product']))
  {
  $search_data = $_GET['search_data'];
  $search_qurey= "SELECT * from products where product_keywords like '%$search_data%'";
  $result_qurey = mysqli_query($conn,$search_qurey);
  while($row=mysqli_fetch_assoc($result_qurey))
  {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo "<div class='col-md-4'>
    <div class='card mb-2'>
<img src='./Admin_Files/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title </h5>
<i class='fa-regular fa-star'></i>
<i class='fa-regular fa-star'></i>
<i class='fa-regular fa-star'></i>
<i class='fa-regular fa-star'></i>
<i class='fa-regular fa-star'></i>
<p class='card-text'>$product_description</p>
<a href='product_details.php' class='btn btn-dark'>View Product</a>
<a href='home.php?add-to-cart=$product_id' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Add to cart'><i class='fa-solid fa-cart-plus'></i></a>
</div>
</div>
</div>";

}
  }
}
 function view_detail()
 {
  global $conn;
  if(isset($_GET['product_id'])) {
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
  $product_id = $_GET['product_id'];
  $select_qurey= "SELECT * from products where product_id=$product_id";
  $result_qurey = mysqli_query($conn,$select_qurey);
  while($row=mysqli_fetch_assoc($result_qurey))
  {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    echo "<div class='col-md-4'>
    <div class='card mb-2'>
<img src='./Admin_Files/product_images/$product_image1' class='card-img-top' alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title </h5>
<p class='card-text'>$product_description</p>
<a href='product_details.php?product_id=$product_id' class='btn btn-dark'>View Product</a>
<a href='home.php?add-to-cart=$product_id' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='Add to cart'><i class='fa-solid fa-cart-plus'></i></a>
</div>
</div>
</div>


<div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Products</h4>
                </div>
                <div class='col-md-6'>
                <img src='./Admin_Files/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                <img src='./Admin_Files/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                </div>
            </div>

        </div>
        
";

}



}
}
 }
}


function cart()
{
  if(isset($_GET['add-to-cart']))
  {
    global $conn;
    $get_pro_id=$_GET['add-to-cart'];
    $select_qurey = "SELECT * from cart where product_id=$get_pro_id";
    $result= mysqli_query($conn,$get_pro_id);
    $num_of_rows= mysqli_num_rows($result);
    if($num_of_rows>0)
    {
      echo "<script>alaert('This Item is present')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }  
    else{
      $insert_qurey="INSERT into cart (product_id,quantity) values ($get_pro_id,0)";
      $res=mysqli_query($conn,$insert_qurey);
      echo "<script>alaert('Added')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

?>