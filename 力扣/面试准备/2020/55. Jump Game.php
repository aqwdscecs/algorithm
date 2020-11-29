<?php

/*
describe:

Given an array of non-negative integers, you are initially positioned at the first index of the array.

Each element in the array represents your maximum jump length at that position.

Determine if you are able to reach the last index.

 

Example 1:

Input: nums = [2,3,1,1,4]
Output: true
Explanation: Jump 1 step from index 0 to 1, then 3 steps to the last index.
Example 2:

Input: nums = [3,2,1,0,4]
Output: false
Explanation: You will always arrive at index 3 no matter what. Its maximum jump length is 0, which makes it impossible to reach the last index.
 

Constraints:

1 <= nums.length <= 3 * 10^4
0 <= nums[i][j] <= 10^5

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/jump-game
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


/*
思路1: 递归+剪枝 （时空复杂度较高 自己方法）

*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $hashMap = [];
        return $this->nextStep($nums, 0, $hashMap);
    }

    function nextStep(&$nums, $curIndex, &$hashMap) {
        if ($curIndex == count($nums)-1) return true;
        
        if (isset($hashMap[$curIndex]) && !$hashMap[$curIndex]) {
            return false;
        }

        if (!$nums[$curIndex]) {
            $hashMap[$curIndex] = 0;
            return false;    
        }

        for($i=1; $i <= $nums[$curIndex]; $i++) {
            if ($this->nextStep($nums, $curIndex+$i, $hashMap)) {
                return true;
            }
            var_dump($hashMap);exit;
            $hashMap[$curIndex+$i] = 0;
        }
        return false;
    }
}


/*
思路二（题解）： 迭代遍历 时空复杂度(O(n))
        大体意思： 从前向后遍历  选取当前值或者前面值进行下面跳跃消耗   当当前值为0 并且前面值也为0  那么下面无法跳跃消耗 即无法到达终点
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $cur = 0;

        for($i=0; $i < count($nums)-1; $i++) {
            $cur--;
            $cur = max($nums[$i], $cur);
            
            if (!$cur) return false;
        }

        return true;
    }
}