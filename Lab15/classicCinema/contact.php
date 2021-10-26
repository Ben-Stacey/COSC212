
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leaflet/leaflet.css"/>
    <script src="leaflet/leaflet.js"></script>
    <script src="js/map.js"></script>
</head>

<body>

<?php
$scriptList = array('./js/showHide.js');
include("./htaccess/header.php");
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
?>



<main>
    <figure id="map">

    </figure>

    <ul class="contact">
        <li>
            <h3>Central</h3>
            <p>
                101 The Octagon
            </p>
            <p>
                (03) 490 1234
            </p>
        </li>
        <li>
            <h3>North</h3>
            <p>
                789 Princes St
            </p>
            <p>
                (03) 490 2468
            </p>
        </li>
        <li>
            <h3>South</h3>
            <p>
                561 Great King St
            </p>
            <p>
                (03) 490 3579
            </p>
        </li>
    </ul>
</main>

<?php include("./htaccess/footer.php"); ?>

</body>
</html>