<?php

// 给定一个已按照升序排列 的有序数组，找到两个数使得它们相加之和等于目标数。

// 函数应该返回这两个下标值 index1 和 index2，其中 index1 必须小于 index2。

// 说明:

// 返回的下标值（index1 和 index2）不是从零开始的。
// 你可以假设每个输入只对应唯一的答案，而且你不可以重复使用相同的元素。
// 示例:

// 输入: numbers = [2, 7, 11, 15], target = 9
// 输出: [1,2]
// 解释: 2 与 7 之和等于目标数 9 。因此 index1 = 1, index2 = 2 。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/two-sum-ii-input-array-is-sorted
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


//双指针  记录左操作数  右操作数 
//它两之和大于target 右操作数向左走 减小其和
//它两之和小于target 做操作数向右走 增大其和

//时空复杂度O(n)  O(1)

//和类似盛水最多的容器 思想相同
class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $count = count($numbers);
        if ($count == 0) return -1;

        $left = 0;
        $right = $count-1;
        
        while ($left < $right) {
            if ( ($numbers[$left] + $numbers[$right]) < $target) {
                $left++;
            } else if (($numbers[$left]+$numbers[$right]) == $target) {
                return [$left+1,$right+1];
            } else {
                $right--;
            }
        }
        return -1;
    }
}