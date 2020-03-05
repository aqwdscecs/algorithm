<?php

function Fibonacci($n)
{
    // write code here
    if ($n <= 0) return 0;
    if ($n == 1 || $n == 2) return 1;
    
    $first    = 1;
    $second   = 1;
    
    for ($index=3; $index <= $n; $index++) {
        
        $curValue = $first + $second;
        $first = $second;
        $second = $curValue;
    }
    return $curValue;
}

//递归
//重复计算次数太多
function Fibonacci($n)
{
    if ($n <= 0) return 0;
    if ($n == 1 || $n == 2) return 1;
    // write code here
    return Fibonacci($n-1) + Fibonacci($n-2);
}
