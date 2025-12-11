<?php

$operations = [];
$inputs = [];
$total = 0;

$file = fopen('day6operations.txt', 'r');

if ($file) {
    // Read the line and add each element to an array, split by  a number of spaces
    while (($line = fgets($file)) !== false) {
        $parts = preg_split('/\s+/', rtrim($line));
        $operations[] = $parts;
    }
    fclose($file);    
}




// echo "Operations: <br>\n";
// print_r($operations);


$file = fopen('day6inputs.txt', 'r');

if ($file) {
    // Read the line and add each element to an array, split by  a number of spaces
    while (($line = fgets($file)) !== false) {
        $parts = preg_split('/\s+/', trim($line));
        $inputs[] = $parts;
        // echo "Read line: " . rtrim($line) . "<br>\n";
        
    }
    fclose($file);
}
// print_r($inputs);

echo "count: " . count($inputs[0]) . "<br>\n";

for ($i = 0; $i < count($inputs[0]); $i++) {
    $value1 = intval($inputs[0][$i]);
    $value2 = intval($inputs[1][$i]);
    $value3 = intval($inputs[2][$i]);
    $value4 = intval($inputs[3][$i]);
    echo "Values[$i]: $value1, $value2, $value3, $value4<br>\n";

    
    // echo "Initial value[$i]: $value<br>\n";
    if($operations[0][$i] == "+") {
        $value = $value1 + $value2 + $value3 + $value4;
    } elseif($operations[0][$i] == "*") {
        $value = $value1 * $value2 * $value3 * $value4;
    
    } 
    $total += $value;
    // echo " Result[$i]: $value. Running total: $total<br>\n";
}



echo "<br>Total Result: $total<br>\n";

