<?php

// 一个长度为n-1的递增排序数组中的所有数字都是唯一的，并且每个数字都在范围0～n-1之内。在范围0～n-1内的n个数字中有且只有一个数字不在该数组中，请找出这个数字。

//  

// 示例 1:

// 输入: [0,1,3]
// 输出: 2
// 示例 2:

// 输入: [0,1,2,3,4,5,6,7,9]
// 输出: 8


/*
初始看到有序  想着采用二分法  每次找到中间的数 如果大于当前下标 则缺失的数字就在左侧
										   如果等于当前下标 则缺失的数字就在右侧(不存在小于的情况)
但是通过前n项想着更简单，结果各种情况判断 导致特殊case没有做出来  而且前n项和必须要遍历当前数组 复杂度为O(n) 相比最简单的遍历没有更优 所以放弃了
*/

/*
	最简单的复杂度O(n)遍历
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) {
        for($i=0; $i<count($nums); $i++) {
            if ($i != $nums[$i]) return $i;
        }
        
        return count($nums);
    }
}

/*
	二分查找 缺失数组 时间复杂度O(logn)
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) {
        $cnt = count($nums);
        $left = 0; $right = $cnt - 1;

        while ($left < $right) {
            $mid = intval(($right+$left) / 2);
            if ($mid < $nums[$mid]) { //缺失数字在左侧
                $right = $mid-1;
            } else {
                $left = $mid+1;
            }
        }
        
        if ($nums[$left] == $left) return $left+1;

        return $left;
    }
}