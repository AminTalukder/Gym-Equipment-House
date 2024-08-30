<?php
    include('../Mysql_Database/connect.php');

    if(isset($_POST['insert_cart']))
    {
        $cat_title = $_POST['cat_title'];
        $sel_qurey = "SELECT * from categories where category_title='$cat_title'";
        $sel_result= mysqli_query($conn,$sel_qurey);
        $number=mysqli_num_rows($sel_result);
        if($number>0)
        {
            echo "<script>alert ('This category is already present in the Database')</script>";
        }
        else
        {
        $qurey=$query = "INSERT INTO categories (category_title) VALUES ('$cat_title')";
        $result= mysqli_query($conn,$qurey);
        if($result)
        {
            echo "<script> alert('Category has been added Successfully')</script>";
        }
    }
    }
?>

<h2 class="text-center">Insert Categories</h2>
<form action="#" method="POST" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-reciept"></i>
        </span> 
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories"
         aria-label="Categories" aria-describedby="basic-addon1" >
    </div>
    <div class="input-group w-10 mb-2 m-auto">
       <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cart" value="Insert Categories">
    </div>

</form>



