<?php
include('Mysql_Database/connect.php');

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['opinion'];

    // Check if the email is already present in the database
    $sel_query = "SELECT * FROM contact WHERE email='$email'";
    $sel_result = mysqli_query($conn, $sel_query);
    $number = mysqli_num_rows($sel_result);

    if ($number > 0) {
        echo "<script>alert('This email is already present in the database.')</script>";
    } else {
        // Insert the contact information into the database
        $query = "INSERT INTO contact (name, email, opinion) VALUES ('$name', '$email', '$contact')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect the user to the home page
            echo "<script>alert('Your opinion has been submitted successfully.');window.location.href='home.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Contact Us</h1>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="opinion">Opinion:</label>
                <textarea class="form-control" name="opinion" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>