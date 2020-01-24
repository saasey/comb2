<?php

$number = 222910;
$side = ""; //decbin($number);
function compress_1(string $side, string $save = "")
{
    //echo $number . " ";
    $binary = ($side);

    if (strlen($binary) <= 4) {
        return array(strrev($save), strrev($binary));
    }
    // save will come out backward

    //$side .= decbin($save[strlen($save)-1]);
    $i = 1;
    $side2 = "";
    while (strlen($side2) < strlen($binary)-1) {

        $side2 .= decbin($binary[$i-1] xor $binary[$i]);

        $i++;

    }

    $save .= (string)($binary[0]);
    echo " c" . $side2 . "d ";
    $temp = substr($side2, 1, strlen($side2)-1);

    return compress_1($side2, $save);
}
echo decbin($number) . "<br/>";
$comp = compress_1($number);
echo "<br/>$comp[1]okcd<br/><br/>kcad$comp[0]<br/>";

function decompress(string $save, string $binary, bool $cont = false)
{
    $save = strrev($save);
    $side = 0;
    if (strlen($save) > 0)
    $binary .= $save[0];
    $i = 0; // strlen($binary) - 1;
    while (strlen($side) < strlen($binary)) {

        $side = decbin($binary[$i] xor $binary[$i + 1]) . $side;

        $i++;

    }
    //if (strlen($save) > 0)
    //    $side .= $save[0];
    echo " a" . $side . "b ";
    if (strlen($save) == 0) {
        return $side;
    }
    return decompress(substr($save, 1), $side, true);
}
$decomp = decompress($comp[0], $comp[1]);
echo $decomp;