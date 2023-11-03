<?php

    include_once 'header.php';
    include './includes/db.inc.php';

?>

<style>
.vehicle-containers{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
}

</style>

<section id="vehicles">

        <div class="wrapper vehiclewrap">
            <div class="vehicle-description">
                <h1 class="h1">OUR VEHICLES</h1>
                <p class="description">Take a quick look at our fleet.</p>
            </div>

            <div>
                <form>
                    <input type="text" placeholder="Search Vehicle" class="searchInput" id="searchInput">
                </form>
            </div>

        <?php
        
        $sql = "SELECT image_path, category, name, capacity, rate FROM cars ORDER BY RAND()";
        $result = mysqli_query($conn, $sql);

        // Display data in HTML
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="vehicle-containers">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="vehicle">';
                echo '<img class="image" src="' . $row['image_path'] . '" alt="' . $row['name'] . '" width="250" height="240">';
                echo '<div class="category">' . $row["category"] . '</div>';
                echo '<div class="name">' . $row['name'] . '</div>';
                echo '<div class="capacity"> <i class="fa-solid fa-car"></i> ' . $row['capacity'] . '</div>';
                echo '<div class="rate">' . $row['rate'] . '/= per day</div>';
                echo '<div class="vehicle-buttons">';
                echo '<button type="submit" class="view-car"><a href="view-car.php?name=' . $row['name'] . '">View Car</a></button>';
                echo '<button type="submit" class="reserve"><a href="reservation.php">Reserve Now</a></button>';
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

        </div>
        
   
    </section>




<?php

    include_once 'footer.php'

?>