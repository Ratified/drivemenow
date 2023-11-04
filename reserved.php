<?php 
    include_once("header.php");
?>

<style>
   .reservedCar {

            width: 100%;
            max-width: 700px;
            margin: 100px auto;
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
    }

        .reservedCar h1 {
            font-size: 24px;
            color: #333;
        }

        .priceText {
            font-size: 18px;
            color: #555;
        }

        .sessionPrice {
            font-weight: bold;
            color: #0F0444;
        }

        p {
            font-size: 16px;
            color: #666;
            margin: 10px 0;
        }

</style>

<div class="reservedCar">
    <h1>Thank you for reserving with us!</h1>
    <?php 
        echo "<p class='priceText'>Your total price is: <span class='sessionPrice'>" . $_SESSION['total_price'] . "</span> /=</p>";
    ?>
    <p>We will contact you shortly, with your registered mobile number for payment details.</p>
    <p>Thank you!</p>
</div>

<?php
    include_once("footer.php")
?>