<?php
/**
 * @desc admin can delete dogs
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
include("./htaccess/header.php");
?>
<main>
    <h2>Delete Dog</h2>
    <?php
    /**
     * when the admin wants to remove a dog, this unsets it from the json file
     */
        $name = $_POST['deletedDog'];
        $file = "./json/animals.json";
        $json_input = file_get_contents($file);
        $json = json_decode($json_input, true);
        foreach($json['animals']['dogs'] as $elementKey => $element) {
            if ($element['dogId'] == $name) {
                unset($json['animals']['dogs'][$elementKey]);
                echo "<p>Dog " . $name . " has been deleted</p>";
            }
        }

     file_put_contents($file, json_encode($json));

        echo "<p>Click <a href='admin.php'>here</a> to return to the admin page</p>";


    ?>
</main>
</body>
</html>