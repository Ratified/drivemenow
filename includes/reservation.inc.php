<?php
include_once("db.inc.php");
$selectedVehicle = $_GET['name'];
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

    // Check if the selected dates are valid
    if ($start_date < $end_date) {
        $interval = $start_date->diff($end_date);
        $number_of_days = $interval->format('%a');

        // Get the car price from the database
        $sql = "SELECT id, rate FROM cars WHERE name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            $stmt->bind_param("s", $selectedVehicle);
            $stmt->execute();
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $vehicle_id = $row['id'];
                $car_price = $row['rate'];
                $total_price = $car_price * $number_of_days;

                // Get the user ID from the session
                $usersUid = $_SESSION['usersUid'];
                $user_id = '';
                $sql_user = "SELECT usersID FROM users WHERE usersUid = ?";
                $stmt_user = mysqli_prepare($conn, $sql_user);
                if ($stmt_user) {
                    $stmt_user->bind_param("s", $usersUid);
                    $stmt_user->execute();
                    $result_user = mysqli_stmt_get_result($stmt_user);
                    if (mysqli_num_rows($result_user) > 0) {
                        $row_user = mysqli_fetch_assoc($result_user);
                        $user_id = $row_user['usersID'];

                        // Insert the data into the bookings table
                        $insert_sql = "INSERT INTO bookings (user_id, vehicle_id, pick_up_date, return_date, total_price) VALUES (?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $insert_sql);
                        $stmt->bind_param("iisss", $user_id, $vehicle_id, $pick_up_date, $return_date, $total_price);
                        if ($stmt->execute()) {
                            // If the data is inserted successfully, you can redirect or do other operations here
                            header("Location: ./reserve.php");
                            exit();
                        } else {
                            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
                        }
                    } else {
                        header("Location: ../vehicles.php?error=UserNotFound");
                        exit();
                    }
                } else {
                    echo "Error: " . $stmt_user . "<br>" . mysqli_error($conn);
                }
            } else {
                header("Location: ../vehicles.php?error=NoCars");
                exit();
            }
        } else {
            echo "Error: " . $stmt . "<br>" . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        // Handle the case when the selected dates are not valid
        header("Location: ./reservation.php?name=$selectedVehicle&error=InvalidDates");
        exit();
    }
} else {
    // Handle the case when the form is not submitted
    header("Location: ./reservation.php?name=$selectedVehicle");
    exit();
}
?>
