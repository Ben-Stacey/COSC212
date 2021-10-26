<?php
$orderNum = 1;
$orders = simplexml_load_file('./htaccess/orders.xml');

echo "<h3>Administrator Orders</h3>";

foreach($orders->order as $order){
    echo "<h3>Order: $orderNum</h3>";
    $orderNum++;

    $deliveryName = $order->delivery->deliveryName;
    echo "<p><b>Name: </b>$deliveryName</p>";

    $deliveryEmail = $order->delivery->deliveryEmail;
    echo "<p><b>Email: </b>$deliveryEmail</p>";

    $deliveryAddress1 = $order->delivery->deliveryAddress1;
    echo "<p><b>AddressLine1: </b>$deliveryAddress1</p>";

    $deliveryAddress2 = $order->delivery->deliveryAddress2;
    echo "<p><b>AddressLine2: </b>$deliveryAddress2</p>";

    $deliveryCity = $order->delivery->deliveryCity;
    echo "<p><b>City: </b>$deliveryCity</p>";

    $deliveryPostcode = $order->delivery->deliveryPostcode;
    echo "<p><b>Postcode: </b>$deliveryPostcode</p>";

    echo "<b>Movies:</b>";
    echo "<ul>";

    $items = $order->items;
    $totalCost = 0.0;
    foreach($items->item as $item){
        $title = $item->title;
        $price = $item->price;
        echo "<li> $title $price";
        $totalCost += floatval($price);
    }

    echo "</ul>";
    echo "<p><b>Total cost: </b>$totalCost</p>";
}

if($orderNum === 1){
    echo "<h3>No orders</h3>";
}