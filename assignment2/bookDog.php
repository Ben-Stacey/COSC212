<?php
/**
 * @desc user can book dogs
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
session_start();
include("./htaccess/header.php");
include("ValidationFunctions.php");
?>
<main>
    <h2>Book Dogs</h2>
    <?php
    /**
     * Book dog takes the information entered into the form on the index page.
     * Once the form is submitted the action on the form calls this page. the information
     * is checked to see that it is not emppty and then it writes the booking to the json file
     */
    $_SESSION['dog'] = $_POST['dog'];
    $_SESSION['day'] = $_POST['day'];
    $_SESSION['month'] = $_POST['month'];
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['time'] = $_POST['time'];
    $_SESSION['hours'] = $_POST['hours'];
    $_SESSION['name'] = $_POST['name'];

    $file = './json/bookings.json';
    $json_input = file_get_contents(($file));
    $json = json_decode($json_input, true);

    $messages = array();
    $formOk = true;
    if(isset($_POST['bookingForm'])) {
        $formOk = true;
        if (isEmpty($_POST['dog'])) {
            $formOk = false;
            array_push($messages, "Please choose a dog");
        }
        if (isEmpty($_POST['day'])) {
            $formOk = false;
            array_push($messages, "Please enter the day");
        }
        if (isEmpty($_POST['month'])) {
            $formOk = false;
            array_push($messages, "Please enter the month");
        }
        if (isEmpty($_POST['year'])) {
            $formOk = false;
            array_push($messages, "Please enter the year");
        }
        if (isEmpty($_POST['time'])) {
            $formOk = false;
            array_push($messages, "Please enter a pickup time");
        }
        if (isEmpty($_POST['hours'])) {
            $formOk = false;
            array_push($messages, "Please enter a the amount of hours");
        }
        if (isEmpty($_POST['name'])) {
            $formOk = false;
            array_push($messages, "Please enter a name");
        }
    }

    if(count($messages) != 0){
        echo "<div><ul id='errors'><b>Errors</b>";
        foreach($messages as $error){
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }else{
        array_push($json['bookings']['booking'], array('dogId' => [$_SESSION['dog']], 'name' => $_SESSION['name'], "pickup" => array("day" => $_SESSION['day'], "month" => $_SESSION['month'], "year" => $_SESSION['year'], "time" => $_SESSION['time']), 'numHours' => $_SESSION['hours']));
        file_put_contents($file,json_encode($json));

        echo "<p><b>Booking Successful</b></p>";
        echo "<p><b>Name: </b>" . $_SESSION['name'] . "</p>";
        echo "<p><b>Dog: </b>" . $_SESSION['dog'] . "</p>";
        echo "<p>Click <a href='index.php'>here</a> to return to the admin page</p>";
    }
    session_destroy();
    ?>
</main>
</body>
</html>

