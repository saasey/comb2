<?php

$number = 12431;
$side = ""; //decbin($number);
function compress_1(int $number, string $side, string $save = "")
{
    //echo $number . " ";
    if ($side == "")
        $binary = decbin($number);
    else
        $binary = $side;
    if (strlen($binary) < 4) {
        return array($save . $binary[0], $binary);
    }
    $save .= $binary[0];
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
    
    return compress_1($number, $side, $save);
}

$comp = compress_1($number, $side);
echo "<br/>";

function decompress(string $save, string $decomp) {
    
    // add to side (1 bool)
    $i = 0;
    $comp = $save[0];
    while ($i < strlen($decomp)) {
        $bool = $decomp[strlen($decomp) - $i - 1] XOR $decomp[strlen($decomp) - $i - 2];
        $comp .= (string)($bool);
        $i++;
    }
    echo $comp . " ";
    if (strlen($save) == 1)
        return $comp;
    return decompress(substr($save,1), $comp);
}
$decomp = decompress($comp[0], $comp[1]);
echo $decomp;
?>