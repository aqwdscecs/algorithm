<?php

//数学归纳  ===》  斐波那契额数列   
function rectCover($number)
{
    // write code here
    if ($number <= 2) return $number;
    
    $second = 2;
    $first  = 1;
    
    $i = 3;
    while ($i <= $number) {
        $sum = $second + $first;
        $first = $second;
        $second = $sum;
        $i++;
    }
    
    return $sum;
}