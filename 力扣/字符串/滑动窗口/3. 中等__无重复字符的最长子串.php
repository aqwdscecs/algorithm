<?php

/*
给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。

示例 1:

输入: "abcabcbb"
输出: 3 
解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
示例 2:

输入: "bbbbb"
输出: 1
解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
示例 3:

输入: "pwwkew"
输出: 3
解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
     请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-substring-without-repeating-characters
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

/*
暴力O(n^2)求解 很简单, 但是效率上肯定不允许   
力扣刷题保证时间复杂度小于O(n^2)
*/


/*
滑动窗口 - 解决查找字符串中的子串问题

hashMap记录之前出现的字符  如果后面插入字符串已出现在当前hashMap中 更新start 为目前hashMap[s[i]]+1 

更新对应hashMap[s[i]]的位置为当前插入的位置 

其中注意如果start已经大于当前已存在的hashMap[s[i]]时 滑动窗口不需要收缩 

最大子串长度 = max(maxLen, i - start + 1)
*/
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $len = strlen($s);
        if (!$len) return 0;

        $hashMap = [];

        $start = $maxLen = 0;
        for($i=0; $i<$len; $i++) {
            if (isset($hashMap[$s[$i]]) && $start <= $hashMap[$s[$i]]) {
                $start = $hashMap[$s[$i]]+1;
            }
            $hashMap[$s[$i]] = $i;

            $maxLen = max($maxLen, $i-$start+1);
        }

        return $maxLen;
    }
}