<?php


// 实现 strStr() 函数。

// 给定一个 haystack 字符串和一个 needle 字符串，在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。如果不存在，则返回  -1。

// 示例 1:
// 输入: haystack = "hello", needle = "ll"
// 输出: 2

// 示例 2:
// 输入: haystack = "aaaaa", needle = "bba"
// 输出: -1

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/implement-strstr
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    //思想：最先想到的是先原字符串中遍历找到和查找字符串第一个字符相等的
    //     找到匹配的后在进入循环遍历查找字符串，有不相等的即退出循环

    //执行用时 :8 ms, 在所有 PHP 提交中击败了80.25%的用户
	//内存消耗 :15.1 MB, 在所有 PHP 提交中击败了41.24%的用户
    function strStr($haystack, $needle) {
        $needleLen = strlen($needle);
        if (!$needleLen) return 0;

        $haystackLen = strlen($haystack);
        if (!$haystackLen) return -1;

        for ($hayIndex = 0; $hayIndex < $haystackLen; $hayIndex++) {

            if (($haystackLen-$hayIndex) < $needleLen) return -1;
            
            if ($haystack[$hayIndex] == $needle[0]) {
                $needleIndex = 1;

                while (($hayIndex+$needleIndex) < $haystackLen && $needleIndex < $needleLen) {

                    if ($haystack[$hayIndex+$needleIndex] != $needle[$needleIndex]) {
                        break;
                    }
                    $needleIndex++;
                }
                if ($needleIndex == $needleLen) return $hayIndex;
            }
        }
        return -1;
    }
}