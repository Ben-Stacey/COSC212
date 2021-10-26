<?php
/**
 * @desc admin can cancel bookings
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
include("./htaccess/header.php");
?>
<main>
    <h2>Cancel Booking</h2>
    <?php
    /**
     * when the admin wants to remove a booking this form unsets the value from
     * the json file
     */
    $name = $_POST['bookedDog'];
    $file = "./json/bookings.json";
    $json_input = file_get_contents($file);
    $json = json_decode($json_input, true);

    foreach($json['bookings']['booking'] as $elementKey => $element){
        if($element['name'] == $name){
            unset($json['bookings']['booking'][$elementKey]);
        }
    }

    file_put_contents($file, json_encode($json));

    echo "<p> Booking Deleted </p>";
    echo "<p>Click <a href='admin.php'>here</a> to return to the admin page</p>";
    ?>
</main>
</body>
</html>
