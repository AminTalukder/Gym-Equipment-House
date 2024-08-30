<?php

include('../Mysql_Database/connect.php');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <th>Category ID</th>
            <th>Category Title</th>
        </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['category_id']}</td>
            <td>{$row['category_title']}</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No categories found.";
}

mysqli_close($conn);
?>
