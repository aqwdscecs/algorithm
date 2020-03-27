<?php


//题目描述
// 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。

// 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。

// 示例:

// 给定 nums = [2, 7, 11, 15], target = 9

// 因为 nums[0] + nums[1] = 2 + 7 = 9
// 所以返回 [0, 1]

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/two-sum
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

//一次哈希
//map键存储target-nums[i] 值存储对应索引下标
//如果当前元素的target-nums[i]存在 且 值和当前索引值不等  则返回
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