<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $len = count($nums);

        $newArr = [];
        $retArr = [];

        for ($i=0; $i < $len; $i++) {
            //先判断前面是否有元素可以和当前元素组成target
            if (isset($newArr[$target - $nums[$i]])  && $newArr[$target-$nums[$i]] != $i) {
                $retArr = [
                    $newArr[$target-$nums[$i]], 
                    $i
                ];    
                return $retArr;
            }
            //当前还没有可以组成的话 放入新数组 value => index
            $newArr[$nums[$i]] = $i;
        
        //之前是先将元素放入新数组   这有可能是[3,3] 第二个数字进来会覆盖上面的index=0的内容
        //所以 newArr[$target-$nums[$i]] != $i 不成立  
        //这里顺序需要注意
        }
        
        return $retArr;
    }
}