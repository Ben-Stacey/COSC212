<?php

if (!isset($_GET['user'])) {
    include("htaccess/check.php");
    exit;
}

$formOK = false;
if (isset($_GET['submit'])) {
    if(strlen(trim($_GET['user']))> 0) {
        $formOK = true;
        echo "Hello " . $_GET['user'];
    } else {
        $formOk = false;
        echo "Please enter name";
    }
}

if (!$formOk) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Hello</title>
    </head>
    <body>
    <form name="myForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get" >
        Enter your name: <input type="text" name="user">
        <input type="submit" name="submit" value="submit">
    </form>

    </body>
    </html>
<?php } ?>
