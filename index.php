<?php
$saved_side = "";
$number = 47;
$side = "";
echo decbin($number) . " ";
function compress_1(int $number, string $level = "")
{
    //echo $number . " ";
    $binary = decbin($number);
    
    if (strlen($binary) < 3) {
        return array($level, $binary);
    }
    //$save = $binary[0] . $save;
    $i = 0; //strlen($binary) - 1;
    $level = ($binary[0]);
    while ($i < strlen($binary) - 1) {
        $bool = ($binary[$i] XOR $binary[$i + 1]);
        $level .= $level[strlen($level)-1] XOR $bool;
        $i++;
    }
    echo $level . "%";
    $number = bindec($level);
    $number = $number >> 1;
    
    $output = compress_1($number, substr($level,0));
    return $output;
}

$comp = compress_1($number);
echo "<br/>";

function decompress(string $save, string $decomp) {
    if (strlen($save) == 1)
        return substr($decomp,0);
    // add to side (1 bool)
    $decomp = $save[0] . $decomp;
    $i = strlen($decomp) - 1;
    $comp = (string)($save[0] XOR $decomp[0]);
    while ($i > 0) {
        $bool = $decomp[$i] XOR $decomp[$i - 1];
        $comp .= $comp[strlen($comp)-1] XOR $bool;
        //echo $comp;
        $i--;
    }
    echo $comp . " ";
    $decomp = decompress(substr($save,1), $comp);
    return $decomp;
}
$decomp = decompress($comp[0], $comp[1]);
echo $decomp;
?>