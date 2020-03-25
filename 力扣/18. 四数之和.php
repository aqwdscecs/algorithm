<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    //执行用时 :320 ms, 在所有 PHP 提交中击败了35.59%的用户
    //内存消耗 :14.9 MB, 在所有 PHP 提交中击败了18.18%的用户
    function fourSum($nums, $target) {
        $amount = count($nums);
        //字典数组小于4 直接返回
        if (count($nums) < 4) return [];

        $retArr = [];
        //首先排序
        sort($nums);

        //第一个基数
        for ($firstIndex = 0; $firstIndex < $amount - 3; $firstIndex++) {
            //去重
            if ($firstIndex > 0 && $nums[$firstIndex] == $nums[$firstIndex-1]) {
                continue;
            }

            //第二个基数
            for ($secondIndex = $firstIndex+1; $secondIndex < $amount - 2; $secondIndex++) {
                //去重
                if ($secondIndex > $firstIndex+1 && 
                    $nums[$secondIndex] == $nums[$secondIndex-1]){
                    continue;
                }

                //thirdIndex(left)secondIndex(right)赋初始值
                $thirdIndex = $secondIndex+1;
                $fourthIndex = $amount - 1;
                $sumTopTwo = $nums[$firstIndex] + $nums[$secondIndex];

                //left right 查找
                while ($thirdIndex < $fourthIndex) {
                    $sumAll = $sumTopTwo + $nums[$thirdIndex] + $nums[$fourthIndex];
                    //四数之和判断
                    if ($sumAll == $target) {
                        $retArr[] = [
                            $nums[$firstIndex], $nums[$secondIndex],
                            $nums[$thirdIndex], $nums[$fourthIndex],
                        ];

                        while ($thirdIndex < $fourthIndex && $nums[$thirdIndex] == $nums[$thirdIndex+1]) $thirdIndex+=1;

                        while ($fourthIndex > $thirdIndex && $nums[$fourthIndex] == $nums[$fourthIndex-1]) $fourthIndex-=1;

                        $thirdIndex++;
                        $fourthIndex--;

                    } else if($sumAll < $target) {
                        //去重
                        while ($thirdIndex < $fourthIndex && 
                           $nums[$thirdIndex] == $nums[$thirdIndex+1]) 
                        $thirdIndex+=1; 

                        $thirdIndex ++;

                    } else {
                        //去重
                        while ($fourthIndex > $thirdIndex && $fourthIndex < $amount && 
                               $nums[$fourthIndex] == $nums[$fourthIndex-1])
                            $fourthIndex-=1;
                        
                        $fourthIndex--;
                    }

                }
            }
        }
        return $retArr;
    }
}

$test = new Solution();

$target = -9;
$nums = 
[-1,0,-5,-2,-2,-4,0,1,-2];
print_r($test->fourSum($nums, $target));