<?php
include '../server.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $landArea = $_POST['landArea'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $address = $_POST['address']; 
    $confirmPassword = $_POST['confirmPassword'];

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM `farmer_signup` WHERE `farmer_username` = '$username'";
    $result = mysqli_query($con, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "
        <head>
    <link rel='stylesheet' href='../style.css'>
        </head>
        <body style='background: url(farmerBackground.jpg) center/cover no-repeat;'>
            <div id='userNameAlrt' class='AlertLoginSignup'>
                <span id='userNameAlrtclose' class='Alertclosebutton'>&times;</span>
                <p><b>Failed!  </b>Username already exists. Please choose a different username. </p>
                <p>Auto redirect in 5 seconds</p>
            </div>
            </body>
            <script>
                let userNameAlrt = document.getElementById('userNameAlrt');
                let userNameAlrtclose = document.getElementById('userNameAlrtclose');
                userNameAlrtclose.onclick = function() {
                    userNameAlrt.style.display = 'none';
                }
            
                setTimeout(function(){
                    window.location.href = 'farmerSignup.php';
                }, 5000); 
            </script>";



        echo "";
    } elseif ($password === $confirmPassword) {
    $sql = "INSERT INTO `farmer_signup` ( `farmer_name`, `farmer_username`, `farmer_contact`, `farmer_address`, `land_area`, `farmer_password`) VALUES ('$name', '$username', '$contact', '$address', '$landArea', '$password');";
    if (mysqli_query( $con,$sql)){
        echo "
        <head>
    <link rel='stylesheet' href='../style.css'>
        </head>
        <body style='background: url(farmerBackground.jpg) center/cover no-repeat;'>
            
                <div id='SignupSuccess' class='AlertLoginSignup' style='background-color: #C3EDC0 !important;'>
    <span id='SignupSuccessclose' class='Alertclosebutton'>&times;</span>
    <p><b>Success!  </b>Details are saved. You can Login now! </p>
                <p>Auto redirect in 5 seconds</p>
            </div>
            </body>
            <script>
                let SignupSuccess = document.getElementById('SignupSuccess');
                let SignupSuccessclose = document.getElementById('SignupSuccessclose');
                SignupSuccessclose.onclick = function() {
                    SignupSuccess.style.display = 'none';
                }
            
                setTimeout(function(){
                    window.location.href = 'farmerLogin.php';
                }, 5000); 
            </script>";
        
    }}
    else {
        echo "
        <head>
    <link rel='stylesheet' href='../style.css'>
        </head>
        <body style='background: url(farmerBackground.jpg) center/cover no-repeat;'>
            <div id='SingupAlrt' class='AlertLoginSignup'>
                <span id='SingupAlrtclose' class='Alertclosebutton'>&times;</span>
                <p><b>Failed!  </b>Password doesn't match or ".mysqli_error($con)."</p>
                <p>Auto redirect in 5 seconds</p>
            </div>
            </body>
            <script>
                let SingupAlrt = document.getElementById('SingupAlrt');
                let SingupAlrtclose = document.getElementById('SingupAlrtclose');
                SingupAlrtclose.onclick = function() {
                    SingupAlrt.style.display = 'none';
                }
            
                setTimeout(function(){
                    window.location.href = 'farmerSignup.php';
                }, 5000); 
            </script>";
        
    }
    
}


?>