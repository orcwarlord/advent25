<?php


$lines = [];
$position = 50;
$zeroCount = 0;
$file = fopen('day1.txt', 'r');

if ($file) {
    while (($line = fgets($file)) !== false) {
        $lines[] = trim($line); // trim removes newline
    }
    fclose($file);
}

// read each line and 
foreach ($lines as $line) {
    echo "Processing line: " . $line . "   ";
    $direction = substr($line, 0, 1);
    // echo "Direction: " . $direction . "   ";
    $steps = (int)substr($line, 1)%100;

    // echo "Steps: " . $steps . "  ";
    
    if ($direction === 'R') {
        $position += ( $steps );
        if ($position >= 100) {
            $position -= 100;
        }
    } elseif ($direction === 'L') {
        $position -= $steps;
        if ($position < 0) {
            $position += 100;
        } 
    }
    echo "New position: " . $position  . "<br>\n";
    if ($position === 0) {
        $zeroCount++;
    }
}

echo "Number of zeroes is: " . $zeroCount . "\n";