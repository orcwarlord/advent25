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




for ($i = 0; $i < count($inputs[0]); $i++) {
    $value1 = ($inputs[0][$i]);
    $value2 = ($inputs[1][$i]);
    $value3 = ($inputs[2][$i]);
    $value4 = ($inputs[3][$i]);
    // echo "Values[$i]: $value1, $value2, $value3, $value4<br>\n";

    if(strlen($value1) == 1) {
        $value1 = "00{$value1}";
    } elseif(strlen($value1) == 2) {
        $value1 = "0{$value1}";
    }
    if(strlen($value2) == 1) {
        $value2 = "00{$value2}";
    } elseif(strlen($value2) == 2) {
        $value2 = "0{$value2}";
    }
    if(strlen($value3) == 1) {
        $value3 = "00{$value3}";
    } elseif(strlen($value3) == 2) {
        $value3 = "0{$value3}";
    }
    if(strlen($value4) == 1) {
        $value4 = "00{$value4}";
    } elseif(strlen($value4) == 2) {
        $value4 = "0{$value4}";
    }

    // // echo "Values[$i]: $value1, $value2, $value3, $value4<br>\n";
    // echo "First digit: {$value1[0]} {$value2[0]} {$value3[0]} {$value4[0]}<br>\n";
    // echo "Second digits: {$value1[1]} {$value2[1]} {$value3[1]} {$value4[1]}<br>\n";
    // echo "Value 3:{$value1[2]} {$value2[2]} {$value3[2]} {$value4[2]}<br>\n";
    
    for($j = 0; $j < 3; $j++) {

        
    

        if($operations[0][$i] == "+") {
            $value = intval(strval($value1[$j]) + strval($value2[$j]) + strval($value3[$j]) + strval($value4[$j]));
            echo " Adding: " . strval($value1[$j]) . " + " . strval($value2[$j]) . " + " . strval($value3[$j]) . " + " . strval($value4[$j]) . " = $value<br>\n";   
        } elseif($operations[0][$i] == "*") {
            $value = $value1[$j] * $value2[$j] * $value3[$j] * $value4[$j];
        }
    
    
        $total += $value;
        // echo " Result[$i]: $value. Running total: $total<br>\n";
    }
}




echo "<br>Total Result: $total<br>\n";

