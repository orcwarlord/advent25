<?php

$rows = [];
$file = fopen('day4.txt', 'r');

if ($file) {
    while (($line = fgets($file)) !== false) {
        $rows[] = rtrim($line);
    }
    fclose($file);
}

$height = count($rows);
$width  = strlen($rows[0]);

$totalRemoved = 0;

while (true) {
    $toRemove = [];

    // --- 1. Find all accessible rolls ---
    for ($row = 0; $row < $height; $row++) {
        for ($col = 0; $col < $width; $col++) {
            if ($rows[$row][$col] !== '@') continue;

            $adj = 0;

            for ($r = -1; $r <= 1; $r++) {
                for ($c = -1; $c <= 1; $c++) {
                    if ($r === 0 && $c === 0) continue;

                    $rr = $row + $r;
                    $cc = $col + $c;

                    if ($rr < 0 || $rr >= $height) continue;
                    if ($cc < 0 || $cc >= $width) continue;

                    if ($rows[$rr][$cc] === '@') {
                        $adj++;
                    }
                }
            }

            if ($adj < 4) {
                $toRemove[] = [$row, $col];
            }
        }
    }

    // --- 2. If nothing to remove, we're done ---
    if (count($toRemove) === 0) break;

    // --- 3. Remove all rolls found in this round ---
    foreach ($toRemove as [$r, $c]) {
        $rows[$r][$c] = '.';    // remove roll
    }

    $totalRemoved += count($toRemove);
}

echo "Part 2 Total Removed: $totalRemoved\n";
