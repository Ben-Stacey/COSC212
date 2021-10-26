<?php
session_start();
if (isset($_SESSION['counter1'])) {
    $_SESSION['counter1'] += 1;
} else {
    $_SESSION['counter1'] = 1;
}
?>

<!DOCTYPE html>

<html>
<head>
    <title>sessionCounter</title>
    <meta charset="utf-8">
</head>
<body>

<h1>Session Counter 1</h1>

<ul>
    <li>Session Counter 1<?php
        if (isset($_SESSION['counter1'])) {
            echo $_SESSION['counter1'];
        } else {
            echo "0";
        }
        ?> times
    <li><a href="sessionCounter2.php">Session Counter 2</a><?php
        if (isset($_SESSION['counter2'])) {
            echo $_SESSION['counter2'];
        } else {
            echo "0";
        }
        ?> times
    <li><a href="sessionCounter3.php">Session Counter 3</a><?php
        if (isset($_SESSION['counter3'])) {
            echo $_SESSION['counter3'];
        } else {
            echo "0";
        }
        ?> times
</ul>

</body>

</html>
