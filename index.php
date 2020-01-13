<?php

$number = 243;
$side = ""; //decbin($number);
function compress_1($number, string $side)
{
    $save = "";
    //echo $number . " ";
    if ($side == "")
        $binary = decbin($number);
    else
        $binary = $side;
    if (strlen($binary) < 3) {
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
    $number = bindec($side);
    $number = $number >> 1;
    
    compress_1($number, $side);
}

compress_1($number, $side);

?>