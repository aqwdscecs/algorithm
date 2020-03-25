<?php

//数组实现(类似于动态规划)

//思路：只要前面和小于0 那么前面的数的和可以去掉 并把当前向量和赋给当前元素值
//     也就是比较前面的向量和加当前元素向量和  与  当前向量 比较  哪个大赋给哪个
//     还有一个记录当前所有向量的最大和 变量  如果上面和大于当前记录的最大和 那么更新 否则不更新 直到有更大和向量才更新
function FindGreatestSumOfSubArray($array)
{
    // write code here
    $count = count($array);
    if ($count <= 0) return null;
    
    $curSum = $array[0];
    $greateSum = $array[0];
    
    for($i=1; $i<$count; $i++) {
        if ($curSum <= 0) {
            $curSum = $array[$i];
        }else {
            $curSum += $array[$i];
        }
        
        if ($greateSum < $curSum) {
            $greateSum = $curSum;
        }
    }
    return $greateSum;
}


//dp动态规划
function FindGreatestSumOfSubArray($array)
{
    // write code here
    $max = $array[0];
    $res = $array[0];
    
    for ($i=1; $i< count($array); $i++) {
        $max = max($max+$array[$i], $array[$i]);
        $res = max($max, $res);
    }
    return $res;
}