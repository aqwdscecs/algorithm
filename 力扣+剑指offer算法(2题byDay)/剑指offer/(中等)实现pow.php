<?php

function Power($base, $exponent)
{
    // write code here
    $p = abs($exponent);
    $res = 1;
    
    while ($p!=0) {
        if (($p & 1) == 1) {
            $res *= $base;
        }
        $base *= $base;
        $p >>= 1;
    }
    
    return ($exponent > 0) ? $res : (1/$res);
} 