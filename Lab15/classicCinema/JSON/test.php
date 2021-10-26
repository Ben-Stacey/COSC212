<?php
$input_filename = "map-data.json";
$output_filename = "map-data-updated.json";
$json_input = file_get_contents($input_filename);
$json = json_decode($json_input,true);
$json_output = json_encode($json,JSON_PRETTY_PRINT)."\n";
file_put_contents($output_filename,$json_output);
?>
<pre>
<?php print_r($json);
?>
</pre>
