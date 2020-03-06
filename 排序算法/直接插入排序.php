<?php

//[0,..., i] 从1开始向后i循环 插入排序的位置

//若a[x] < a[x-1] 那么 temp = a[x]  a[x] = a[x-1]
//继续从当前x-1向 0的方向比较  如果 a[x-n] > temp -> a[x-n+1] = a[x-n]
// 直到x-n < 0 || a[n] < temp

//和冒泡的思想类似 
//不同点是  冒泡每次只需要移动一个元素
//           


//稳定排序

//最好情况：正序 O(n-1)
//平均 ：  O(n^2)
//空间复杂度O(1)
function insertSort($arr)
{
	$count = count($arr);
	if ($count <= 1) return $arr;

	for ($index=1; $index < $count; $index++) {
		//当存在反序时
		if ($arr[$index] < $arr[$index-1]) {
			$temp = $arr[$index];
	
			$pre = $index-1;
			while ($pre >= 0 && $arr[$pre] > $temp) {
				$arr[$pre+1] = $arr[$pre];
				$pre--;
			}
			$arr[$pre+1] = $temp;
		}
	}
	return $arr;
}