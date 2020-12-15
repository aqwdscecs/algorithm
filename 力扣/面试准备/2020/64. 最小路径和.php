<?php


/*
给定一个包含非负整数的 m x n 网格 grid ，请找出一条从左上角到右下角的路径，使得路径上的数字总和为最小。

说明：每次只能向下或者向右移动一步
*/


/*
    动态规划生成局部最优  一直扩大到终点  即为最小路径和

    时空复杂度O(mn) O(mn)
*/

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $rowL = count($grid);
        if (!$rowL) return 0;  //特判
        $colL = count($grid[0]);
        if (!$colL) return 0;  //特判

        $dp[0][0] = $grid[0][0];   //起始点初始化
        for($i=1; $i<$rowL; $i++) {  //上边界dp初始化
            $dp[$i][0] = $dp[$i-1][0] + $grid[$i][0];
        }
        for($j=1; $j<$colL; $j++) { //左边界dp初始化
            $dp[0][$j] = $dp[0][$j-1] + $grid[0][$j];
        }

        for($i=1; $i<$rowL; $i++) {  //剩余坐标生成  取min(左,上)+cur  
            for($j=1; $j<$colL; $j++) {
                $dp[$i][$j] = min($dp[$i-1][$j], $dp[$i][$j-1]) + $grid[$i][$j];
            }
        }

        //右下角(即终点值为最小路径和)
        return $dp[$rowL-1][$colL-1];
    }
}