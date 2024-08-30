<?php

include('../Mysql_Database/connect.php');


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Description</th>
            <th>Product Keywords</th>
            <th>Category ID</th>
            <th>Brand ID</th>
            <th>Product Image 1</th>
            <th>Product Image 2</th>
            <th>Product Image 3</th>
            <th>Product Price</th>
            <th>Date</th>
        </tr>";

    // Loop through the rows and display data in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_description']}</td>
            <td>{$row['product_keywords']}</td>
            <td>{$row['category_id']}</td>
            <td>{$row['brand_id']}</td>
            <td>{$row['product_image1']}</td>
            <td>{$row['product_image2']}</td>
            <td>{$row['product_image3']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['date']}</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No products found.";
}

// Close the database connection
mysqli_close($conn);
?>
