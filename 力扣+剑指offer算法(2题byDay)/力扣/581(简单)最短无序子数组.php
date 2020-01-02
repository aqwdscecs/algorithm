<?php 
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findUnsortedSubarray($nums) {
        $len = count($nums);
        if ($len < 2) return 0;

        $max = $low = 0;
        $min = $high = $len - 1;

        while ($nums[$low] >= $max && $low < $len) {
            $max = $nums[$low];
            $low++;  //2  
        }
        
        while ($nums[$high] < $min &&  $low < $high) {
            $min = $nums[$high];
            $high--;
        }
        if ($high <= $len) return 0;
        return $high - $low +1;
    }
}