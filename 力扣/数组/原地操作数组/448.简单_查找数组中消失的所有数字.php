<?php

// 给定一个范围在  1 ≤ a[i] ≤ n ( n = 数组大小 ) 的 整型数组，数组中的元素一些出现了两次，另一些只出现一次。

// 找到所有在 [1, n] 范围之间没有出现在数组中的数字。

// 您能在不使用额外空间且时间复杂度为O(n)的情况下完成这个任务吗? 你可以假定返回的数组不算在额外空间内。

// 示例:

// 输入:
// [4,3,2,7,8,2,3,1]

// 输出:
// [5,6]

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/find-all-numbers-disappeared-in-an-array
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


//用hashMap 开辟n的长度 遍历一次后 出现的数组设置对应键的值为nums[i]
// 再遍历一次  查看哪些键的值为空  就是未出现的数字
// 时空复杂度O(n)  O(n)

//思路二: 在原数组上进行*-1操作  
// if (nums[i]-1对应的下标位置为正数  变为负数)   nums[nums[i]-1] *= -1
// 最后出现的数字对应下标-1的值都为负数  为正数的值下标+1 即为未出现的值
//时空复杂度 O(n) O(1)
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDisappearedNumbers($nums) {
        $len = count($nums);

        for ($i=0; $i<$len; $i++) {
        		//若当前值对应索引下标为正数  则x-1
                $nums[abs($nums[$i])-1] *= ($nums[abs($nums[$i])-1] > 0) ? -1 : 1;
        }

        $res = [];
        for ($i=0; $i<$len; $i++) {
        	//当前下标值为正  表示当前索引下标+1 为未出现的数字
            if ($nums[$i] > 0) $res[] = $i+1;
        }
        return $res;
    }
}