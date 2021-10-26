<?php
/**
 * @desc main page of the website and handles bookings
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
$scriptList = array('./js/Dogs.js', './js/Booking.js', './js/ShowReviews.js');
include("./htaccess/header.php");
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
?>
<main>
<div id="bookingData">
    <form id="bookingForm" novalidate action="bookDog.php" method="POST">
    <fieldset>
        <legend>Book a Dog</legend>
        <p>
            <label for="bookings">Dogs: </label>
            <?php
            /**
             * Select option for choosing the dog you want to book
             */
            echo "<select id='dog' name='dog'>";
            $json_input = file_get_contents("./json/animals.json");
            $json = json_decode($json_input, true);
            foreach($json["animals"]["dogs"] as $key){
                echo "<option value='" . $key["dogId"] . "'>" . $key["dogName"] . "</option>";
            }
            echo "</select>";
            ?>
        </p><hr>
    <p>Day: <input type="text" name="day" id="day"
            <?php
            /**
             * Sets the value of day
             */
            if(isset($_SESSION['day'])){
                $day = $_SESSION['day'];
                echo "value='$day'";
            }
            ?>> <hr>
        Month: <input type="text" name="month" id="month"
            <?php
            /**
             * Sets the value of month
             */
            if(isset($_SESSION['month'])){
                $month = $_SESSION['month'];
                echo "value='$month'";
            }
            ?>> <hr>
        Year: <input type="text" name="year" id="year"
            <?php
            /**
             * Sets the value of year
             */
            if(isset($_SESSION['year'])){
                $year = $_SESSION['year'];
                echo "value='$year'";
            }
            ?>> <hr>
    Time: <input type="time" name="time" id="time"
        <?php
        /**
         * Sets the value of time you want to pick the dog up at
         */
        if(isset($_SESSION['time'])){
            $time = $_SESSION['time'];
            echo "value='$time'";
        }
        ?>><hr>
    Hours: <input id="hours" name="hours" type="number" max="12"
        <?php
        /**
         * Sets the value for the length of time you want the booking
         */
        if(isset($_SESSION['hours'])){
            $hours = $_SESSION['hours'];
            echo "value='$hours'";
        }
        ?>>
    </p><hr>
        <p>
           <label>Name: <input type="text" id="name" name="name" required
                            <?php
                            /**
                             * Sets the value of name of renter
                             */
                            if(isset($_SESSION['name'])){
                                $name = $_SESSION['name'];
                                echo "value='$name'";
                            }
                            ?>>
           </label>
            </p>
        </fieldset>
        <input type="submit" id="makeBooking" value="Book Selected Dog">
    </form>
</section>

    <ul id="dogs" style="list-style: none">

    </ul>
</div>
<div id="reviews">
    <h2>Reviews</h2>
</div>
</main>


</section>
</body>
</html>