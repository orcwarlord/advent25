<?php


$lines = [];
$invalidID = 0;
$file = fopen('day2.txt', 'r');

if ($file) {
    // ines is file split at commas
    $lines = explode(',', fread($file, filesize('day2.txt')));

    // while (($line = fgets($file)) !== false) {
    //     $lines[] = trim($line); // trim removes newline
    //     // read each line and
    // }
    fclose($file);
}
// echo "Lines: ";
// print_r($lines);

// Split $line at - to give 2 values
foreach ($lines as $line) {
    // echo "Line: $line<br>";
    $parts = explode('-', $line);
    // echo "Parts: ";
    // print_r($parts);
    // echo "<br>";
    

    // for($i = 0; $i < count($parts); $i++) {
    //     $length = strlen($parts[$i]);
    //     // echo "Part $i length: $length<br>";
    //     if($length % 2 === 0) {
    //         // echo "Part $i length is even: $length<br>";
    //         $half = $length / 2;
    //         // echo "Half: $half<br>";
    //         $firstHalf = substr($parts[$i], 0, $half);
    //         $secondHalf = substr($parts[$i], $half);
    //         // echo "First half: $firstHalf<br>";
    //         // echo "Second half: $secondHalf<br>";
    //         if($firstHalf === $secondHalf){
    //             $invalidID++;
    //             echo "Part $i is invalid ID<br>";
    //         } 
    //     // } else {
    //         // echo "Part $i length is odd: $length<br>";
    //     }
        
    // }
    // echo "<hr><br>";
    for($i=(int)($parts[0]); $i<=(int)($parts[1]); $i++) {
        $id = (string)$i;

        $length = strlen($id);
        if($length % 2 === 0) {
            $half = $length / 2;
            $firstHalf = substr($id, 0, $half);
            $secondHalf = substr($id, $half);
            if($firstHalf === $secondHalf){
                $invalidID += (int)($i);
            } 
        }
    }

}
echo "Invalid IDs: $invalidID\n";


