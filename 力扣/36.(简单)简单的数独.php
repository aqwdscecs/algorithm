<?php


class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */

     //设置三个数组，分别是行/列/3x3区域
     //每次每个值都会具有这三个属性， 插入之前判断当前这 三个数组中是否存在这个值的键
     //已存在直接返回失败，否则赋这个键值为1  继续向下走

    //执行用时 :52 ms, 在所有 PHP 提交中击败了13.16%的用户
    //内存消耗 :14.9 MB, 在所有 PHP 提交中击败了60.29%的用户
    function isValidSudoku($board) {
        $column =[];
        $row = [];
        $boxes = [];

        for($i=0; $i < 9; $i++) {
            for($j=0; $j < 9; $j++) {

                $curValue = $board[$i][$j];

                //当前符号值是'.'/空格直接跳过
                if ($curValue == '.') continue;

                //检查该列是否已存在相同值
                if ($column[$j][$curValue] == 1) return false;
                //将列数组下的第j列设置其 “值-->1”
                $column[$j][$curValue] = 1;

                
                //继续行的设置
                if ($row[$i][$curValue] == 1) return false;
                $row[$i][$curValue] = 1;

                //3x3区域检查
                $columnQuotien =  intval($j / 3);//列商
                
                $rowQuotien = intval($i / 3); //行商

                //是否已有值
                if ($boxes[$rowQuotien][$columnQuotien][$curValue] == 1) return false;
                $boxes[$rowQuotien][$columnQuotien][$curValue] = 1;
                
            }
        }
        return true;
    }
}