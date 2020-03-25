<?php


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $count = count($nums);
        
        $max = $res = PHP_INT_MIN;
        for ($i=0; $i<$count; $i++) {
            $max = max($max+$nums[$i], $nums[$i]);
            $res = max($res,$max);
        }
        return $res;
    }
}

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $count = count($nums);
        
        $dp = [];
        $dp[-1] = $max = PHP_INT_MIN;
        for ($i=0; $i<$count; $i++) {
            $dp[$i] = max($dp[$i-1]+$nums[$i], $nums[$i]);
            $max = max($max, $dp[$i]);
        }
        return $max;
    }
}