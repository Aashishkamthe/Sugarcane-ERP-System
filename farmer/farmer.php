<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="../style.css">

</head>

<body style="background: url(farmerBackground.jpg) center/cover no-repeat;">
    <?php
    // Start the session
    session_start();

    // Access the session variable
    $username = $_SESSION['username'];

    ?>

    <div class="profile-container">
        <div class="profile-picture">
            <img src="farmer.jpg" alt="Profile Picture">
        </div>

        <div class="profile-info">
            <h1><?php echo $username ?></h1>
            <p>Farmer</p>
        </div>

        <div class="links">
            <a href="order.php">Order History</a>
            <a href="farmerProfile.php">Profile</a>
            <a href="../logout.php">Log out</a>
        </div>
    </div>

</body>

</html>