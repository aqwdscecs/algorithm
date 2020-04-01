<?php

// 给定两个排序后的数组 A 和 B，其中 A 的末端有足够的缓冲空间容纳 B。 编写一个方法，将 B 合并入 A 并排序。

// 初始化 A 和 B 的元素数量分别为 m 和 n。

// 示例:

// 输入:
// A = [1,2,3,0,0,0], m = 3
// B = [2,5,6],       n = 3

// 输出: [1,2,2,3,5,6]
// 说明:

// A.length == n + m


class Solution {

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    function merge(&$A, $m, $B, $n) {
        $indexA = $m-1;
        $indexB = $n-1;
        for($i=$m+$n; $i>0; $i--){
            if($indexB < 0) break;
            if($A[$indexA] > $B[$indexB]) $A[$i-1] = $A[$indexA--];
            else $A[$i-1] = $B[$indexB--];

        }
        return $A;
    }
}