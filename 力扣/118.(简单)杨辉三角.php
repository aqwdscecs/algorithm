<?php

//给定一个非负整数 numRows，生成杨辉三角的前 numRows 行。

// 输入: 5
// 输出:
// [
//      [1],
//     [1,1],
//    [1,2,1],
//   [1,3,3,1],
//  [1,4,6,4,1]
// ]

//在杨辉三角中，每个数是它左上方和右上方的数的和。

class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        if ($numRows < 1) return array();

        $container[0][1] = 1;

        for($row=1; $row < $numRows; $row++) {
            $preRow = $container[$row-1];

            $container[$row][0] = 1;
            for($index=1; $index < $row; $index++) {
                $container[$row][$index] = $preRow[$index-1]+$preRow[$index];
            }
            $container[$row][$row] = 1;
        }
        return $container;
    }
}