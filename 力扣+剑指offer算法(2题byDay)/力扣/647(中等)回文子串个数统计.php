<?php

// 给定一个字符串，你的任务是计算这个字符串中有多少个回文子串。

// 具有不同开始位置或结束位置的子串，即使是由相同的字符组成，也会被计为是不同的子串。

// 示例 1:

// 输入: "abc"
// 输出: 3
// 解释: 三个回文子串: "a", "b", "c".
// 示例 2:

// 输入: "aaa"
// 输出: 6
// 说明: 6个回文子串: "a", "a", "a", "aa", "aa", "aaa".
// 注意:

// 输入的字符串长度不会超过1000。


class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    public $sum = 0;
    function countSubstrings($s) {
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            $this->countSub($s, $i, $i); //奇
            $this->countSub($s, $i, $i+1);//偶
        }
        return $this->sum;
    }
    function countSub($s, $start, $end)
    {
        while ($start >= 0 && $end < strlen($s) && $s[$start] == $s[$end]){
            $this->sum++;
            $start--;
            $end++;
        }
    }

}