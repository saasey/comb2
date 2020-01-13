<?php

$number = 82;
$side = ""; //decbin($number);
function compress_1(int $number, string $side)
{
    $save = "";
    //echo $number . " ";
    $binary = decbin($number);
    if ($number == 0) {
        return;
    }
    $side ="";
    $i = strlen($binary) - 1;
    //$side = $binary[$i];
    while ($i > 0) {
        //$save = ($save << 1);
        $bool = (int)($binary[$i] XOR $binary[$i - 1]);
        $side .= $bool;
        $i--;
    }
    echo $side . " ";
    //$number = bindec($save);
    $number = $number >> 1;
    
    compress_1($number, $side);
}

compress_1($number, $side);

?>