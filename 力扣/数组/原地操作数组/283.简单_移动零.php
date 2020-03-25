<?php

// 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。

// 示例:

// 输入: [0,1,0,3,12]
// 输出: [1,3,12,0,0]
// 说明:

// 必须在原数组上操作，不能拷贝额外的数组。
// 尽量减少操作次数。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/move-zeroes
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

//双指针+原地操作
//一个指向零元素  一个指向非0元素
//并且保证零元素指针 在 非0元素指针前面
//遇到0  和 非0元素进行交换  并保存非0元素的下一位置(优化) 如果下次继续找非0 我们可以从numIndex+1开始找 而不是zeroIndex+1位置找
//期间如果非0元素下标== nums.len 表示非0元素已经没有了  移动完成

//时空复杂度O(n)  O(1)
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $count = count($nums);
        if (!$count) return $nums;

        $zeroIndex = $numIndex = 0;
        for($i=0; $i<$count; $i++) {
            //当前元素为0 
            if ($nums[$i] == 0) {
                //并且还未找到不为0的数
                if ($numIndex == 0) $j = $i+1;
                //已保存上次不为0的位置+1(上次交换之后 上次不为0的位置值为0)
                else $j = $numIndex; 
                
                for(; $j<$count; $j++) {
                    if ($nums[$j]) {
                        $nums[$i] = $nums[$j];
                        $nums[$j] = 0;

                        $numIndex = $j+1;    
                        break;
                    }
                }
                //当前不为0的数已经交换|不存在了
                if ($j== $count) return $nums;
            }
        }
        return $nums;
    }
}