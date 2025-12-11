<?php


$rows = [];


$file = fopen('day4.txt', 'r');

if ($file) {
    while (($line = fgets($file)) !== false) {
        $rows[] = trim($line); // trim removes newline
    }
    fclose($file);
}
$total = 0;

for ($row = 0; $row < count($rows); $row++) {

    $width  = strlen($rows[$row]);
    $height = count($rows);

    for ($col = 0; $col < $width; $col++) {

        $surrounding = 0;

        for ($r = -1; $r <= 1; $r++) {
            for ($c = -1; $c <= 1; $c++) {

                if ($r == 0 && $c == 0) continue;

                $rr = $row + $r;
                $cc = $col + $c;

                // ✔ bounds check BEFORE access
                if ($rr < 0 || $rr >= $height) continue;
                if ($cc < 0 || $cc >= $width) continue;

                if ($rows[$rr][$cc] === '@') {
                    $surrounding++;
                }
            }
        }

        if ($surrounding <= 3 && $rows[$row][$col] === '@') {
            $total++;
        }
    }
}


echo "<br><b>Total: $total</b>\n";




?>