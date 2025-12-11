<?php

$input = trim(file_get_contents('day2.txt'));

$ranges = explode(',', $input);

$total = 0;

/**
 * Returns true if the number is composed of repeated digit blocks (>= 2 times).
 */
function is_invalid_id(string $n): bool {
    $len = strlen($n);

    // a repeated block must have block length that divides total length
    for ($block = 1; $block <= $len / 2; $block++) {
        if ($len % $block !== 0) {
            continue;
        }

        $repeatCount = $len / $block;

        // must repeat at least twice
        if ($repeatCount < 2) {
            continue;
        }

        $chunk = substr($n, 0, $block);

        // build expected repeated string
        if (str_repeat($chunk, $repeatCount) === $n) {
            return true;
        }
    }

    return false;
}

foreach ($ranges as $range) {
    if (!str_contains($range, '-')) continue;

    list($start, $end) = array_map('intval', explode('-', $range));

    for ($id = $start; $id <= $end; $id++) {
        $s = (string)$id;

        // Must not have leading zeros, but puzzle states they never do
        if (is_invalid_id($s)) {
            $total += $id;
        }
    }
}

echo "Part 2 total: $total\n";