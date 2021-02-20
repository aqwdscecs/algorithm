<?php

/*
Given a non-empty array of integers nums, every element appears twice except for one. Find that single one.

Follow up: Could you implement a solution with a linear runtime complexity and without using extra memory?

 

Example 1:

Input: nums = [2,2,1]
Output: 1
Example 2:

Input: nums = [4,1,2,1,2]
Output: 4
Example 3:

Input: nums = [1]
Output: 1
 

Constraints:

1 <= nums.length <= 3 * 104
-3 * 104 <= nums[i] <= 3 * 104
Each element in the array appears twice except for one element which appears only once.

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/single-number
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/


/*思路： 解法一 最先想到 偶数次可以抵消  所以 hashMap遍历数组   有对应键则删除该键值  无则插入 到最后hashMap即为只出现一次的那个数字  时空复杂度O(n) O(n)

		解法二  做完后 看题解  相同的数字异或为0   到最后偶数次数字异或结果为0   与出现1次的数字异或 就是出现1次数字的本身值  时空复杂度O(n) O(1)
*/

#解法一代码
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $hashMap = [];

        foreach ($nums as $item => $numV) {
            if (isset($hashMap[$numV])) {
                unset($hashMap[$numV]);
            } else {
                $hashMap[$numV] = 1;
            }            
        }
        $hashMap = array_flip($hashMap);
        return $hashMap[1];
    }
}




#解法二代码
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        
        $ret = 0;

        foreach ($nums as $item => $numV) {
            $ret ^= $numV;
        }

        return $ret;
    }
}