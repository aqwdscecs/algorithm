<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */

    //思路：Map数组  大小nums的大小 第一次循环设置其键值   第二次循环n次找第一个没有设置的键 并返回

    //题目要求O(n)时间复杂度  符合     但是空间复杂度为O(1)不符合 
    function firstMissingPositive($nums) {
        $count = count($nums);

        $arrMap = [];
        for($i=0; $i < $count; $i++) {
            $arrMap[$nums[$i]] = 1;
        }
        for ($i=1; $i <= $count; $i++) {
            if (!isset($arrMap[$i])) return $i;
        }
        return $count+1;
    }
}