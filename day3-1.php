<?php


$lines = [];
$highest = 0;

$joltage = 0;
$file = fopen('day3.txt', 'r');

if ($file) {
    while (($line = fgets($file)) !== false) {
        $lines[] = trim($line); // trim removes newline
    }
    fclose($file);
}
// echo "Lines: ";
// print_r($lines);

foreach ($lines as $line) {
    $highTens = -1;
    $index = -1;
    for($i=0; $i < strlen($line)-1; $i++) {
        
        if ((int)$line[$i] > $highTens) {
            $highTens = (int)$line[$i];
            $highIndex = $i;
        
        }   
        
    }
    $highUnits = -1;

    for($i=$highIndex+1; $i < strlen($line); $i++) {
        if ((int)$line[$i] > $highUnits) {
            $highUnits = (int)$line[$i];
        
        }
    }

    $joltage += $highTens*10  + $highUnits;
    echo "Line: " . $line . " Highest: " . $highTens . " Highindex: " . $highIndex . " HighUnits: " . $highUnits . " Joltage: " . $joltage . "<br>\n";
}

echo "Total Joltage: " . $joltage . "\n";


?>



