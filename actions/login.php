<?php
include("connect.php");
session_start();

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$std = $_POST['std'];

$stmt = $conn->prepare("SELECT * FROM `userdata` WHERE username=? AND mobile=? AND standard=?");
$stmt->bind_param("sss", $username, $mobile, $std);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $hashed_password = $data['password'];

    if (password_verify($password, $hashed_password)) {
        $stmt = $conn->prepare("SELECT username,photo,votes,id FROM `userdata` WHERE standard='group'");
        $stmt->execute();
        $resultgroup = $stmt->get_result();

        if ($resultgroup->num_rows > 0) {
            $groups = $resultgroup->fetch_all(MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        }

        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        header("Location: ../partials/dashboard.php");
        exit();
    } else {
        echo '<script>
        alert("Invalid Password");
        window.location="../";
        </script>';
    }
} else {
    echo '<script>
    alert("Invalid Credentials");
    window.location="../";
    </script>';
}
