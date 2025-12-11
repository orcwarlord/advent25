<?php

$lines = file('day3.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$total = 0;

foreach ($lines as $line) {
    $digits = str_split(trim($line));
    $needed = 12;                    // must choose exactly 12 digits
    $result = '';

    $i = 0;
    $n = count($digits);

    while ($needed > 0) {
        // position range: from current i up to the last index
        // that still allows enough digits remaining
        $maxPos = $n - $needed;

        // find largest digit between $i and $maxPos
        $bestDigit = -1;
        $bestIndex = $i;

        for ($p = $i; $p <= $maxPos; $p++) {
            $d = (int)$digits[$p];
            if ($d > $bestDigit) {
                $bestDigit = $d;
                $bestIndex = $p;
                if ($d == 9) break;   // you cannot beat 9, early exit
            }
        }

        // add chosen digit
        $result .= $bestDigit;
        $needed--;

        // continue after the chosen digit
        $i = $bestIndex + 1;
    }

    // Add to total as integer (PHP handles big ints)
    $total += intval($result);

    echo "Line: $line  →  $result<br>\n";
}

echo "<br><b>Total Joltage: $total</b>\n";