<?php
/**
 * @desc admin can add dogs
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
include("./htaccess/header.php");
include("ValidationFunctions.php");
?>

<main>
    <h2>Add a Dog</h2>
    <?php
    $_SESSION['dogId'] = $_POST['dogId'];
    $_SESSION['dogName'] = $_POST['dogName'];
    $_SESSION['dogType'] = $_POST['dogType'];
    $_SESSION['dogSize'] = $_POST['dogSize'];
    $_SESSION['description'] = $_POST['description'];
    $_SESSION['pricePerHour'] = $_POST['pricePerHour'];

    $a = 0;
    $file = "./json/animals.json";
    $json_input = file_get_contents($file);
    $json = json_decode($json_input, true);
    foreach($json['animals']['dogs'] as $key){
        if($key['dogId'] == $_SESSION['dogId']){
            $a++;
        }
    }

    $messages = array();
    $formOk = true;
    if(isset($_POST['addDog'])) {
        $formOk = true;
        if (isEmpty($_POST['dogId'])) {
            $formOk = false;
            array_push($messages, "Please enter a dogId");
        }

        if (isEmpty($_POST['description'])) {
            $formOk = false;
            array_push($messages, "Please enter a description");
        }

        if (isEmpty($_POST['dogName'])) {
            $formOk = false;
            array_push($messages, "Please enter a name");
        }

        if (isEmpty($_POST['dogType'])) {
            $formOk = false;
            array_push($messages, "Please enter a type");
        }

        if (isEmpty($_POST['dogSize'])) {
            $formOk = false;
            array_push($messages, "Please enter a size");
        }

        if (isEmpty($_POST['pricePerHour'])) {
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
        array_push($json['animals']['dogs'], array('dogId' => $_SESSION['dogId'], 'dogName' => $_SESSION['dogName'], 'dogType' => $_SESSION['dogType'], 'dogSize' => $_SESSION['dogSize'], 'description' => $_SESSION['description'],  'pricePerHour' => $_SESSION['pricePerHour']));
            file_put_contents($file,json_encode($json));

            echo "<p><b>New Dog</b></p>";
            echo "<p><b>Dog Id: </b>" . $_SESSION['dogId'] . "</p>";
            echo "<p><b>Dog Name: </b>" . $_SESSION['dogName'] . "</p>";
            echo "<p><b>Dog Type: </b>" . $_SESSION['dogType'] . "</p>";
            echo "<p><b>Dog Size: </b>" . $_SESSION['dogSize'] . "</p>";
            echo "<p><b>Descritpion: </b>" . $_SESSION['description'] . "</p>";
            echo "<p><b>Price per hour: </b>" . $_SESSION['pricePerHour'] . "</p>";
            echo "<p>CLick <a href='admin.php'>here</a> to return to the admin page</p>";
    }
    session_destroy();
    ?>
</main>
</body>
</html>
