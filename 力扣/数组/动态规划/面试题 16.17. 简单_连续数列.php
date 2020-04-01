<?php

// 给定一个整数数组（有正数有负数），找出总和最大的连续数列，并返回总和。

// 示例：

// 输入： [-2,1,-3,4,-1,2,1,-5,4]
// 输出： 6
// 解释： 连续子数组 [4,-1,2,1] 的和最大，为 6。
// 进阶：

// 如果你已经实现复杂度为 O(n) 的解法，尝试使用更为精妙的分治法求解。


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $count = count($nums);
        
        $max = $res = PHP_INT_MIN;
        for ($i=0; $i<$count; $i++) {
            $max = max($max+$nums[$i], $nums[$i]);
            $res = max($res,$max);
        }
        return $res;
    }
}