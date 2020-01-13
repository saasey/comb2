<?php

$number = 82;
$side = ""; //decbin($number);
function compress_1(int $number, string &$side)
{
    $save = 0;
    echo $number . " ";
    $binary = decbin($number);
    
    if ($number == 0) {
        return;
    }
    $i = strlen($binary) - 1;
    echo $binary . " ";
    while ($i > 0) {
        $save = ($save << 1);
        $bool = ($binary[$i] ^ $binary[$i - 1]);
        $save = $save + (int)$bool;
        $i--;
    }
    $number = $number >> 1;
    
    compress_1($number, $side);
}

compress_1($number, $side);

?>