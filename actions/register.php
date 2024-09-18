<?php
include('connect.php');

$username = $_POST['name'];
$mobile = $_POST['phone'];
$password = $_POST['password'];
$cpassword = $_POST['confirm_password'];
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$std = $_POST['type'];

if ($password != $cpassword) {
    echo '<script>alert("Password not match");
        window.location="../partials/registeration.php";
    </script>';
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    move_uploaded_file($tmp_name, "../uploads/$image");
    $sql = "INSERT INTO `userdata` (username,mobile,password,photo,standard,status,votes) VALUES ('$username','$mobile','$hashed_password','$image','$std',0,0)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
        alert("Registeration Successfully");
        window.location="../";
        </script>';
    } else {
        die(mysqli_error($conn));
    }
}
