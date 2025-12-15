<?php

$lines = file('day7.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$splits = 0;

// Find the starting point 'S'
$startIndex = -1;

// check first line
$startIndex = strpos($lines[0], 'S');
if ($startIndex !== false) {
    $lines[0][$startIndex] = 'true'; // mark as visited
}

foreach ($i=1; $i < count($lines); $i++) {
    for ($j = 0; $j < strlen($lines[$i]); $j++) {
        if ($lines[$i][$j] === 'true') {
            // move down

        
            // split if ^ found
            if ($lines[$i+1][$j] === '^') {
                $splits++;
                $lines[$i+1][$j-1] = 'true'; 
                $lines[$i+1][$j+1] = 'true';
            }
    }
    
}


echo "<br><b>Total splits: $total</b>\n";