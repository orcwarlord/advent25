<?php

$ingredients = [];
$ranges = [];
$fresh = 0;

$file = fopen('day5ingredients.txt', 'r');

if ($file) {
    while (($line = fgets($file)) !== false) {
        $ingredients[] = (int)rtrim($line);
    }
    fclose($file);
}

$file = fopen('day5ranges.txt', 'r');
if ($file) {
    while (($line = fgets($file)) !== false) {
        $parts = explode('-', rtrim($line));
        $ranges[] = [intval($parts[0]), intval($parts[1])];
    }
    fclose($file);
}

// print_r($ingredients);

foreach($ingredients as $ingredient) {
    foreach($ranges as $range) {
        if ($ingredient >= $range[0] && $ingredient <= $range[1]) {
            $fresh++;
            break;
        }
    }
}

echo "Fresh ingredients: " . $fresh . "\n";
