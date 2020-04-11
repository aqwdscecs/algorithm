<?php

/*
题目描述：给定一副牌，每张牌上都写着一个整数。

此时，你需要选定一个数字 X，使我们可以将整副牌按下述规则分成 1 组或更多组：

每组都有 X 张牌。    组内所有的牌上都写着相同的整数。
仅当你可选的 X >= 2 时返回 true。

示例 1：
输入：[1,2,3,4,4,3,2,1]
输出：true
解释：可行的分组是 [1,1]，[2,2]，[3,3]，[4,4]

示例 2：
输入：[1,1,1,2,2,2,3,3]
输出：false
解释：没有满足要求的分组。

示例 3：
输入：[1]
输出：false
解释：没有满足要求的分组。

示例 4：
输入：[1,1]
输出：true
解释：可行的分组是 [1,1]

示例 5：
输入：[1,1,2,2,2,2]
输出：true
解释：可行的分组是 [1,1]，[2,2]，[2,2]

提示：
1 <= deck.length <= 10000
0 <= deck[i] < 10000

*/

/*思路：统计每个数字或者字符出现的次数   符合发牌分组的 情况 是他们之间的最大公约数 >=2*/
/* 即这个数组可以拆分成>=2 的个数的子数组  并且每个数组内数字相同*/

/*1.统计次数  2.计算当前最大公约数  3.返回当前公约数是否>=2*/
/*时空复杂度O(n+clogb) O(c)  c是字符类别个数*/ 
class Solution {

    /**
     * @param Integer[] $deck
     * @return Boolean
     */
    function hasGroupsSizeX($deck) {
        $len = count($deck);

        $map = [];
        foreach ($deck as $val) {
            $map[$val] = isset($map[$val])? ++$map[$val] : 1;
        } 
        $g = array_shift($map);
        foreach($map as $k => $v) {
            $g = $this->gcd($g, $v);
            if ($g==1) return false;
        }
        return $g >= 2;
    }

    /*核心  计算当前最大公约数*/
    function gcd($a, $b) {
        return $b==0 ? $a : $this->gcd($b, $a%$b);
    }
}