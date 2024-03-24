<?php
session_start();
include('connectdb.php');

$mobile = $_POST['mobile'];
$password = $_POST['password'];

$chk = mysqli_query($conn, "SELECT * FROM user WHERE mobile = '$mobile' AND password = '$password' ");

if (mysqli_num_rows($chk) > 0) {
    $userData = mysqli_fetch_array($chk);
    $grp = mysqli_query($conn, "SELECT * FROM user WHERE position = 1 ");
    $grpData = mysqli_fetch_all($grp, MYSQLI_ASSOC);

    $_SESSION['userData'] = $userData;
    $_SESSION['grpData'] = $grpData;

    echo '<script> alert("Login Success") 
    window.location = " ../routes/dashboard.php"
    </script>';

} else {
    echo '<script> alert("Invalide Credincials") 
        window.location = " ../routes/login.html"
        </script>';
}
