<?php
include("./htaccess/header.php");
$scriptList = array("./js/jquery-3.6.0.js");

if(isset($_SESSION['authenticatedUser'])){
    if(strlen($_SESSION['lastPage']) > 0){
        header($_SESSION['lastPage']);
        exit;
    }else{
        header('index.php');
        exit;
    }
}
?>

<main>
    <h2>Register as a Customer</h2>
    <?php
    $dbUsername = 'bstacey';
    $dbPassword = 'Babies101';
    $dbDatabase = 'bstacey_dev';
    $dbServer = 'sapphire';
    $conn = new mysqli($dbServer, $dbUsername, $dbPassword, $dbDatabase);

    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];

    if(strlen(trim($_SESSION['username'])) > 0 && strlen(trim($_SESSION['password'])) > 0 && strlen(trim($_SESSION['email'])) > 0){
        if ($conn->connect_errno) {
            echo "failed to connect";
            exit;
        }

        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $email = $conn->real_escape_string($_POST['email']);
        $query = "SELECT * FROM Users WHERE username = '$username'";
        $result = $conn->query($query);

        if($result->num_rows === 0){
            $query = "INSERT INTO Users (username, password, email, role) " . "VALUES ('$username', SHA('$password'), '$email', 'user')";
            $conn->query($query);
            if($conn->affected_rows === 0){
                echo "failed to make account";
            }else{
                echo "account made";
            }
        }else{
            echo "username taken";
        }

        $result->free();
        $conn->close();
    }else{
        if(strlen(trim($_SESSION['username'])) == 0){
            echo "enter username\n";
        }
        if(strlen(trim($_SESSION['email'])) == 0){
            echo "enter email\n";
        }
        if(strlen(trim($_SESSION['password'])) == 0){
            echo "enter password";
        }
    ?>
    <form id="register" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" novalidate>
        <p>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" required=""
            <?php
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                echo "value='$username;";
            }
            ?>>
        </p>
        <p>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" required=""
                <?php
                if(isset($_SESSION['email'])){
                    $email = $_SESSION['email'];
                    echo "value='$email;";
                }
                ?>>
        </p>
        <p>
            <label for="password">Password: </label>
            <input type="text" name="password" id="password" required=""
                <?php
                if(isset($_SESSION['password'])){
                    $password = $_SESSION['password'];
                    echo "value='$password;";
                }
                ?>>
        </p>
        <input type="submit">
        <?php } ?>
    </form>
</main>

<?php
include("./htaccess/footer.php");
?>

</body>
</html>