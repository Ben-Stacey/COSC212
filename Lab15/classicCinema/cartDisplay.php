<?php
session_start();
$scriptList = array('./js/jquery-3.6.0.min.js', './js/cart.js', './js/cartDisplayJS.js');
include("./htaccess/header.php");
if(!isset($_SESSION['authenticatedUser'])){
    if(strlen($_SESSION['lastPage']) > 0){
        header($_SESSION['lastPage']);
        exit;
    }else{
        header('index.php');
        exit;
    }
}
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
?>

<main>
    <?php
    ?>
    <ul id="item" style="list-style-type: none"></ul>
    <p id="total"></p>

    <form id="checkoutForm" novalidate action="validateCheckout.php" method="POST">
        <fieldset>
            <!-- First section of form is delivery address etc. -->
            <legend>Delivery Details:</legend>
            <p>
                <label for="deliveryName">Deliver to:</label>
                <input type="text" name="deliveryName" id="deliveryName" required
                    <?php if (isset($_SESSION['deliveryName'])) {
                        $deliveryName = $_SESSION['deliveryName'];
                        echo "value='$deliveryName'"; }
                    ?>>
            </p>
            <p>
                <label for="deliveryEmail">Email:</label>
                <input type="email" name="deliveryEmail" id="deliveryEmail"
                    <?php if (isset($_SESSION['deliveryEmail'])) {
                        $deliveryEmail = $_SESSION['deliveryEmail'];
                        echo "value='$deliveryEmail'"; }
                    ?>>
            </p>
            <p>
                <label for="deliveryAddress1">Address:</label>
                <input type="text" name="deliveryAddress1" id="deliveryAddress1" required
                    <?php if (isset($_SESSION['deliveryAddress1'])) {
                        $deliveryAddress1 = $_SESSION['deliveryAddress1'];
                        echo "value='$deliveryAddress1'"; }
                    ?>>
            </p>
            <p>
                <label for="deliveryAddress2"></label>
                <input type="text" name="deliveryAddress2" id="deliveryAddress2"
                    <?php if (isset($_SESSION['deliveryAddress2'])) {
                        $deliveryAddress2 = $_SESSION['deliveryAddress2'];
                        echo "value='$deliveryAddress2'"; }
                    ?>>
            </p>
            <p>
                <label for="deliveryCity">City:</label>
                <input type="text" name="deliveryCity" id="deliveryCity" required
                    <?php if (isset($_SESSION['deliveryCity'])) {
                        $deliveryCity = $_SESSION['deliveryCity'];
                        echo "value='$deliveryCity'"; }
                    ?>>
            </p>
            <p>
                <label for="deliveryPostcode">Postcode:</label>
                <input type="text" name="deliveryPostcode" id="deliveryPostcode" maxlength="4" required
                    <?php if (isset($_SESSION['deliveryPostcode'])) {
                        $deliveryPostcode = $_SESSION['deliveryPostcode'];
                        echo "value='$deliveryPostcode'"; }
                    ?>>
            </p>
        </fieldset>
        <!-- Next section has credit card details -->
        <fieldset>
            <legend>Payment Details:</legend>
            <p>
                <label for="cardType">Card type:</label>
                <select name="cardType" id="cardType">
                    <option value="amex">American Express</option>
                    <option value="mcard">Master Card</option>
                    <option value="visa">Visa</option>
                </select>
            </p>
            <p>
                <label for="cardNumber">Card number:</label>
                <input type="text" name="cardNumber" id="cardNumber" maxlength="16" required=""
                <?php
                    if (isset($_SESSION['cardNumber'])) {
                        $cardNumber = $_SESSION['cardNumber'];
                        echo "value='$cardNumber'";
                    }
                ?> >

            </p>
            <p>
                <label for="cardMonth">Expiry date:</label>
                <select name="cardMonth" id="cardMonth">
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select> / <select name="cardYear" id="cardYear">
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>
            </p>
            <p>
                <label for="cardValidation">CVC:</label>
                <input type="text" class="short" maxlength="4" name="cardValidation" id="cardValidation" required=""
                <?php
                    if (isset($_SESSION['cardValidation'])) {
                        $cardValidation = $_SESSION['cardValidation'];
                        echo "value='$cardValidation'";
                    }
                ?> >
            </p>


        </fieldset>
        <input type="submit">
    </form>
</main>
<?php include("./htaccess/footer.php"); ?>

</body>
</html>