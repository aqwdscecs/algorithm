<?php


// 给定一个排序数组，你需要在原地删除重复出现的元素，使得每个元素只出现一次，返回移除后数组的新长度。
// 不要使用额外的数组空间，你必须在原地修改输入数组并在使用 O(1) 额外空间的条件下完成。

// 示例 1:
// 给定数组 nums = [1,1,2], 
// 函数应该返回新的长度 2, 并且原数组 nums 的前两个元素被修改为 1, 2。 
// 你不需要考虑数组中超出新长度后面的元素。

// 示例 2:
// 给定 nums = [0,0,1,1,1,2,2,3,3,4],
// 函数应该返回新的长度 5, 并且原数组 nums 的前五个元素被修改为 0, 1, 2, 3, 4。
// 你不需要考虑数组中超出新长度后面的元素。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/remove-duplicates-from-sorted-array
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
 	//执行用时 :20 ms, 在所有 PHP 提交中击败了97.78%的用户
	// 内存消耗 :17.1 MB, 在所有 PHP 提交中击败了35.97%的用户
    function removeDuplicates(&$nums) {
        $dict = [];
        $newLen = 0;

        $count = count($nums);
        if ($count <= 1 ) return $count;
        
        //一个遍历原数组  一个newArrIndex指去重后的数组下标
        $index = 0;
        $newArrIndex = 0;
        while($index < $count) {
            if (!isset($dict[$nums[$index]])) {
                //如果未出现过的值先字典数组置1
                $dict[$nums[$index]] = 1;
                //新数组当前下标赋值原数组为出现过的值
                $nums[$newArrIndex] = $nums[$index];
                
                $newLen++;
                $newArrIndex++;
            } 
            $index++;
        }
        return $newLen;
    }
}