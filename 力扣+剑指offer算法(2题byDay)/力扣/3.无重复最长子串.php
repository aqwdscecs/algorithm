<?php


class Solution {

    /**
     * @param String $s
     * @return Integer
     */
     //滑动窗口
    function lengthOfLongestSubstring($s) {
        $len = strlen($s);
        if ($len == 1 || !$len) return $len;

        $left = $right = 0;
        $dict = [];
        $maxLen = 0;

        while ($l < $len) {
        	if ($r < $len && $dict[$s[$r]] == 0) {
        		$dict[$s[$r]] = 1;
        		$r++;
        	}else {
        		$maxLen = ($maxLen > ($r - $l)) ? $maxLen : ($r - $l);
        		$dict[$s[$l]] = 0;
        		$l++;
        	}
        }
        return $maxLen;
    }
}