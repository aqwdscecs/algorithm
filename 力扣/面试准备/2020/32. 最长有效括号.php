<?php

/*

给定一个只包含 '(' 和 ')' 的字符串，找出最长的包含有效括号的子串的长度。

示例 1:

输入: "(()"
输出: 2
解释: 最长有效括号子串为 "()"
示例 2:

输入: ")()())"
输出: 4
解释: 最长有效括号子串为 "()()"
通过次数106,596提交次数314,022

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-valid-parentheses
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s) {
        $len = strlen($s);
        $hasMap = [];

        $curStrLen = $retStrLen = 0;

        for($i=0; $i<$len; $i++) {
            if ($s[$i] == '(') {
                $hasMap['('] += 1;
            } elseif ($s[$i] == ')') {
                if (!isset($hasMap['(']) || !$hasMap['(']) {
                    $retStrLen = max($retStrLen, $curStrLen);
                    $curStrLen = 0;
                } else {
                    $curStrLen += 2;
                    $hasMap['(']--;
                }
            }
        }

        return max($retStrLen, $curStrLen);
    }
}

