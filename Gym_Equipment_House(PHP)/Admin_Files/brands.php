<?php

include('../Mysql_Database/connect.php');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM brands";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
        <tr>
            <th>Brand ID</th>
            <th>Brand Title</th>
        </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['brand_id']}</td>
            <td>{$row['brand_title']}</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No brands found.";
}

mysqli_close($conn);
?>
