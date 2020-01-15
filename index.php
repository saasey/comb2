<?php

$number = 124310;
$side = ""; //decbin($number);
function compress_1(int $number, string $side = "", string $save = "")
{
    //echo $number . " ";
    if ($side == "")
        $binary = decbin($number);
    else
        $binary = $side;
    if (strlen($binary) <= 8) {
        return array($save, $binary);
    }
    // save will come out backward

    
    $side = ""; //decbin($save[strlen($save)-1]);
    $i = 0;

    while ($i < strlen($binary) - 1) {

        $bool = decbin($binary[$i] XOR $binary[$i + 1]);
        
        $side = decbin($bool) . $side;
        
        $i++;
    
    }
    $save .= $side[0];
    echo " a" . $side . "b ";
    $number = bindec($side); 
    $number = $number >> 1;
    
    return compress_1($number, $side, $save);
}

$comp = compress_1($number);
echo "<br/>$comp[1]<br/>";

function decompress(string $save, string $binary) {
    
    // add to side (1 bool)
    $i = 0;
    $comp = "";
    if (strlen($save) > 0)
        $comp = decbin($save[0]);
    else
        return $comp;
    
    while ($i < strlen($binary)) {

        $bool = decbin($binary[strlen($binary) - $i - 2] XOR $binary[strlen($binary) - $i - 1]);
        
        $comp .= decbin($bool);
        
        $i++;
    
    }
    
    echo " a" . $comp . "b ";
    if (strlen($save) == 1)
        return $comp;
    return decompress(substr($save,1,strlen($save)), $comp);
}
$decomp = decompress($comp[0], $comp[1]);
echo $decomp;

?>