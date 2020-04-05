<?php

//题目描述：给定一个非空且只包含非负数的整数数组 nums, 数组的度的定义是指数组里任一元素出现频数的最大值。

// 你的任务是找到与 nums 拥有相同大小的度的最短连续子数组，返回其长度。

// 示例 1:

// 输入: [1, 2, 2, 3, 1]
// 输出: 2
// 解释: 
// 输入数组的度是2，因为元素1和2的出现频数最大，均为2.
// 连续子数组里面拥有相同度的有如下所示:
// [1, 2, 2, 3, 1], [1, 2, 2, 3], [2, 2, 3, 1], [1, 2, 2], [2, 2, 3], [2, 2]
// 最短连续子数组[2, 2]的长度为2，所以返回2.
// 示例 2:

// 输入: [1,2,2,3,1,4,2]
// 输出: 6
// 注意:

// nums.length 在1到50,000区间范围内。
// nums[i] 是一个在0到49,999范围内的整数。


//三个哈希  记录对应左边界 右边界  出现次数 
// 遍历一次count得出最大值
// 找出现次数为count最大值得 左右边界最短的长度返回
//时空复杂度O(3n)=O(n)  O(3n)=O(n)
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findShortestSubArray($nums) {
        $left = $right = $count = [];

        //赋值左右边界 以及出现次数
        for($i=0; $i<count($nums); $i++) {
            $count[$nums[$i]] += 1;
            if (isset($left[$nums[$i]]))
                $right[$nums[$i]] = $i;
            else $left[$nums[$i]] = $i;
        }

        //找出最大出现次数
        $max = 0;
        foreach ($count as $num => $numCount) {            
            $max = max($numCount, $max);
        }
        //特判 如果度都为1 那么直接返回1
        if ($max == 1) return 1;
    
        //对应出现次数最大的 最短的长度        
        $ans = PHP_INT_MAX;
        foreach ($count as $num => $numCount) {
            if ($numCount == $max) {
                $ans = min($ans, $right[$num]-$left[$num]+1);
            }
        }
        return $ans;
    }
}