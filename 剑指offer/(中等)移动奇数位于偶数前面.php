<?php

//新建数组
//时间复杂度O(2n) 空间复杂度O(n)
function reOrderArray($array)
{
    // write code here
    $arr = [];
    for ($index=0; $index < count($array); $index++) {
        if ($array[$index]%2 == 1) $arr[] = $array[$index];
    }
    for ($index=0; $index < count($array); $index++) {
        if ($array[$index]%2 == 0) $arr[] = $array[$index];
    }
    
    return $arr;
}

//php风格
function reOrderArray($array)
{
    // write code here
    $arr = [];
    $len = count($array);
    
    for($index=0;$index<$len;$index++){
        if ($array[$index] & 1) {
            $arr[] = $array[$index];
            unset($array[$index]);
        }
     } 
    
    return array_merge($arr, $array);
}


//插入排序思想
//时间复杂度O(n^2) 空间复杂度O(1)
function reOrderArray($array)
{
    // write code here
    //插入排序思想
    $len = count($array);
    
    //奇数移动统计
    $oddCount = 0;
    
    //从头开始寻找奇数
    for ($index = 0; $index < $len; $index++) {
        //找到奇数
        if ($array[$index] % 2 == 1) {
            $oddIndex = $index;
            //奇数之间位置不变， 保证之前移动到前面的奇数不受影响
            //和插入排序的前面排好数组不变类似
            while ($oddIndex > $oddCount) {
                $temp = $array[$oddIndex];
                $array[$oddIndex]   = $array[$oddIndex-1];
                $array[$oddIndex-1] = $temp;
                
                $oddIndex--;
            }
            //奇数移动统计+1
            $oddCount++;
        }
    }
    return $array;
}

