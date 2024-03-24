<?php
include("connectdb.php");
// COLLECTING DATA //

try {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $position = 0 ;

    if ($password != $cpassword) {
        echo '<script> alert("Password and confirm password not matched!") 
    window.location = " ../routes/register.html"
    </script>';
    } else {
        move_uploaded_file($tmp_name, "../files/$photo");
        $insert = "INSERT INTO user (name, mobile, email, password, photo, position, status, votes) VALUES ('$name', '$mobile', '$email', '$password', '$photo', '$position' , '0', '0')";
        if (mysqli_query($conn, $insert)) {
            echo '<script> alert("Registration successful") 
        window.location = " ../routes/login.html"
        </script>';
        } else {
            echo '<script> alert("Registration Un-successful") 
        window.location = " ../routes/register.html"
        </script>';
        }
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
