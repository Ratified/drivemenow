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

<!-- Header -->
    <header id="home">
            
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
                <img src="assets/images/LOGO.png" alt="drivemenow LOGO" style="width: 120px; height: 20px;">
            </div>
            <div class="navigation-links">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about-us">About Us</a></li>
                    <li><a href="#vehicles">Vehicles</a></li>
                    <li><a href="#howtobook">How To Book</a></li>
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
        <div class="hero-section">
            <div class="heroText">
                HIRE YOUR PREFERRED CAR WITH US TODAY.
            </div>
            <p class="hero__description_text">
                Search, Book and Rent Your Cars from the comfort of your house. 
            </p>
            <a href="vehicles.php" class="bookBtn">Book Now</a>

        </div>
    </header>

    <!--ABOUT US-->
    <section id="about-us">
        <div class="wrapper about">
            <div class="box">
               <img src="assets/images/about.png" alt="ABOUT">
            </div>

            <div class="about-text">
                <h1 class="h1 abouth1">ABOUT US</h1>
                <p class="description">Find out briefly about us.</p>
                <p>Welcome to our online car hire system! We are a team of dedicated professionals who have come together to provide you with the best car rental experience possible. Our goal is to make car rental as easy and convenient as possible, so you can focus on enjoying your trip without any worries.
                   We understand that planning a trip can be stressful, which is why we offer a range of vehicles to suit your needs and budget. Whether you need a compact car for a weekend getaway, a luxury sedan for a business trip, or a spacious SUV for a family vacation, we have got you covered.
                   At our company, we pride ourselves on providing exceptional customer service. Our team of friendly and knowledgeable staff is available 24/7 to answer any questions you may have and to help you choose the perfect car for your needs.
                </p>
            </div>
        </div>
    </section>

    <!--VEHICLES-->
    <section id="vehicles">

        <div class="wrapper vehiclewrap">
            <div class="vehicle-description">
                <h1 class="h1">OUR VEHICLES</h1>
                <p class="description">Take a quick look at our fleet.</p>
            </div>

        <?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "drivemenow");

        // Check if connection is successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        
        // Fetch data from the car table
        $sql = "SELECT image_path, category, name, capacity, rate FROM cars ORDER BY RAND() LIMIT 4";
        $result = mysqli_query($conn, $sql);

        // Display data in HTML
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="vehicle-container">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="vehicle">';
                echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '" width="250" height="240">';
                echo '<div class="category">' . $row["category"] . '</div>';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<div class="capacity"> <i class="fa-solid fa-car"></i> ' . $row['capacity'] . '</div>';
                echo '<div class="rate">' . $row['rate'] . '/= per day</div>';
                echo '<div class="vehicle-buttons">';
                echo '<button type="submit" class="view-car"><a href="view-car.php?name=' . $row['name'] . '">View Car</a></button>';
                echo '<button type="submit" class="reserve"><a href="reservation.php?name='. $row['name'] .'">Reserve Now</a></button>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div>';
        } else {
            echo "No results found.";
        }
       

        // Close database connection
        mysqli_close($conn);
        ?>
        


        <button class="button btnSeeMore"><a href="vehicles.php">See More</a></button>

        </div>
   
    </section>


    <!--Browse By Categories-->

    <section id="categories">
        <div class="wrapper">

        </div>
    </section>

    <!--How To Book-->
    <section id="howtobook">

        <div class="wrapper">
            <h1 class="h1 book">How To Book</h1>
        <hr>
        <p class="booktext">
            Booking a car with us is quick, easy, and hassle-free. Follow these simple steps to reserve your vehicle today:
            <ol type="1" class="how">
                <li> Visit our website and select the location where you would like to rent a car.</li>
                <li> Choose the dates and times you need the vehicle for, and select the type of car you would like to rent.</li>
                <li> Enter your personal details and any additional information required, such as your driver's license number and payment details.</li>
                <li> Review your booking details and confirm your reservation.</li>
            </ol>
              
            That's it! Once you have completed your booking, you will receive a confirmation email with all the details you need for your rental. Our team is always available to answer any questions you may have, so feel free to contact us at any time.
            We also offer flexible payment options, so you can choose the payment method that works best for you. We accept all major credit cards and debit cards, and we also offer the option to pay in cash or via bank transfer.
            
            At our company, we are committed to providing you with the best possible car rental experience. From start to finish, we are here to make your journey as smooth and stress-free as possible. Thank you for choosing us for your car rental needs.</p>
        </div>
        
    </section>


    <!--Frequently Asked Questions-->

    <div class="accordion">
        <h2 class="accordion-title">
            Frequently Asked Questions
        </h2>

        <div class="content-container">
            <div class="question">If I get into an accident while I have hired a vehicle what do I do?</div>
            <div class="answer">
            Get immediate medical assistance if you have been injured. Call the office when you are in a position to and report the accident. Record an accident report at the nearest police station who will organize for the car to be towed and obtain a police abstract.
            </div>
        </div>

        <div class="content-container">
            <div class="question">Where can I get the car details for the car I have reserved?</div>
            <div class="answer">
            Once you complete the reservation and payment process, an email will be sent with pictures of the vehicle and the registration number.
            </div>
        </div>

        <div class="content-container">
            <div class="question">What's the age limit to hire a car?</div>
            <div class="answer">We offer self-drive car hire services to customers above 25 years.</div>
        </div>

        <div class="content-container">
            <div class="question">Can the vehicle be dropped at my place of residence or my place of convenience?</div>
            <div class="answer">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga illo officiis adipisci tempore nesciunt atque exercitationem amet nobis enim, itaque, facere nemo architecto voluptatem debitis reprehenderit soluta inventore animi ipsum.</div>
        </div>


    </div>


    <!--Footer-->
    <footer>
        <div class="wrapper-footer">

            <div class="drivemenow-desc">
                <p>drivemenow</p>
                <hr>
                <p class="drivep"> Drivemenow is an online car hire system that allows users to rent vehicles on-demand for various purposes such as transportation, personal use, travel, and more. The platform offers a wide range of cars, including sedans, SUVs, and pickups, and provides users with an easy and convenient way to search, book, and rent a car from anywhere and at any time. </p>
            </div>
            
            <div class="explore">
                <p>Explore</p>
                <hr>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">About Us</a></li>
                    <li><a href="index.php">Vehicles</a></li>
                    <li><a href="index.php">How To Book</a></li>
                </ul>
            </div>

            <div class="account">
                <p>Account</p>
                <hr>
                <ul>
                    <li><a href="Account/signin.php">Sign In</a></li>
                    <li><a href="Account/signup.php">Sign Up</a></li>
                </ul>
            </div>

            <div class="fleet">
                <p>Fleet</p>
                <hr>
                <ul>
                    <li><a href="#howtobook">How To Book</a></li>
                    <li><a href="#vehicles">Vehicles</a></li>
                </ul>
            </div>

            <div class="socials">
                <p>Socials</p>
                <hr>
                <div class="social-media">
                    <div class="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
    
                    <div class="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    
                    <div class="facebook">
                        <i class="fa-brands fa-square-facebook"></i>                    
                    </div>
    
                    <div class="pinterest">
                        <i class="fa-brands fa-pinterest"></i>
                    </div>
                </div>
            </div>

            <div class="License">
                <p>License and Terms</p>
                <hr>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms Of Service</a></li>
                </ul>
            </div>

        </div>

        <div class="telaccept">            
            <p> <img src="assets/images/mpesa.png" style="width: 50px; height: 50px;" alt="Mpesa Logo"></p>
        </div>
        
        <div class="copyright">
            <p>Copyright &copy; 2023 - All Rights Reserved</p>
            <p>Designed and developed by <a href="https://github.com/Ratified" target="_blank" >RatifiedGeorge</a></p>
        </div>
    </footer>


    <!--Javascript For Text Animation -->
    <script src="https://unpkg.com/typed.js@2.0.15/dist/typed.umd.js"></script>
    <script>
        var typed = new Typed(".mon-friday", {
            strings: [" Monday To Friday (8:00a.m to 6:00p.m)"],
            typeSpeed : 70,
            backSpeed : 20,
            loop : true,
            cursor : false,
            contentType: 'null'
        })
    </script>
    <script src="index.js"></script>
</body>
</html>