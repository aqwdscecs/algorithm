<?php

// 给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。

// 如果你最多只允许完成一笔交易（即买入和卖出一支股票一次），设计一个算法来计算你所能获取的最大利润。

// 注意：你不能在买入股票前卖出股票。


// 示例 1:

// 输入: [7,1,5,3,6,4]
// 输出: 5
// 解释: 在第 2 天（股票价格 = 1）的时候买入，在第 5 天（股票价格 = 6）的时候卖出，最大利润 = 6-1 = 5 。
//      注意利润不能是 7-1 = 6, 因为卖出价格需要大于买入价格。
// 示例 2:

// 输入: [7,6,4,3,1]
// 输出: 0
// 解释: 在这种情况下, 没有交易完成, 所以最大利润为 0。


//初始想法(暴力解法)
//遍历每天的股票价格， 在此之前的股票的最大收入计算， 找出最大值存入max值
//依次计算  直到遍历结束， max即为最大值
//时间复杂度O(n^2) 空间复杂度O(n)(空间复杂度也可以降到O(1)但关键是降低时间复杂度)
//用例通过不了~ 当为单调递减 10000~0时
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $arr = [];
        $len = count($prices);

        $max = 0;
        for($i=0; $i < $len; $i++) {
            for ($j=0; $j <= $i; $j++) {
                $arr[$j] = $prices[$i] - $prices[$j];
                $max = max($max, $arr[$j]);
            }
        }
        return $max>0 ? $max : 0;            
    }
}


//我们从计算中发现，我们只需要将第1天到当前天数最大值和最小值进行记录
//每次我们只需要将当前股票价格-min(之前天数中最小买入价状态记录)
//而max则是记录这些天中出现利润最大的值就ok
//最后返回max即可  
//避免了前面天数重复计算(因为不是最小值，必定利润达不到最大)

//这样 时间复杂度降低到了O(n) 空间复杂度降低到了O(1)
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $len = count($prices);
        if ($len <= 0) return 0;

        $arr = [];
        $max = 0; $min = $prices[0];

        for($i=1; $i < $len; $i++) {
            $max = max($max, $prices[$i] - $min);
            $min = min($min, $prices[$i]);
        }
        return $max;            
    }
}


