<?php

//给定字符串 s 和 t ，判断 s 是否为 t 的子序列。

// 你可以认为 s 和 t 中仅包含英文小写字母。字符串 t 可能会很长（长度 ~= 500,000），而 s 是个短字符串（长度 <=100）。

// 字符串的一个子序列是原始字符串删除一些（也可以不删除）字符而不改变剩余字符相对位置形成的新字符串。（例如，"ace"是"abcde"的一个子序列，而"aec"不是）。

// 示例 1:
// s = "abc", t = "ahbgdc"

// 返回 true.

// 示例 2:
// s = "axc", t = "ahbgdc"

// 返回 false.

// 后续挑战 :

// 如果有大量输入的 S，称作S1, S2, ... , Sk 其中 k >= 10亿，你需要依次检查它们是否为 T 的子序列。在这种情况下，你会怎样改变代码？


//不考虑后续挑战 直接暴力遍历
//时空复杂度O(len(t)) O(1)
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        //双指针
        $tlen = strlen($t);
        $slen = strlen($s);
        if ($slen == 0) return true;
        if ($tlen == 0) return false;

        $tIndex = $sIndex = 0;
        while($tIndex < $tlen && $sIndex < $slen) {
            if ($s[$sIndex] == $t[$tIndex]) {
                $sIndex++;
            }
            $tIndex++;
        }
        return $sIndex==$slen;
    }
}

//根据php数组底层查值复杂度也为O(1)
//遍历s  查找t中是否存在s[i]
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        $index = -1;
        for($i=0;$i<strlen($s);$i++){
            $index = strpos($t,$s[$i],$index+1);
            if($index === false) return false;
        }
        return true;
    }
}

