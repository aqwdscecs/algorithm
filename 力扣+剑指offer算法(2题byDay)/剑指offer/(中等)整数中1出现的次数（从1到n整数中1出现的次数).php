<?php


//方法一：暴力求解  遍历所有数  每个数进行取模统计O(n)复杂度 
function NumberOf1Between1AndN_Solution($n)
{
    // write code here
    $num = 0;
    for ($i=1; $i<=$n; $i++) {
        $num+= getNumberOfOne($i);
    }
    return $num;
}
function getNumberOfOne($number)
{
    $numCount = 0;
    while($number!=0) {
        if ($number % 10 == 1) {
            $numCount++;
        }
        $number = intval($number/10);
    }
    return $numCount;
}