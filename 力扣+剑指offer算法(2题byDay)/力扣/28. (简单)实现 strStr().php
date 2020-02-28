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


//kmp算法
//时间复杂度O(m+n) 空间复杂度O(n)
<?php

class KMP {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function setPrefixTable($needle)
    {
        $len = strlen($needle);
        //首先设置第一位的公共前缀位为0
        $prefix[0] = 0;

        $behindIndex = 0;
        //设置公共前缀为指针从1开始
        $index = 1;
        //循环设置1以及后面的前缀位
        while ($index < $len) {
            if ($needle[$behindIndex] == $needle[$index]) {
                $behindIndex ++;
                $prefix[$index] = $behindIndex;
                $index++;
            } else {
                if ($behindIndex <= 0) {
                    $prefix[$index] = $behindIndex;
                    $index++;
                } else {
                    $behindIndex = $prefix[$behindIndex-1];
                }
            }
        }
        return $prefix;
    }
    function strStr($haystack, $needle) {
        $patLen    = strlen($haystack);
        $needleLen = strlen($needle);
        
        //需要查找的长度为空的情况
        if (!$needleLen) return $needleLen;
        //patLen长度小于needle长度
        if ($patLen < $needleLen) return -1;
        //首先设置前缀记录表   
        $prefix = $this->setPrefixTable($needle);
        //pattern和needle串下标指针
        $patIndex = $needleIndex = 0;

        //遍历pattern查找
        while($patIndex < $patLen) {
            //当找到needle最后一位 并且和当前pattern对应位置字符相同
            if (  ($needleLen-1) == $needleIndex 
                &&($needle[$needleIndex] == $haystack[$patIndex])
                ) {
                    return $patIndex - $needleIndex;
                }
            
            //当前needle和pattern串字符相同
            if ( $needle[$needleIndex] == $haystack[$patIndex]) {
                $patIndex ++;
                $needleIndex++;
            } else {
                //不存在前缀 则pattern向下一位重新从pattern 的0位比较
                if ($needleIndex <= 0) {
                    $patIndex++;
                } else {
                    //如果不相同，needle找前缀位置 回退
                    $needleIndex = $prefix[$needleIndex-1];
                }
            }
        }
        return -1;
    }
}