<?php

$ranges = [];

// LOAD RANGES
$file = fopen('day5ranges.txt', 'r');
if ($file) {
    while (($line = fgets($file)) !== false) {
        $line = trim($line);
        if ($line === "") continue;

        list($a, $b) = array_map('intval', explode('-', $line));
        $ranges[] = [$a, $b];
    }
    fclose($file);
}

// SORT BY START ID
usort($ranges, function($x, $y) {
    return $x[0] <=> $y[0];
});

// MERGE RANGES
$merged = [];
$current = $ranges[0];

foreach ($ranges as $r) {
    // overlap or touching
    if ($r[0] <= $current[1] + 1) {
        $current[1] = max($current[1], $r[1]);
    } else {
        $merged[] = $current;
        $current = $r;
    }
}
$merged[] = $current;

$totalFresh = 0;

foreach ($merged as $m) {
    $totalFresh += ($m[1] - $m[0] + 1);
}

echo "Part 2 fresh IDs: $totalFresh\n";
