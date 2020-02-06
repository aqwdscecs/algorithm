<?php

// 题目描述：
// 给定一个数组 nums 和一个值 val，你需要原地移除所有数值等于 val 的元素，返回移除后数组的新长度。
// 不要使用额外的数组空间，你必须在原地修改输入数组并在使用 O(1) 额外空间的条件下完成。
// 元素的顺序可以改变。你不需要考虑数组中超出新长度后面的元素。

// 示例 1:
// 给定 nums = [3,2,2,3], val = 3,
// 函数应该返回新的长度 2, 并且 nums 中的前两个元素均为 2。
// 你不需要考虑数组中超出新长度后面的元素。

// 示例 2:
// 给定 nums = [0,1,2,2,3,0,4,2], val = 2,
// 函数应该返回新的长度 5, 并且 nums 中的前五个元素为 0, 1, 3, 0, 4。
// 注意这五个元素可为任意顺序。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/remove-element
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    //思想：(双指针)设置两个下标，一个指向原数组，一个下标指向返回数组的下标
	//	   原数组下标值不等于输入元素值时，新数组下标的值为当前原数组下标的值，然后原数组下标和新数组下标同时++
	//     如果等于输入元素值时，原数组下标++，新数组下标不变

	// 执行结果：通过
	// 显示详情
	// 执行用时 :12 ms, 在所有 PHP 提交中击败了37.07%的用户
	// 内存消耗 :15.2 MB, 在所有 PHP 提交中击败了11.74%的用户
	function removeElement(&$nums, $val) {
		$count = count($nums);
		if (!$count) return 0;

		$index = $newIndex = 0;

		for ($index=0; $index < $count; $index++) {
			if ($nums[$index] != $val){
				$nums[$newIndex] = $nums[$index];
				$newIndex++;
			}
		}
		return $newIndex;	
    }	        
}