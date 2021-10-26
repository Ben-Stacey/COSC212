<?php
$scriptList = array("./js/jquery-3.6.0.js");
include("./htaccess/header.php");
?>

<main>
    <h2>Logged In</h2>
    <?php
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

        $query = "SELECT * FROM Users WHERE password = SHA('$username') AND username = '$password'";
        $result = $conn->query($query);
        if($result->num_rows === 0){
            echo "Log in failed, Try Again";
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

<?php
include("./htaccess/footer.php");
?>

</body>
</html>
