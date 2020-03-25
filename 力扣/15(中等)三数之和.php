<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {

        $ret = [];
        $count = count($nums);

        if ($count < 3) return $ret;

        //先进行排序
        sort($nums);

        for ($index = 0; $index < $count-2; $index++) {
            //最小值大于0 直接跳过
            if ($nums[$index] > 0) continue;
            //所求数和上个数字相同跳过
            if ($index > 0 && $nums[$index] == $nums[$index-1]) continue;

            $left = $index+1;
            $right = $count-1;
            while ($left < $right) {
                $sum = $nums[$left] + $nums[$right] + $nums[$index];
                
                if ($sum == 0) {
                    $ret[] = [$nums[$index], 
                              $nums[$left], 
                              $nums[$right] ];
                    //去重
                    while ($left  < $len-1 && $nums[$left+1] == $nums[$left]) $left++;
                    while ($right > 0    && $nums[$right-1] == $nums[$right]) $right--;
                    echo "left->$left right->$right ";
                    $left++;
                    $right--;
                }else if ($sum < 0) {
                    $left++;
                } else {
                    $right--;
                }
            }
        }
        return $ret;

    }
}

$test = new Solution();
$nums = [0,0,0];
print_r($test->threeSum($nums));