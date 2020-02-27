<?php

function binaryFind($arr, $left, $right, $target)
{
    if ($left > $right) return $left;
    $mid = $left + intval(($right - $left)/2);
    
    if ($arr[$mid] > $target) return binaryFind($arr, $left, $mid-1, $target); 

    else if ($arr[$mid] == $target) return $mid;
    return binaryFind($arr, $mid+1, $right, $target);
}   



//类似变形还有：查找有序整型数组中某个值的个数
//题目来源：《剑指offer》

//可以找k+0.5的插入点 - k-0.5的插入点  差值就是k的个数
//时间复杂度O(2logN) 空间复杂度O(2logN)

function GetNumberOfK($data, $k) 
{
    // write code here
    $count = count($data);
    if ($count<=0) return 0;
    
    return binaryFind($data,0, $count-1, $k+0.5)  
           - binaryFind($data, 0, $count-1, $k-0.5);
}

function binaryFind($arr, $left, $right, $target)
{
    if ($left > $right) return $left;
    $mid = $left + intval(($right - $left)/2);
    
    if ($arr[$mid] > $target) return binaryFind($arr, $left, $mid-1, $target); 
    
    return binaryFind($arr, $mid+1, $right, $target);
}   