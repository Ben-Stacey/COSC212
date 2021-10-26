<?php
session_start();
$scriptList = array('./js/jquery-3.6.0.js');
include("./htaccess/header.php");
include("validationFunctions.php");
if(!isset($_SESSION['authenticatedUser'])){
    if(strlen($_SESSION['lastPage']) > 0){
        header($_SESSION['lastPage']);
        exit;
    }else{
        header('index.php');
        exit;
    }
}

$_SESSION['deliveryName'] = $_POST['deliveryName'];
$_SESSION['deliveryEmail'] = $_POST['deliveryEmail'];
$_SESSION['deliveryAddress1'] = $_POST['deliveryAddress1'];
$_SESSION['deliveryCity'] = $_POST['deliveryCity'];
$_SESSION['deliveryPostcode'] = $_POST['deliveryPostcode'];
$_SESSION['cardType'] = $_POST['cardType'];
$_SESSION['cardNumber'] = $_POST['cardNumber'];
$_SESSION['cardMonth'] = $_POST['cardMonth'];
$_SESSION['cardYear'] = $_POST['cardYear'];
$_SESSION['cardValidation'] = $_POST['cardValidation'];

$errorList = [];

if(isEmpty($_SESSION['deliveryName'])) {
    array_push($errorList, "Please enter a name");
}

if(isEmpty($_SESSION['deliveryEmail'])) {
    array_push($errorList, "Please enter an email");
}
else if(!isEmail($_SESSION['deliveryEmail'])) {
    array_push($errorList, "Invalid email");
}

if(isEmpty($_SESSION['deliveryAddress1'])){
    array_push($errorList, "Please enter an address");
}

if(isEmpty($_SESSION['deliveryCity'])) {
    array_push($errorList, "Please enter a city");
}

if(isEmpty($_SESSION['deliveryPostcode'])){
    array_push($errorList, "Please enter a postcode");
}
else if(!isDigits($_SESSION['deliveryPostcode']) || !checkLength($_SESSION['deliveryPostcode'], 4)){
    array_push($errorList, "Enter Valid postcode");
}

if(isEmpty($_SESSION['cardNumber'])) {
    array_push($errorList, "Enter a card number");
}
else if(!checkCardNumber($_SESSION['cardType'] , $_SESSION['cardNumber'])) {
    array_push($errorList, "Enter valid card number!");
}

if(!checkCardDate($_SESSION['cardMonth'], $_SESSION['cardYear'])) {
    array_push($errorList, "Card expiry date must be in the future");
}

if(isEmpty($_SESSION['cardValidation'])) {
    array_push($errorList, "Enter a verification code!");
}
else if(!checkCardVerification($_SESSION['cardType'], $_SESSION['cardValidation'])) {
    array_push($errorList, "Enter valid verification code");
}
?>

<main>
    <?php
    if(sizeof($errorList) == 0){
        echo "<p> Thanks!</p>";
        echo "<script src = 'js/getCart.js'></script>";
    }else{
        echo "<ul id = 'errorList'>";
        foreach ($errorList as $error) {
            echo "<li> $error </li>";
        }
    }
    ?>
    <div id="cart"></div>
</main>

<?php include("./htaccess/footer.php"); ?>

</body>

</html>
