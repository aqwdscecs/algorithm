<?php

//折半插入排序 是在直接插入的基础上进行优化

//通过减少比较次数(查找插入位置) 
//然后集中将找到的位置  到 当前位置 区间进行移动

//稳定排序

//平均复杂度 O(n^2)
//最坏      O(n^2)
//最好      O(n)
//空间复杂度O(1)
function binarySort($arr)
{
	$count = count($arr);
	if ($count <= 1) return $arr;

	//外层从1开始逐一比较
	for ($index=1; $index < $count; $index++) {
		//如果存在反序 才寻找需要插入的位置
		if ($arr[$index-1] > $arr[$index]) {
			$temp = $arr[$index];

			$low = 0;
			$high = $index-1;
			while ($low<=$high) {
				$mid = $low +intval(($high-$low)/2);
				if ($temp < $arr[$mid]) $high = $mid-1;
				else $low = $mid+1; 
			}
			//插入位置插入元素前 将[low,index-1]向右移动一个单位
			for ($j=$index-1; $j >= $mid; $j--) {
				$arr[$j+1] = $arr[$j];
			}
			//最后放入插入位置
			$arr[$low] = $temp;
		}
	}
}