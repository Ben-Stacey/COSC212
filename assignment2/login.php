<?php
include("./htaccess/header.php");
?>

<main>
    <?php
    /**
     * @desc logs the user in
     * @requires JQuery
     * @author Ben Stacey
     * @created October 2021
     */
    /**
     * This accesses the Mysql database and then checks it against the
     * values entered into the login form
     *
     * once logged in it redirects you back to the page you were last at
     */
    $dbUsername = 'bstacey';
    $dbPassword = 'Babies101';
    $dbDatabase = 'bstacey_dev';
    $dbServer = 'sapphire';
    $conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);
    if($conn->errno){
        echo "cannot connect to data base";
    }else{
        $username = $conn->real_escape_string($_POST['loginUser']);
        $password = $conn->real_escape_string($_POST['loginPassword']);

        $query = "SELECT * FROM Assign WHERE password = '$username' AND username = '$password'";
        $result = $conn->query($query);
        if($result->num_rows === 0){
            echo "<h2>Log in failed, Try Again</h2>";
        }else{
            $_SESSION['authenticatedUser'] = $username;
            $row = $result->fetch_assoc();
            $_SESSION['role'] = $row['role'];
            if(isset($_SESSION['lastPage'])){
                header('Location: ' . $_SESSION['lastPage']);
                exit;
            }else{
                header('Location: index.php');
                exit;
            }
        }
    }
    ?>
</main>
</body>
</html>
