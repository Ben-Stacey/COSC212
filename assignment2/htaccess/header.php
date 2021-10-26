<?php
if(session_id() === ""){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<!--Nick Meek 2015-->
<head>
    <meta charset="utf-8">
    <title>Muttley and Co.: Admin</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery/jquery3.3.js"></script>

    <script src="./js/Admin.js"></script>
    <style>
        th, td{
            padding: 3px 10px;
        }
    </style>
    <?php
    if (isset($scriptList) && is_array($scriptList)) {
        foreach ($scriptList as $script) {
            echo "<script src='$script'></script>";
        }
    }
    ?>
</head>

<body>
<header>
<h1>Muttley & Co. Dog Hire</h1>
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
                    <input type="submit" id="loginSubmit" value="Login">
                </form>
            </div>
            <?php
        }else{
            ?>
            <div id="logout" style = display:block>
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
                echo "<li> <a href='/~bstacey/assignments/index.php'>Home</a>";
            }
            if ($currentPage === 'map.php') {
                echo "<li> Map";
            } else {
                echo "<li> <a href='/~bstacey/assignments/map.php'>Map</a>";
            }
            if ($currentPage === 'admin.php') {
                echo "<li>Admin";
            } else {
                if(isset($_SESSION['authenticatedUser'])) {
                    echo "<li> <a href='/~bstacey/assignments/admin.php'>Admin</a>";
                }else {
                    echo "";
                }
            }
            ?>
        </ul>
    </nav>
</header>
