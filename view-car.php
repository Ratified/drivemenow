<?php

include_once 'header.php';
include_once 'includes/db.inc.php';

?>

<style>

    .car-details {
        margin: 50px auto;
        max-width: 800px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 20px rgba(0,0,0,0.3);
        text-align: center;
    }

    .car-details h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .car-details img {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
    }

    .car-details p {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .reserve {
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

    .reserve:hover {
        background-color: #0056b3;
    }

</style>


<?php
// Get the car name from the URL
if (isset($_GET['name'])) {
    $name = $_GET['name'];
} else {
    // If no car name is provided, redirect to the homepage
    header('Location: vehicles.php');
    exit();
}

// Fetch car details from the database
$sql = "SELECT * FROM cars WHERE name='$name'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Display car details
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="car-details">';
        echo '<h1>' . $row['name'] . '</h1>';
        echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '" style="width: 500px; height: auto;">';
        echo '<p><strong>Category:</strong> ' . $row['category'] . '</p>';
        echo '<p><strong>Description:</strong> ' . $row['description'] . '</p>';
        echo '<p><strong>Capacity:</strong> ' . $row['capacity'] . '</p>';
        echo '<p><strong>Rate:</strong> ' . $row['rate'] . '/= per day</p>';
        echo '<button type="submit" class="reserve"><a href="reservation.php?name=' . $row['name'] . '">Reserve Now</a></button>';
        echo '</div>';
    }
} else {
    // If no car is found with the given name, display an error message
    echo '<p>No car found with the name ' . $name . '.</p>';
}

mysqli_close($conn);
include_once 'footer.php';

?>
