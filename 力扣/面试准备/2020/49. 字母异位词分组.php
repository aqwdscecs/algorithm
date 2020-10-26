<?php

/*
给定一个字符串数组，将字母异位词组合在一起。字母异位词指字母相同，但排列不同的字符串。

示例:

输入: ["eat", "tea", "tan", "ate", "nat", "bat"]
输出:
[
  ["ate","eat","tea"],
  ["nat","tan"],
  ["bat"]
]
说明：

所有输入均为小写字母。
不考虑答案输出的顺序。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/group-anagrams
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


/*解题思路: 遍历 排序当前字符串  原字符串放入排序后的 hashMap中
	时间复杂度O(NKlogN) 空间复杂度O(NK)
*/


class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $len = count($strs);
        if (!$len) return [];

        $ret = $hashMap = [];
        for ($i = 0; $i < $len; $i++) {
            $tmp = $strs[$i];
            $arr = str_split($tmp);
            asort($arr);
            $imp=implode('',$arr);
            $hashMap[$imp][] = $tmp;
        }
        $hashMap = array_values($hashMap);

        return $hashMap;
    }
}