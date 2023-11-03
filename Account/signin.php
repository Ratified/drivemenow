<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Sign In</title>
</head>
<body>

    <div class="navigation-bar">
        <div class="img">
            <img src="../assets/images/LOGO.png" alt="drivemenow LOGO" style="width: 120px; height: 20px;">
        </div>
        <div class="navigation-links">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../index.php">About Us</a></li>
                <li><a href="../index.php">Vehicles</a></li>
                <li><a href="../index.php">How To Book</a></li>
                <li><a href="../index.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="account">
            <button class="sign-page"><a href="signup.php">Sign Up</a></button>
        </div>
    </div>

    <div class="form">
        <form action="../includes/login.inc.php" method='POST' id="sign-in-form">
            <h1 class="main">SIGN IN</h1>
            <div class="email">
                <input type="text" name="uid" id="uid" placeholder="username/email">
            </div>


            <div class="password">
                <input type="password" name="pwd" id="pwd" placeholder="Your Password">
            </div>

            <div class="error">
                <p>Please Fill In All Fields</p>
            </div>

            <button type="submit" name="signin" class="btn">Sign In</button>

            <p class="account-description">Don't have an account? <a href="signup.php">Create one here</a></p>

            <p class="copyright-sign">Copyright &copy; 2023 </p>
        </form>
    </div>
</body>
</html>