<?php
    $scriptList = array('./js/jquery-3.6.0.js', './js/carousel.js');
    include("./htaccess/header.php");
    $_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
?>

<main>
    <p>
        Welcome to Classic Cinema, your online store for classic film.
    </p>
    <div id="carousel">

    </div>
</main>

<?php include("./htaccess/footer.php"); ?>

</body>
</html>