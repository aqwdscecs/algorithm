<?php


class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        
        $len = strlen($s);
        if ($len == 1 || !$len) return $s;
        $retStr = '';
        for ($i=0; $i < $len; $i++) {
            $this->getLongestStr($s, $i, $i,$retStr);
            $this->getLongestStr($s, $i, $i+1,$retStr);
        }
    return $retStr;
    }
    
    function getLongestStr($str, $start, $end, &$retStr)
    {
        $tempStr = '';
        while ($start >= 0 && $end < strlen($str) && $str[$end] == $str[$start]) {
            if ( ($end-$start+1) >  strlen($retStr)) $retStr = substr($str, $start, ($end-$start+1));
            $start--;
            $end++;
        }

    }
}