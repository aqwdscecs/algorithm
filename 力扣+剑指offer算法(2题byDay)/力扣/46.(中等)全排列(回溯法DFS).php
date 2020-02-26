<?php


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $count = count($nums);
        if ($count <= 1) return array($nums);

        $retArr = [];
        $this->backtrack($count, $nums, $retArr, 0);
        return $retArr;
    }

    function backtrack($count, $nums, &$getArr, $first) {
        if ($first == $count) {
            $getArr[] = $nums;
            return $getArr;
        }

        for ($i=$first; $i < $count; $i++) {
            $this->swap($nums[$i], $nums[$first]);
            $this->backtrack($count, $nums, $getArr, $first+1);
            $this->swap($nums[$i], $nums[$first]);
        }

    }

    function swap(&$value1, &$value2) {
        $temp = $value1;
        $value1 = $value2;
        $value2 = $temp;
    }
    
}