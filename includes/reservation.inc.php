<?php
    include_once("db.inc.php");

    session_start();
    $selectedVehicle = $_SESSION['selectedVehicle'];
    // Initialize variables
    $phone_number = '';
    $pick_up_date = '';
    $return_date = '';
    $number_of_days = '';
    $total_price = '';

    // Process form submission
    if (isset($_POST['submit'])) {
        // Get form data
        $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $pick_up_date = mysqli_real_escape_string($conn, $_POST['pick_up_date']);
        $return_date = mysqli_real_escape_string($conn, $_POST['return_date']);

        // Calculate the number of days and total price
        $start_date = new DateTime($pick_up_date);
        $end_date = new DateTime($return_date);

        $interval = $start_date->diff($end_date);
        $number_of_days = $interval->format('%a');

        $sql = "SELECT rate FROM cars WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt){
            $stmt -> bind_param("s", $selectedVehicle);
            $stmt -> execute();
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $car_price = $row['rate'];
                    $total_price = $car_price * $number_of_days;
                    session_start();
                    $_SESSION['total_price'] = $total_price;
                    header("Location: ../reserved.php");
                    exit();
                }
            } else{
                header("Location: ../vehicles.php?error=NoCars");
                exit();
            }
        } else {
            header("Location: ../vehicles.php?error=sqlerror");
            exit();
        }
        mysqli_stmt_close($stmt);
    }