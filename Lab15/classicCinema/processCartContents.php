<?php
session_start();
$arr = json_decode(file_get_contents("php://input"));
foreach ($arr as $value){
    echo $value->title;
}

$orders = simplexml_load_file('./htaccess/orders.xml');

$newOrder = $orders->addChild('order');
$delivery = $newOrder->addChild('delivery');
$deliveryName = $delivery->addChild('deliveryName', $_SESSION['deliveryName']);
$deliveryEmail = $delivery->addChild('deliveryEmail', $_SESSION['deliveryEmail']);
$deliveryAddress1 = $delivery->addChild('deliveryAddress1', $_SESSION['deliveryAddress1']);
$deliveryAddress2 = $delivery->addChild('deliveryAddress2', $_SESSION['deliveryAddress2']);
$deliveryCity = $delivery->addChild('deliveryCity', $_SESSION['deliveryCity']);
$deliveryPostcode = $delivery->addChild('deliveryPostcode', $_SESSION['deliveryPostcode']);
$username = $delivery->addChild('username', $_SESSION['authenticatedUser']);
$items = $newOrder->addChild('items');

foreach ($arr as $film){
    $item = $items->addChild('item');
    $title = $item->addChild('title', $film->title);
    $price = $item->addChild('price', $film->price);
}

$orders->saveXML('./htaccess/orders.xml');

/**
$_SESSION = array();
session_destroy();
 * */

