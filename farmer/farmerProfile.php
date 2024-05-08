<?php
include '../server.php';

// Assuming you have a session started and 'username' stored in the session
session_start();
$username = $_SESSION['username'];

// Fetch user details from the database
$sql = "SELECT * FROM `farmer_signup` WHERE `farmer_username` = '$username'";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Extract user details
    $name = $row['farmer_name'];
    $contact = $row['farmer_contact'];
    $address = $row['farmer_address'];
    $landArea = $row['land_area'];
    $displayUsername = $row['farmer_username'];
} else {
    // Handle the case where user details are not found
    $name = $contact = $address = $landArea = $displayUsername = "Not available";
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Profile</title>
    <!-- Font  -->
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="../style.css">
</head>

<body style='background: url(farmerBackground.jpg) center/cover no-repeat;'>

    <div class="profile-container">
        <h1>Profile</h1>

        <div class="profile-group">
            <h3>Name : <span> <?php echo $name; ?></span></h3>
        </div>

        <div class="profile-group">
            <h3>Username : <span><?php echo $displayUsername; ?></span></h3>
        </div>

        <div class="profile-group">
            <h3>Contact : <span><?php echo $contact; ?></span></h3>
        </div>

        <div class="profile-group">
            <h3>Address : <span><?php echo $address; ?></span></h3>
        </div>

        <div class="profile-group">
            <h3>Land Area : <span><?php echo $landArea; ?></span></h3>
        </div>
        <div style="text-align:center;">
            <a href="farmerHandleUpdate.php">Update</a>
            <a href="farmer.php">Back</a>
        </div>
    </div>

</body>

</html>