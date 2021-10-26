<?php
include("htaccess/header.php");
if(!isset($_SESSION['authenticatedUser'])){
    if(strlen($_SESSION['lastPage']) > 0){
        header($_SESSION['lastPage']);
        exit;
    }else{
        header('index.php');
        exit;
    }
}
$_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
?>
    <main>
        <h2>Orders</h2>
        <?php
        if($_SESSION['role'] === 'user'){
            include("./htaccess/customerOrders.php");
        }else{
            include("./htaccess/adminOrders.php");
        }
        ?>
    </main>
    </body>
    </html>
<?php
include("htaccess/footer.php");
?>
