<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Voting System</h1>
    <div class="container">
        <h2>Login</h2>
        <div>
            <form action="./actions/login.php" method="POST">
                <div>
                    <input type="text" name="username" placeholder="Enter your name" required>
                </div>
                <div>
                    <input type="text" name="mobile" placeholder="Enter your phone number" maxlength="10" minlength="10" required>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <div>
                    <select name="std">
                        <option value="voter">Voter</option>
                        <option value="group">Group</option>
                    </select>
                </div>
                <button type="submit">Login</button>
                <p>Don't have an account?</p>
                <a href="./partials/registeration.php">Register Here</a>
            </form>
        </div>
    </div>
</body>

</html>