<?php

$input = file('day1.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$current = 50;

$part1 = 0;   // count times dial ends a rotation on 0
$part2 = 0;   // count all times a click lands on 0

foreach ($input as $line) {
    $dir = $line[0];             // 'L' or 'R'
    $dist = intval(substr($line, 1));

    // ----- PART 2: count full cycles -----
    $fullCycles = intdiv($dist, 100);
    $part2 += $fullCycles;

    // simulate the remaining steps for both part 1 and 2
    $steps = $dist % 100;

    for ($i = 0; $i < $steps; $i++) {
        if ($dir === 'L') {
            $current = ($current + 99) % 100;   // equivalent to -1 mod 100
        } else {
            $current = ($current + 1) % 100;
        }

        // Part 2: any click landing on 0
        if ($current === 0) {
            $part2++;
        }
    }

    // Part 1: only if the final position after the rotation is 0
    if ($current === 0) {
        $part1++;
    }
}

echo "Part 1: $part1\n";
echo "Part 2: $part2\n";
