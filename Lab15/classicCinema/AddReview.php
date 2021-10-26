<?php
session_start();
$reviews = simplexml_load_file($_POST['xmlFileName']);
$review = $reviews->addchild('review');
$user = $review->addchild('user', $_SESSION['authenticatedUser']);
$rating = $review->addchild('rating', $_POST['rating']);
$reviews->saveXML($_POST['xmlFileName']);
header('Location: ' . $_SESSION['lastPage']);
?>
