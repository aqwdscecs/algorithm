<?php

//题目描述
//给定 n 个整数，找出平均数最大且长度为 k 的连续子数组，并输出该最大平均数。

// 示例 1:

// 输入: [1,12,-5,-6,50,3], k = 4
// 输出: 12.75
// 解释: 最大平均数 (12-5-6+50)/4 = 51/4 = 12.75
//  

// 注意:

// 1 <= k <= n <= 30,000。
// 所给数据范围 [-10,000，10,000]。


//即：在k的窗口范围内  找出最大和

//时空复杂度O(n) O(1)
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float
     */
    function findMaxAverage($nums, $k) {
        $len = count($nums);
        if ($len == 0) return null;
        if ($k <= 0 ) return null;

        $max = PHP_INT_MIN;
        $curSum = 0;
        //初始窗口
        for($i=0; $i<$k; $i++) {
            $curSum += $nums[$i];
        }
        //遍历元素
        $max = $curSum;
        for($j=$i; $j<$len; $j++) {
            $curSum += $nums[$j] - $nums[$j-$k];
            $max = max($curSum, $max);
        }

        return $max/$k;
    }
}