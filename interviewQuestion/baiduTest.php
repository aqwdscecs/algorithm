<?php
 

/*题目一*/
// 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
// 每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
// 注意：给定 n 是一个正整数。

// 示例 1：
// 输入： 2
// 输出： 2
// 解释： 有两种方法可以爬到楼顶。
// 1.  1 阶 + 1 阶
// 2.  2 阶

// 示例 2：
// 输入： 3
// 输出： 3
// 解释： 有三种方法可以爬到楼顶。
// 1.  1 阶 + 1 阶 + 1 阶
// 2.  1 阶 + 2 阶
// 3.  2 阶 + 1 阶

//用递归做出来但是复杂度是O(n^2) 面试官后面提示了用动态规划
function jumpKindCount($n)
{
	// if ($n <= 0) return -1;
	if ($n <= 2) return $n;

	jumpCount($n);
}
function jumpCount($n)
{
	if ($n <= 2) return $n;

	return jumpCount($n-1) + jumpCount($n-2);
}

 
/*题目二*/
// 给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。
// 你可以假设数组中无重复元素。

// 示例 1:
// 输入: [1,3,5,6], 5
// 输出: 2

// 示例 2:
// 输入: [1,3,5,6], 2
// 输出: 1

// 示例 3:
// 输入: [1,3,5,6], 7
// 输出: 4

// 示例 4:
// 输入: [1,3,5,6], 0
// 输出: 0

//题目没有做出来，left和right的边界值变化没有考虑好
function binaryFind($arr, $target)
{ 
		$count = count($arr);

		//为空直接插到首元素
		if ($count <= 0) return 0;

		//小于首元素 直接赋予0下标插入
		if ($arr[0] > $target) return 0;
		//大于末尾元素  直接赋予最后下标+1位置
		if ($arr[$count-1] < $target) return $count;

		$left = 0;
		$right = $count -1 ;
		
		while ($left <= $right) {
			$mid = $left + intval(($right - $left)/2);
			if ($arr[$mid] < $target) {
				$left = $mid;
			}  else if ($arr[$mid] > $target) {
				$right = $mid-1;
			} else {
				return $mid;
			}
		}
		return $mid+1;
}


