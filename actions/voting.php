<?php
session_start();
include('connect.php');

$votes = $_POST['groupvotes'];
$totalvotes = $votes + 1;

$gid = $_POST['groupid'];
$uid = $_SESSION['id'];

$updatevotes = mysqli_query($conn, "UPDATE `userdata` SET votes='$totalvotes' WHERE id='$gid'");
$updatstatus = mysqli_query($conn, "UPDATE `userdata` SET status=1 WHERE id='$uid'");

if ($updatevotes && $updatstatus) {
    $getgroups = mysqli_query($conn, "SELECT username, photo, votes, id FROM `userdata` WHERE standard='group'");
    $groups = mysqli_fetch_all($getgroups, MYSQLI_ASSOC);
    $_SESSION['groups'] = $groups;
    $_SESSION['status'] = 1;

    echo '<script>alert("Voting Successful"); window.location="../partials/dashboard.php";</script>';
} else {
    echo '<script>alert("Invalid Credentials"); window.location="../partials/dashboard.php";</script>';
}
