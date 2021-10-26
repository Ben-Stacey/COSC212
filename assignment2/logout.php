<?php
/**
 * @desc logs the user out
 * @requires JQuery
 * @author Ben Stacey
 * @created October 2021
 */
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
$scriptList = array("./js/jquery-3.6.0.js");
include("./htaccess/header.php");
?>

<main>
    <h2>Logged out</h2>
    <?php
    /**
     * When the user clicks the log out butten the session is destroyed
     */
    $_SESSION = array();
    session_destroy();
    header('index.php');
    ?>
</main>
</body>
</html>
