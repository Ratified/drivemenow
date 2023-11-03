<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Document</title>
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
            <button class="sign-page"><a href="signin.php">Sign In</a></button>
        </div>
    </div>

    <div class="form signup">
        <form action="../includes/signup.inc.php" method="post" id="sign-up-form">
            <h1 class="main signUP">SIGN UP</h1>
            <div class="name">
                    <input type="name" name="uid" id="uid" placeholder="Name">
            </div>

            <div class="email">
                <input type="email" name="email" id="email" placeholder="Email">
            </div>

            <div class="password">
                <input type="password" name="pwd" id="pwd" placeholder="Your Password">
            </div>

            <div class="confirm">
                <input type="password" name="pwdrepeat" id="pwdrepeat" placeholder="Confirm Password">
            </div>

            <div class="error">
                <p>Please Fill In All Fields</p>
            </div>

            <button type="submit" class="btn" name="submit">Sign Up</button>

            <p class="account-description">Already have an account? <a href="signin.php">Log In Here</a></p>

            <p class="copyright-sign">Copyright &copy; 2023 - All Rights Reserved</p>
        </form>
    </div>
</body>
</html>