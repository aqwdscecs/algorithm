<?php

//题目描述
// 给你一个字符串 s 和一个字符规律 p，请你来实现一个支持 '.' 和 '*' 的正则表达式匹配。

// '.' 匹配任意单个字符
// '*' 匹配零个或多个前面的那一个元素
// 所谓匹配，是要涵盖 整个 字符串 s的，而不是部分字符串。

// 说明:

// s 可能为空，且只包含从 a-z 的小写字母。
// p 可能为空，且只包含从 a-z 的小写字母，以及字符 . 和 *。
// 示例 1:

// 输入:
// s = "aa"
// p = "a"
// 输出: false
// 解释: "a" 无法匹配 "aa" 整个字符串。
// 示例 2:

// 输入:
// s = "aa"
// p = "a*"
// 输出: true
// 解释: 因为 '*' 代表可以匹配零个或多个前面的那一个元素, 在这里前面的元素就是 'a'。因此，字符串 "aa" 可被视为 'a' 重复了一次。
// 示例 3:

// 输入:
// s = "ab"
// p = ".*"
// 输出: true
// 解释: ".*" 表示可匹配零个或多个（'*'）任意字符（'.'）。
// 示例 4:

// 输入:
// s = "aab"
// p = "c*a*b"
// 输出: true
// 解释: 因为 '*' 表示零个或多个，这里 'c' 为 0 个, 'a' 被重复一次。因此可以匹配字符串 "aab"。
// 示例 5:

// 输入:
// s = "mississippi"
// p = "mis*is*p*."
// 输出: false


class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p) {
      if (!$s && !$p) return true;
      if ($s  && !$p) return false;

      //后一位不是*
      if ($p[1] != '*') {
        //直接比较  符合继续递归 不符合直接返回false
        if ($s[0] == $p[0] || ($s && $p[0] == '.')) 
            return $this->isMatch(substr($s, 1), substr($p, 1));
        else
            return false;

      }else { 
        //相等 或者当前P为 .  那么有可能s后一位还和当前s相等 递归 (s[1],p)
        //                   s后一位和当前s不相等  递归(s,p)如果不相等直接进行下下次递归 (s,p[2])
        if ($s[0] == $p[0] || ($s && $p[0] == '.')) 
            return $this->isMatch($s, substr($p, 2)) ||
                   $this->isMatch(substr($s, 1), $p);
        else 
            return $this->isMatch($s,substr($p, 2));
      
      }
    }
}
$str1 = "aaaaaaaaaaaaab";
$str2 = "a*a*a*a*a*a*a*a*a*a*c";
$test = new Solution();

print($test->isMatch($str1,$str2));
// print($test->intToRoman(13));