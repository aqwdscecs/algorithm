<?php

// 给定一个整数数组  nums，求出数组从索引 i 到 j  (i ≤ j) 范围内元素的总和，包含 i,  j 两点。

// 示例：

// 给定 nums = [-2, 0, 3, -5, 2, -1]，求和函数为 sumRange()

// sumRange(0, 2) -> 1
// sumRange(2, 5) -> -1
// sumRange(0, 5) -> -3
// 说明:

// 你可以假设数组不可变。
// 会多次调用 sumRange 方法。


//dp[i]记录nums[0,i]的和
//在范围和中只需要dp[j]-dp[i]即可
//暴力解法时直接从i累加到j
//但如果多次范围和时时空复杂度为O(nm)  O(1)


//换种解题思路是：我们先找状态方程
//只有一种状态  dp[i] = d[i-1] + num[i]
class NumArray {
    /**
     * @param Integer[] $nums
     */
    
    public $dp = [];
    function __construct($nums) {
        $len = count($nums);
        if ($len <= 0) return 0;
        
        $dp[-1] = 0;
        for($i=0; $i<$len; $i++) {
            $this->dp[$i] = $this->dp[$i-1] + $nums[$i];
        }
        // print_r($this->dp);
        return $this->dp;
    }
  
    /**
     * @param Integer $i
     * @param Integer $j
     * @return Integer
     */
    function sumRange($i, $j) {
        //[0,j]不需要减dp[0]
        if ($i==0) return $this->dp[$j];
        return $this->dp[$j] - $this->dp[$i-1];
    }
}

/**
 * Your NumArray object will be instantiated and called as such:
 * $obj = NumArray($nums);
 * $ret_1 = $obj->sumRange($i, $j);
 */