<?php

// 给定一个非负索引 k，其中 k ≤ 33，返回杨辉三角的第 k 行。

//通过题解 看到的
//代码真的六  本来O(n^2)的空间复杂度降低到O(n)
//编程之美
class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        $res = [];
        for ($i=0; $i<=$rowIndex; $i++) {
            array_push($res, 1);
            for ($j=$i-1; $j > 0; $j--) {
                $res[$j] += $res[$j-1];
            }
        }
        return $res;
    }
}