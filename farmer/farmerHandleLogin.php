<?php
include '../server.php';

error_reporting(E_ERROR | E_PARSE);

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $log = "SELECT farmer_password FROM farmer_signup WHERE farmer_username = '$username';";
    $fetchPassword = mysqli_fetch_assoc(mysqli_query($con, $log));

    if ($fetchPassword['farmer_password'] == $password) {

        // Start the session
        session_start();

        // Set a session variable
        $_SESSION['username'] = $username;

        header("Location: farmer.php");

    } else {
        echo "
        <head>
    <link rel='stylesheet' href='../style.css'>
        </head>
        <body style='background: url(farmerBackground.jpg) center/cover no-repeat;'>
            <div id='LoginAlrt' class='AlertLoginSignup'>
                <span id='LoginAlrtclose' class='Alertclosebutton'>&times;</span>
                <p><b>Failed!  </b>Details do not match. Try logging in again! </p>
                <p>Auto redirect in 5 seconds</p>
            </div>
            </body>
            <script>
                let LoginAlrt = document.getElementById('LoginAlrt');
                let LoginAlrtclose = document.getElementById('LoginAlrtclose');
                LoginAlrtclose.onclick = function() {
                    LoginAlrt.style.display = 'none';
                }
            
                setTimeout(function(){
                    window.location.href = 'farmerLogin.php';
                }, 5000); 
            </script>";
    }
}

$con->close();
?>