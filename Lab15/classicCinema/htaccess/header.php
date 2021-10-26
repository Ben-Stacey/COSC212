<?php
if(session_id() === ""){
    session_start();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Classic Cinema</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    if($currentPage == "contact.php"){
        echo"<link rel='stylesheet' href='../leaflet/leaflet.css'>";
    }
    if (isset($scriptList) && is_array($scriptList)) {
        foreach ($scriptList as $script) {
            echo "<script src='$script'></script>";
        }
    }
    ?>
</head>
<body>
<header>
    <h1>Classic Cinema</h1>

    <div id="user">
        <?php
        if(!isset($_SESSION['authenticatedUser'])){
        ?>
        <div id="login">
            <form id="loginForm" action="login.php" method="POST">
                <label for="loginUser">Username: </label>
                <input type="text" name="loginUser" id="loginUser" required=""><br>
                <label for="loginPassword">Password: </label>
                <input type="password" name="loginPassword" id="loginPassword" required=""><br>
                <a href="register.php">Register</a>
                <input type="submit" id="loginSubmit" value="Login">
            </form>
        </div>
        <?php
        }else{
        ?>
        <div id="logout" style = display:block >
            <?php
                echo "<p>" . $_SESSION['authenticatedUser'] . " " . "Logged In</p>";
            ?>
            <form id="logoutForm" action="logout.php">
                <input type="submit" id="logoutSubmit" value="Logout">
            </form>
        </div>
        <?php
        }
        ?>
    </div>
    <nav>
        <ul>
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            if ($currentPage === 'index.php') {
                echo "<li> Home";
            } else {
                echo "<li> <a href='/~bstacey/ClassicCinema/Lab15/classicCinema/index.php'>Home</a>";
            }
            if ($currentPage === 'classic.php') {
                echo "<li> Classics";
            } else {
                echo "<li> <a href='/~bstacey/ClassicCinema/Lab15/classicCinema/classic.php'>Classics</a>";
            }
            if ($currentPage === 'scifi.php') {
                echo "<li> Sci&nbsp;Fi";
            } else {
                echo "<li> <a href='/~bstacey/ClassicCinema/Lab15/classicCinema/scifi.php'>Sci&nbsp;Fi</a>";
            }
            if ($currentPage === 'hitchcock.php') {
                echo "<li> Hitchcock";
            } else {
                echo "<li> <a href='/~bstacey/ClassicCinema/Lab15/classicCinema/hitchcock.php'>Hitchcock</a>";
            }
            if ($currentPage === 'contact.php') {
                echo "<li> Contact";
            } else {
                echo "<li><a href='/~bstacey/ClassicCinema/Lab15/classicCinema/contact.php'>Contact</a></li>";
            }
            if ($currentPage === 'cartDisplay.php') {
                echo "<li> Cart";
            } else {
                if(isset($_SESSION['authenticatedUser'])) {
                    echo "<li><a href='/~bstacey/ClassicCinema/Lab15/classicCinema/cartDisplay.php'>Cart</a></li>";
                }else{
                    echo "";
                }
            }
            if($currentPage == 'orders.php'){
                echo "<li> Orders";
            }else{
                if(isset($_SESSION['authenticatedUser'])) {
                    echo "<li> <a href = 'orders.php'>Orders</a>";
                }else {
                    echo "";
                }
            }
            ?>
        </ul>
    </nav>
</header>


