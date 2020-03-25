<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */

    //思路：一共三个条件 
    // target 是否在[0,mid]   --> mid 是否属于旋转数组
    //                       --> mid 大于还是小于target
    //                       --> target是否在该区间中
    function search($nums, $target) {
        //类似折半查找

        $low = 0;
        $high = count($nums);
        if ($high <= $low) return -1;

        while ($low < $high) {
            $mid = $low + intval(($high - $low) / 2);
            echo "$mid" . "<br>";
            if ($nums[0] < $nums[$mid] && $target > $nums[0]) { // [0, mid]没有旋转元素 target在其区间中
                if ($target < $nums[$mid]) { // target在[0,mid]之间
                    $high = $mid-1;
                } else if ($target > $num[$mid]) {  
                    //target在[mid,high]之间
                    $low = $mid + 1;
                } else {  // target == num[$mid]
                    return $mid;
                }
                continue;
            } else { // $nums[0] > $nums[$mid]
                // [0,mid] 存在旋转元素
                if ($target < $nums[$mid]) { // target在[roteIndex, mid]之间 retoIndex旋转数组起点
                    $high = $mid -1;
                } else if ($target > num[$mid]) { //  
                    // target在[mid, high] 和 [0, mid]
                    //判断是否在旋转数组中 
                    if ($nums[$high] > $target) // 旋转数组最大值小于target 则target不在旋转数组中
                    {
                        $high = $mid - 1;
                    } else if ($nums[$high] < $target) {// 旋转数组最大值大于target 则target在旋转数组中
                        $low = $mid + 1;
                    } else { // nums[high] == target
                        return $mid;
                    }
                } else {
                    return $mid;
                }
                continue;
            }
        }
        return ($nums[$low] == $target) ? $low : -1; 
    }
}