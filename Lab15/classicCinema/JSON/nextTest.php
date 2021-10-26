<?php
$input_filename = "map-data.json";
$output_filename = "map-data-updated.json";
$json_input = file_get_contents($input_filename);
$json = json_decode($json_input,true);
$json["features"][1]["properties"]["description"] = "HCI Lab";
$json["features"][2] = [];
$json["features"][2]["type"] = "Feature";
$json["features"][2]["properties"] = [];
$json["features"][2]["properties"]["description"] = "Owheo";
$json["features"][2]["geometry"] = [];
$json["features"][2]["geometry"]["type"] = "Point";
$json["features"][2]["geometry"]["coordinates"] = [];
$json["features"][2]["geometry"]["coordinates"][0] = 170.518204;
$json["features"][2]["geometry"]["coordinates"][1] = -45.866727;
$json["features"][2]["id"] = 3;
$json_output = json_encode($json,JSON_PRETTY_PRINT)."\n";
file_put_contents($output_filename,$json_output);
?>
<pre>
<?php
print_r($json);
?>
</pre>
