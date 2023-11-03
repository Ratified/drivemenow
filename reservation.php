<?php

include_once 'header.php';
include_once './includes/db.inc.php';

//Get the car name from the url
if(isset($_GET['name'])){
    $selectedVehicle = $_GET['name']; 
    session_start();
    $_SESSION['selectedVehicle'] = $selectedVehicle;
} else{
    header("Location: ./vehicles.php");
    exit();
}
?>


<style>
    .makeReservation{
        text-align: center;
        font-size: 3rem;
    }

    .selectedCarName{
        text-align: center;
        margin-top: 1rem;
        font-size: 2 rem;
    }

    .selectedPrice{
        color: #0056b3;
    }

    #reservation {
        margin: 50px auto;
        max-width: 800px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 20px rgba(0,0,0,0.3);
        text-align: center;
    }

    #reservation h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    #reservation label {
        font-size: 18px;
    }

    #reservation input[type="text"],
    #reservation input[type="email"],
    #reservation input[type="tel"],
    #reservation input[type="date"],
    #reservation input[type="number"],
    #reservation input[type="month"] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid #007bff;
        font-size: 16px;
    }

    #reservation .names {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    #reservation .first-name {
        width: 48%;
    }

    #reservation .last-name {
        width: 48%;
    }

    #reservation .instruction-image {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    #reservation .instructions {
        width: 100%;
    }

    #reservation .image {
        width: 100%;
    }

    #reservation img {
        max-width: 100%;
        height: auto;
    }

    #reservation .mobile {
        display: none;
    }

    @media only screen and (max-width: 768px) {

        #reservation .names {
            display: block;
        }

        #reservation .first-name {
            width: 100%;
        }

        #reservation .last-name {
            width: 100%;
        }

        #reservation .instruction-image {
            display: block;
        }

        #reservation .instructions {
            width: 100%;
            margin-bottom: 20px;
        }


        #reservation .image {
            width: 100%;
        }

        #reservation .mobile {
            display: block;
        }

        #reservation .number-of-days,
        #reservation .total-price {
            margin-top: 20px;
        }

    }

    #reservation .reserve {
        display: inline-block;
        padding: 10px 20px;
        font-size: 18px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        margin-top: 20px;
        text-decoration: none;
        transition: background-color 0.2s ease-in-out;
    }

    #reservation .reserve:hover {
        background-color: #0056b3;
    }

</style> 

<?php 
    echo "<h1 class='makeReservation'> Reserve " . $selectedVehicle . '</h1>';
    $sql = "SELECT rate FROM cars WHERE name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt){
        $stmt -> bind_param("s", $selectedVehicle);
        $stmt -> execute();
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $car_price = $row['rate'];
            }
        } else{
            header("Location: ./vehicles.php?error=NoCars");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
?>

<section id="reservation">
    <?php 
        echo "<h1 class='selectedCarName'>" . $selectedVehicle . "'s rate per day: <span class='selectedPrice'>" . $car_price . " /=</span> ";
    ?>
    <form action="./includes/reservation.inc.php" method="POST">
        <div class="phone-number">
            <label for="phone_number">Phone Number:</label><br>
            <input type="tel" id="phone_number" name="phone_number" required>
        </div>

        <div class="instruction-image">
            <div class="instructions">
                <label for="pick_up_date">Pick Up Date:</label><br>
                <input type="date" id="pick_up_date" name="pick_up_date" required><br><br>

                <label for="return_date">Return Date:</label><br>
                <input type="date" id="return_date" name="return_date" required>
            </div>
           
        </div>

        <div class="mobile">
            <div class="number-of-days">
                <label for="number_of_days">Number of Days:</label><br>
                <input type="number" id="number_of_days" name="number_of_days">
            </div>

            <div class="total-price">
                <label for="total_price">Total Price:</label><br>
                <input type="number" id="total_price" name="total_price">
            </div>
        </div>

   <button type="submit" name="submit" class="reserve">Reserve Now</button>

    </form>
</section>

<?php
include_once 'footer.php';
?>


