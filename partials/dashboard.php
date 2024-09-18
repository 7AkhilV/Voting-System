<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:../');
}
$data = $_SESSION['data'];

if ($_SESSION['status'] == 1) {
    $status = "<b>Voted</b>";
    $statusClass = "voted";
} else {
    $status = "<b>Not voted</b>";
    $statusClass = "not-voted";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <h1>Welcome to Dashboard</h1>
    <div class="container">
        <div class="group-info">
            <h2>Group Information</h2>
            <!-- group information -->
            <?php
            if (isset($_SESSION['groups'])) {
                $groups = $_SESSION['groups'];
                for ($i = 0; $i < count($groups); $i++) {
            ?>
                    <div class="group">
                        <img src="../uploads/<?php echo $groups[$i]['photo'] ?>" alt="Group Image">
                        <div class="group-details">
                            <h3> <?php echo $groups[$i]['username']; ?> </h3>
                            <p>Votes: <?php echo $groups[$i]['votes']; ?></p>
                        </div>
                    </div>
                    <form action="../actions/voting.php" method="POST">
                        <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes'] ?>">
                        <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id'] ?>">

                        <?php
                        if ($_SESSION['status'] == 1) {
                        ?>
                            <button>Voted</button>
                        <?php
                        } else {
                        ?>
                            <button type="submit">Vote</button>
                        <?php
                        }
                        ?>

                    </form>
                    <hr>
            <?php
                }
            }
            ?>
        </div>
        <div class="user-info">
            <h2>User Information</h2>
            <!-- user information -->
            <div class="user">
                <img src="../uploads/<?php echo $data['photo'] ?>" alt="User Image">
                <div class="user-details">
                    <p>Name : <?php echo $data['username']; ?> </p>
                    <p>Mobile: <?php echo $data['mobile']; ?> </p>
                    <p>Status: <span class="<?php echo $statusClass ?>"><?php echo $status; ?></span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="buttons">
        <button onclick="goBack()">Back</button>
        <button onclick="logout()">Logout</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }

        function logout() {
            window.location.href = "../actions/logout.php";
        }
    </script>
</body>

</html>