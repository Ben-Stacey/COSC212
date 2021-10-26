<?php
/**
 * @desc admin can edit dogs
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
include("./htaccess/header.php");
include("ValidationFunctions.php");
?>
<main>
    <h2>Edit Booking</h2>
    <?php
    /**
     * edit dog works by getting the dog we want to edit. Unsetting it from the json file
     * and then using the information from the form writes a new dog to the json file
     */
    $_SESSION['newDogId'] = $_POST['newDogId'];
    $_SESSION['newDogName'] = $_POST['newDogName'];
    $_SESSION['newDogType'] = $_POST['newDogType'];
    $_SESSION['newDogSize'] = $_POST['newDogSize'];
    $_SESSION['newDescription'] = $_POST['newDescription'];
    $_SESSION['newPricePerHour'] = $_POST['newPricePerHour'];

    $number = $_POST['removeDog'];
    $remove_animals = "./json/animals.json";
    $json_input = file_get_contents($remove_animals);
    $json_input_animals = json_decode($json_input, true);

    foreach($json_input_animals['animals']['dogs'] as $elementKey => $element) {
        if ($element['dogId'] == $number) {
            unset($json_input_animals['animals']['dogs'][$elementKey]);
        }
    }

    file_put_contents($remove_animals, json_encode($json_input_animals));

    $a = 0;

    $add_animals = "./json/animals.json";
    $json_output = file_get_contents($add_animals);
    $json_output_animals = json_decode($json_output, true);
    foreach($json_output_animals['animals']['dogs'] as $key){
        if($key['dogId'] == $number){
            $a++;
        }
    }

    $messages = array();
    $formOk = true;

    if(isset($_POST['addDog'])) {
        $formOk = true;
        if (isEmpty($_POST['newDogId'])) {
            $formOk = false;
            array_push($messages, "Please enter a dogId");
        }

        if (isEmpty($_POST['newDescription'])) {
            $formOk = false;
            array_push($messages, "Please enter a description");
        }

        if (isEmpty($_POST['newDogName'])) {
            $formOk = false;
            array_push($messages, "Please enter a name");
        }

        if (isEmpty($_POST['newDogType'])) {
            $formOk = false;
            array_push($messages, "Please enter a type");
        }

        if (isEmpty($_POST['newDogSize'])) {
            $formOk = false;
            array_push($messages, "Please enter a size");
        }

        if (isEmpty($_POST['newPricePerHour'])) {
            $formOk = false;
            array_push($messages, "Please enter a price");
        }

        if ($a > 0) {
            $formOk = false;
            array_push($messages, "DogId has been taken");
        }
    }

    if(count($messages) != 0){
        echo "<div><ul id='errors'><b>Errors</b>";
        foreach($messages as $error){
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }else{
        array_push($json_output_animals['animals']['dogs'], array('dogId' => $_SESSION['newDogId'], 'dogName' => $_SESSION['newDogName'], 'dogType' => $_SESSION['newDogType'], 'dogSize' => $_SESSION['newDogSize'], 'description' => $_SESSION['newDescription'],  'pricePerHour' => $_SESSION['newPricePerHour']));
        file_put_contents($add_animals ,json_encode($json_output_animals));

        echo "<p><b>Dog Changed Too</b></p>";
        echo "<p><b>Dog Id: </b>" . $_SESSION['newDogId'] . "</p>";
        echo "<p><b>Dog Name: </b>" . $_SESSION['newDogName'] . "</p>";
        echo "<p><b>Dog Type: </b>" . $_SESSION['newDogType'] . "</p>";
        echo "<p><b>Dog Size: </b>" . $_SESSION['newDogSize'] . "</p>";
        echo "<p><b>Descritpion: </b>" . $_SESSION['newDescription'] . "</p>";
        echo "<p><b>Price per hour: </b>" . $_SESSION['newPricePerHour'] . "</p>";
        echo "<p>CLick <a href='admin.php'>here</a> to return to the admin page</p>";
    }
    session_destroy();
    ?>
</main>
</body>
</html>

