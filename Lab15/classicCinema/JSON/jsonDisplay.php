<!DOCTYPE html>
<html lang="en">
<head>
    <title>jsonDisplay</title>
    <meta charset="utf">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<main>
    <?php
    $input = "map.json";
    $json_input = file_get_contents($input);
    $json = json_decode($json_input, true);
    $one = $json["features"][0];
    $two = $json["features"][1];
    $three = $json["features"][2];
    ?>
    <table>
        <tr>
            <th></th>
            <th>Description</th>
            <th>Longitude</th>
            <th>Latitude</th>
        </tr>
        <tr>
            <td>One</td>
            <td><?php echo $one["properties"]["description"]?></td>
            <td><?php echo $one["geometry"]["coordinates"][0]?></td>
            <td><?php echo $one["geometry"]["coordinates"][1]?></td>
        </tr>
        <tr>
            <td>Two</td>
            <td><?php echo $two["properties"]["description"]?></td>
            <td><?php echo $two["geometry"]["coordinates"][0]?></td>
            <td><?php echo $two["geometry"]["coordinates"][1]?></td>
        </tr>
        <tr>
            <td>Three</td>
            <td><?php echo $three["properties"]["description"]?></td>
            <td><?php echo $three["geometry"]["coordinates"][0]?></td>
            <td><?php echo $three["geometry"]["coordinates"][1]?></td>
        </tr>
    </table>
</main>
</body>
</html>