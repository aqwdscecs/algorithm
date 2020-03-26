<?php


// 给定一个二进制数组， 计算其中最大连续1的个数。

// 示例 1:

// 输入: [1,1,0,1,1,1]
// 输出: 3
// 解释: 开头的两位和最后的三位都是连续1，所以最大连续1的个数是 3.
// 注意：

// 输入的数组只包含 0 和1。
// 输入数组的长度是正整数，且不超过 10,000。
    
//maxCount 存储最大出现次数
//count统计当前1出现次数
//用例[1] maxCount = 0  count = 1  所以返回return max(maxCount, count)
//时空复杂度O(n) O(1)
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxConsecutiveOnes($nums) {
        $maxCount = $count = 0;
        foreach($nums as $v) {
            if ($v == 1) $count++;
            else {
                $maxCount = max($count, $maxCount);
                $count = 0;                
            }
        }
        return max($maxCount,$count);
    }
}