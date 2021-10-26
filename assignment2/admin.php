<?php
/**
 * @desc admin form for dealing with dogs and bookings
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
    $scriptList = array('./js/Admin.js');
    include("./htaccess/header.php");
    $_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
?>
<main>
    <h2>Administration Page</h2>
    <div id="bookings"></div>
    <div class="CancelBooking">
        <form id="cancelBooking" action="cancelBooking.php" method="POST" novalidate>
            <fieldset>
                <legend>Cancel Booking</legend>
                <p>
                    <label for="bookings">Bookings: </label>
                    <?php
                    /**
                     * displays the bookings that can be deleted
                     */
                    echo "<select id='bookedDog' name='bookedDog'>";
                    $json_input = file_get_contents("./json/bookings.json");
                    $json = json_decode($json_input, true);
                    foreach($json["bookings"]["booking"] as $key){
                        echo "<option value='" . $key["name"] . "'>" . $key["name"] . "</option>";
                    }
                    echo "</select>";
                    ?>
                </p>
                <p>
                    <input type="submit" class="adminButtons" name="cancelBooking" value="Cancel Booking">
                </p>
            </fieldset>
        </form>
    </div>

    <div class="DeleteDog">
        <form id="deleteDog" action="deleteDog.php" method="POST" novalidate>
            <fieldset>
                <legend>Delete Dogs</legend>
                <p>
                    <label for="Dogs">Dogs</label>
                    <?php
                    /**
                     * displays the dogs that can be deleted
                     */
                    echo "<select id='deletedDog' name='deletedDog'>";
                    $json_input = file_get_contents("./json/animals.json");
                    $json = json_decode($json_input, true);
                    foreach($json["animals"]["dogs"] as $key){
                        echo "<option value='" . $key["dogId"] . "'> Dog Id: " . $key["dogId"] . "</option>";
                    }
                    echo "</select>";
                    ?>
                </p>
                <p>
                    <input type="submit" class="adminButtons" name="deleteDog" value="Delete Dog">
                </p>
            </fieldset>
        </form>
    </div>

    <div class="AddDog">
        <form id="addDog" action="addDog.php" method="POST" novalidate>
            <fieldset>
                <legend>Add Dog</legend>
                <p>
                    <label for="dogId">DogId: </label>
                    <input type="text" name="dogId" placeholder="DogId"
                        <?php
                        /**
                         * input field for the dog id
                         */
                        if(isset($_SESSION['dogId'])){
                            $dogId = $_SESSION['dogId'];
                            echo "value='$dogId'";
                        }
                        ?>>
                </p>
                <p>
                    <label for="dogName">DogName: </label>
                    <input type="text" name="dogName" placeholder="dogName"
                        <?php
                        /**
                         * input field for the dog name
                         */
                        if(isset($_SESSION['dogName'])){
                            $dogName = $_SESSION['dogName'];
                            echo "value='$dogName'";
                        }
                        ?>>
                </p>
                <p>
                    <label for="dogType">dogType: </label>
                    <input type="text" name="dogType" placeholder="dogType"
                        <?php
                        /**
                         * input field for the dog type
                         */
                        if(isset($_SESSION['dogType'])){
                            $dogType = $_SESSION['dogType'];
                            echo "value='$dogType'";
                        }
                        ?>>
                </p>
                <p>
                    <label for="dogSize">DogSize: </label>
                    <select id="dogSize" name="dogSize"
                        <?php
                        /**
                         * input field for the dog size
                         */
                        if(isset($_SESSION['dogSize'])){
                            $dogSize = $_SESSION['dogSize'];
                            echo "value='$dogSize'";
                        }
                        ?>>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                        <option value="huge">Huge</option>
                    </select>
                </p>
                <p>
                    <label for="description">Description: </label>
                    <textarea rows="4" cols="50" type="text" name="description" placeholder="description"
                        <?php
                        /**
                         * input field for the dog description
                         */
                        if(isset($_SESSION['description'])){
                            $description = $_SESSION['description'];
                            echo "value='$description'";
                        }
                        ?>>
                    </textarea>
                </p>
                <p>
                    <label for="pricePerHour">pricePerHour: </label>
                    <input type="text" name="pricePerHour" placeholder="pricePerHour"
                        <?php
                        /**
                         * input field for the dog price per hour
                         */
                        if(isset($_SESSION['pricePerHour'])){
                            $pricePerHour = $_SESSION['pricePerHour'];
                            echo "value='$pricePerHour'";
                        }
                        ?>>
                </p>
                <p>
                    <input type="submit" class="adminButtons" name="addDog" value="Add Dog">
                </p>
            </fieldset>
        </form>
    </div>

    <div class="EditDog">
        <form id="editDog" action="editDog.php" method="POST" novalidate>
            <fieldset>
                <legend>Edit Dog</legend>
                <p>
                    <label for="bookings">Dogs</label>
                    <?php
                    /**
                     * to select the dog you want to edit
                     */
                    echo "<select id='removeDog' name='removeDog'>";
                    $json_input = file_get_contents("./json/animals.json");
                    $json = json_decode($json_input, true);
                    foreach($json["animals"]["dogs"] as $key){
                        echo "<option value='" . $key["dogId"]."'> Dog Number: " .$key["dogId"] . "</option>";
                    }
                    echo "</select>";
                    ?>
                </p>
                <p>
                    <label for="newDogId">New DogId: </label>
                    <input type="text" name="newDogId" placeholder="newDogId"
                        <?php
                        /**
                         * input field for the new dog id
                         */
                        if(isset($_SESSION['newDogId'])){
                            $newDogId = $_SESSION['newDogId'];
                            echo "value='$newDogId'";
                        }
                        ?>>
                </p>
                <p>
                    <label for="newDogName">newDogName: </label>
                    <input type="text" name="newDogName" placeholder="newDogName"
                        <?php
                        /**
                         * input field for the new dog name
                         */
                        if(isset($_SESSION['newDogName'])){
                            $newDogName = $_SESSION['newDogName'];
                            echo "value='$newDogName'";
                        }
                        ?>>
                </p>
                <p>
                    <label for="newDogType">newDogType: </label>
                    <input type="text" name="newDogType" placeholder="newDogType"
                        <?php
                        /**
                         * input field for the new dog type
                         */
                        if(isset($_SESSION['newDogType'])){
                            $newDogType = $_SESSION['newDogType'];
                            echo "value='$newDogType'";
                        }
                        ?>>
                </p>
                <p>
                    <label for="newDogSize">newDogSize: </label>
                    <select id="newDogSize" name="newDogSize"
                        <?php
                        /**
                         * input field for the new dog size
                         */
                        if(isset($_SESSION['newDogSize'])){
                            $newDogSize = $_SESSION['newDogSize'];
                            echo "value='$newDogSize'";
                        }
                        ?>>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                        <option value="huge">Huge</option>
                    </select>
                </p>
                <p>
                    <label for="newDescription">newDescription: </label>
                    <textarea rows="4" cols="50" type="text" name="newDescription" placeholder="newDescription"
                        <?php
                        /**
                         * input field for the new dog description
                         */
                        if(isset($_SESSION['newDescription'])){
                            $newDescription = $_SESSION['newDescription'];
                            echo "value='$newDescription'";
                        }
                        ?>>
                    </textarea>
                </p>
                <p>
                    <label for="newPricePerHour">newPricePerHour: </label>
                    <input type="text" name="newPricePerHour" placeholder="newPricePerHour"
                        <?php
                        /**
                         * input field for the new dog price per hour
                         */
                        if(isset($_SESSION['newPricePerHour'])){
                            $newPricePerHour = $_SESSION['newPricePerHour'];
                            echo "value='$newPricePerHour'";
                        }
                        ?>>
                </p>
                <p>
                    <input type="submit" class="adminButtons" name="editDog" value="Edit Dog">
                </p>
            </fieldset>
        </form>
    </div>
</main>
</body>

