<?php
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
$scriptList = array("./js/jquery-3.6.0.js");
include("./htaccess/header.php");
?>

<main>
    <h2>Logged out</h2>
    <?php
    $_SESSION = array();
    session_destroy();
    header('index.php');
    ?>
</main>

<?php
include("./htaccess/footer.php");
?>

</body>
</html>
