<?php

//题目描述
//给定一个整数数组和一个整数 k, 你需要在数组里找到不同的 k-diff 数对。这里将 k-diff 数对定义为一个整数对 (i, j), 其中 i 和 j 都是数组中的数字，且两数之差的绝对值是 k.

// 示例 1:

// 输入: [3, 1, 4, 1, 5], k = 2
// 输出: 2
// 解释: 数组中有两个 2-diff 数对, (1, 3) 和 (3, 5)。
// 尽管数组中有两个1，但我们只应返回不同的数对的数量。
// 示例 2:

// 输入:[1, 2, 3, 4, 5], k = 1
// 输出: 4
// 解释: 数组中有四个 1-diff 数对, (1, 2), (2, 3), (3, 4) 和 (4, 5)。
// 示例 3:

// 输入: [1, 3, 1, 5, 4], k = 0
// 输出: 1
// 解释: 数组中只有一个 0-diff 数对，(1, 1)。
// 注意:

// 数对 (i, j) 和数对 (j, i) 被算作同一数对。
// 数组的长度不超过10,000。
// 所有输入的整数的范围在 [-1e7, 1e7]。

//用两个哈希存储 对应符合的数 以及 访问过的数
//k-diff 存在 n+i = k    n-i = k 
//对于两个不同的对数  我们只需要存储不同数即可  即  i  和  n
//例如  1 4  k=3  有nums[i]=1时 1+3 = 4   nums[i]=4时 4-3 = 1  
//                这两个只能算做一组   我们取1+3 的nums[i]
//                                       取4-3=1的num[i]-k 这样便避免了重复计算 
//时空复杂度O(n) O(n)
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findPairs($nums, $k) {
        if ($k < 0) return 0;

        $getPassed = $fitable = [];

        for($i=0; $i<count($nums); $i++) {
            if (isset($getPassed[$nums[$i]-$k]))
                $fitable[$nums[$i]] = 1;
            if (isset($getPassed[$k+$nums[$i]]))
                $fitable[$nums[$i]+$k] = 1;

            $getPassed[$nums[$i]] = 1;
        }
        return count($fitable);
    }
}