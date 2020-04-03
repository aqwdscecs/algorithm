<?php

//题目描述：给定一个整型数组，在数组中找出由三个数组成的最大乘积，并输出这个乘积。

// 示例 1:

// 输入: [1,2,3]
// 输出: 6
// 示例 2:

// 输入: [1,2,3,4]
// 输出: 24
// 注意:

// 给定的整型数组长度范围是[3,104]，数组中所有的元素范围是[-1000, 1000]。
// 输入的数组中任意三个数的乘积不会超出32位有符号整数的范围

//三种情况  全为正  全为负   全为负除了最大值为正
//全为正  sort之后 最后三个 即max
//全为负  sort之后 最后三个 即max
//除了最大值全为负  sort之后  num[0]*num[1]*nums[len-1]即max

//所以排好序之后 我们只需要 去上面两种情况即的max即可
//时空复杂度O(nlogn)  O(n) php sort用的快排
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumProduct($nums) {
        sort($nums);
        $len = count($nums);
        $preTwoIndexProduct = $nums[0]*$nums[1];
        return max($preTwoIndexProduct*$nums[$len-1],  $nums[$len-3]*$nums[$len-2]*$nums[$len-1]);
       
    }
}