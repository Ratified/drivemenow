<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>drivemenow</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://kit.fontawesome.com/ce2d94b0f6.js" crossorigin="anonymous"></script>
</head>
<body>
            
        <div class="bounce">
            <div class="phone">
                +254716980741
            </div>    

            <div class="mon-friday"> </div>

            <div class="website">
                www.drivemenow.com
            </div>
        </div>

        <div class="navigation-bar">
            <div class="img">
                <a href="index.php"><img src="assets/images/LOGO.png" alt="drivemenow LOGO" style="width: 120px; height: 20px;"></a>
            </div>
            <div class="navigation-links">
                <ul>
                <li><a href="index.php#home">Home</a></li>
                    <li><a href="index.php#about-us">About Us</a></li>
                    <li><a href="index.php#vehicles">Vehicles</a></li>
                    <li><a href="index.php#howtobook">How To Book</a></li>
                </ul>
            </div>

            <?php
                // start session (if not started already)
                session_start();

                if (isset($_SESSION["useruid"])) {
                    // if user is logged in, display welcome message and logout button
                    echo '<div class="account" style="display:flex; gap: 20px;">';
                    echo '<p>Welcome ' . $_SESSION["useruid"] . '!</p>';
                    echo '<a href="includes/logout.inc.php"><button class="sign">Log out</button></a>';
                    echo '</div>';
                } else {
                    // if user is not logged in, display sign in button
                    echo '<div class="account">';
                    echo '<a href="Account/signin.php"><button class="sign">Sign In</button></a>';
                    echo '</div>';
                }
?>



               
        </div>