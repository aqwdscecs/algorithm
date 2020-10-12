<?php

/*
数字 n 代表生成括号的对数，请你设计一个函数，用于能够生成所有可能的并且 有效的 括号组合。

 

示例：

输入：n = 3
输出：[
       "((()))",
       "(()())",
       "(())()",
       "()(())",
       "()()()"
     ]
通过次数187,724提交次数245,747

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/generate-parentheses
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


/*
	递归左右括号 生成二叉树  --  剪枝
*/

class Solution {

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        if ($n <= 0) return [];

        $result = []; 
        $leftTagCount = $rightTagCount = $n; #左右括号剩余个数

        $this->dfs('', $leftTagCount, $rightTagCount, $result);

        return $result;
    }

    function dfs($str, $leftTagCount, $rightTagCount, &$result)
    {
        if ($leftTagCount == $n && $rightTagCount == 0) {
            $result[] = $str;
            return;
        }

        #剪枝 ())
        if ($leftTagCount > $rightTagCount) {
            return;
        }

        if ($leftTagCount > 0) {
            $this->dfs($str.'(', $leftTagCount-1, $rightTagCount, $result);
        }

        if ($rightTagCount > 0) {
            $this->dfs($str.')', $leftTagCount, $rightTagCount-1, $result);
        }

    }
}