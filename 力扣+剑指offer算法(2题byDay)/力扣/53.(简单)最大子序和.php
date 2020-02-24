<?php


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $count = count($nums);

        $curSum = $retMaxNum = $nums[0];

        for($i=1; $i<$count; $i++) {
            $curSum = max($curSum+$nums[$i], $nums[$i]);
            $retMaxNum = max($retMaxNum, $curSum);
        }
        return $retMaxNum;
    }
}
