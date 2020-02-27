<?php

//题目描述
//统计一个数字在排序数组中出现的次数。

//普通(暴力)解法
//通过二分查找到其中下标，分别两个循环向其两边扩散查找统计

//时间复杂度O(longN+m) 空间复杂度O(1)
function GetNumberOfK($data, $k)
{
    // write code here
    $count = count($data);
    if ($count <= 0) return 0;
    
    $index = binaryFind($data,0,$count-1, $k);
    if ($index == -1) return 0;
    $countNumber = 1;
    for($i=$index-1; $i>=0; $i--) {
        if ($data[$i] != $k) break;
        $countNumber++;
    }
    for($i=$index+1; $i<$count; $i++) {
        if ($data[$i] != $k) break;
        $countNumber++;
    }
    return $countNumber;
}
function binaryFind($arr, $left, $right, $target)
{
    $count = count($arr);
    while ($left <= $right) {
        $mid = $left + intval(($right-$left)/2);
        if ($arr[$mid] > $target) $right = $mid - 1;
        else if ($arr[$mid] < $target) $left = $mid + 1;
        else return $mid;
    }
    return -1;
}

//思路二：通过二分查找到target的中间位  向两端继续二分搜索边界
//时间复杂度O(3logN) 空间复杂度O(1)

//思路二试了半天 代码没有实现。。。
//通过参考，发现数组全是整数，可以找k+0.5的插入点 - k-0.5的插入点  差值就是k的个数
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