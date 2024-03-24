<?php
session_start();
include('connectdb.php');

$votes = $_POST['gvote'];
$gid = $_POST['gid'];
$uid = $_SESSION['userData']['id'];
$totalVote = $votes + 1;

$updateVotes = mysqli_query($conn, "UPDATE user SET votes = '$totalVote' WHERE id='$gid' ");
$updateUser = mysqli_query($conn, "UPDATE user SET status = 1 WHERE id='$uid' ");

if($updateUser && $updateVotes){
    echo '<script> alert("Successfully Voted") 
    window.location = " ../routes/dashboard.php"
    </script>';
    $grp = mysqli_query($conn, "SELECT * FROM user WHERE position = 1 ");
    $grpData = mysqli_fetch_all($grp, MYSQLI_ASSOC);

    $_SESSION['grpData'] = $grpData;
    $_SESSION['userData']['status'] = 1;


}else{
    echo '<script> alert("Something went wrong try again!") 
    window.location = " ../routes/dashboard.php"
    </script>';
}
?>