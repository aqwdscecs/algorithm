<?php


//题目描述：数组nums包含从0到n的所有整数，但其中缺了一个。请编写代码找出那个缺失的整数。你有办法在O(n)时间内完成吗？

// 注意：本题相对书上原题稍作改动

// 示例 1：

// 输入：[3,0,1]
// 输出：2
//  

// 示例 2：

// 输入：[9,6,4,2,3,5,7,0,1]
// 输出：8

//res = res^x^x    一个数异或一个任意数两次  结果还是等于它本身
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) {
        $res = 0;
        for($i=0; $i<count($nums); $i++) {
            $res ^= $i;
            $res ^= $nums[$i];
        }
        $res ^= count($nums);
        return $res;
    }
}

//解法二、 前n项和 S = (n+1)*n / 2 
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums) {
        $len = count($nums);

        $sum = $len * ($len+1) / 2;
        for($i=0; $i<$len; $i++) {
            $sum -= $nums[$i];
        }
        return $sum;
    }
}