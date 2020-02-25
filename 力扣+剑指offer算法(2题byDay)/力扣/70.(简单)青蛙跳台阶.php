<?php



class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    //DP算法
    //时间复杂度O(n) 空间复杂度O(n)
    function climbStairs($n) {
        if ($n <= 2) return $n;

        $dp[0] = 1;
        $dp[1] = 2;

        for ($i=2; $i < $n; $i++) {
            $dp[$i] = $dp[$i-1] + $dp[$i-2];
        }
        return $dp[$n-1];
    }

    //循环计算
    //时间复杂段O(n) 空间复杂度O(1)
    function climbStairs($n) {
        if ($n <= 2) return $n;

        $first = 1;
        $second = 2;

        while($n > 2) {
            $sum = $second + $first;
            $first = $second;
            $second = $sum;

            $n--;
        }
        return $sum;
    }

    //其他还可以用数学归纳 得出公式计算
}