<?php


class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    //php偷懒做法  
    //执行用时 :32 ms,   在所有 PHP 提交中击败了92.86%的用户
    //内存消耗 :15.6 MB, 在所有 PHP 提交中击败了5.12%的用户
    function findMedianSortedArrays($nums1, $nums2) {
        $mergeNums = array_merge($nums1,$nums2);   

        sort($mergeNums);
        $count = count($mergeNums);
        if ( ( ($count-1) % 2 ) != 0)
        	return ($mergeNums[intval(($count-1)/2)] + $mergeNums[intval(($count-1)/2)+1]) / 2;
        return $mergeNums[($count-1)/2];
    }
    
}