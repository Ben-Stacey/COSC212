
<?php
/**
 * @desc displays the map
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
$scriptList = array('./js/leaflet.js', './js/map.js');
include("./htaccess/header.php");
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
echo "<link rel='stylesheet' href='style.css'>";
echo "<link rel='stylesheet' href='leaflet.css'>";
echo "<script src='./js/leaflet.js'></script>";
?>
<main>
<div id="map"></div>
</main>
</body>
</html>