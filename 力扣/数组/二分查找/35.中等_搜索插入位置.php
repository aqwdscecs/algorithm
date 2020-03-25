<?php

// 给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。

// 你可以假设数组中无重复元素。

// 示例 1:

// 输入: [1,3,5,6], 5
// 输出: 2
// 示例 2:

// 输入: [1,3,5,6], 2
// 输出: 1
// 示例 3:

// 输入: [1,3,5,6], 7
// 输出: 4
// 示例 4:

// 输入: [1,3,5,6], 0
// 输出: 0

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/search-insert-position
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        $len = count($nums);

        if(!$len) return 0;

        //特判
        if ($nums[$len-1] < $target) return $len;
        if ($nums[0] >= $target) return 0;
        
        $left  = 0; 
        $right = $len-1;
        while ($left < $right) {
            $mid = intval($left + ($right-$left)/2);
            //mid小于taget则[left, mid]不需要考虑双闭区间
            //无论插入或者寻值
            if ($nums[$mid] < $target) $left = $mid+1;
            else if ($nums[$mid] == $target) return $mid;
            //下面的条件为mid > target
            //缩小区间不能去掉mid  因为mid有可能为其插入位
            //所以过滤的区间为(mid, right] 左闭右开区间
            else $right = $mid;
        }
        return $left;
    }
}