<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>Registration</h1>
    <div class="container">
        <h2>Create an Account</h2>
        <div>
            <form action="../actions/register.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="name" placeholder="Enter your name" required>
                </div>
                <div>
                    <input type="text" name="phone" placeholder="Enter your phone number" maxlength="10" minlength="10" required>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                <div>
                    <input type="password" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                <label for="image-upload" class="custom-file-upload">Upload Image</label>
                <input id="image-upload" type="file" name="image" accept="image/*" required>
                <div>
                    <select name="type" required>
                        <option value="" disabled selected>Select Option</option>
                        <option value="voter">Voter</option>
                        <option value="group">Group</option>
                    </select>
                </div>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="../index.php">Login here</a></p>
        </div>
    </div>
</body>

</html>
