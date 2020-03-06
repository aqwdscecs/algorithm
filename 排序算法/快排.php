<?php

//快排递归写法：
//时间复杂度O(nlogn) 最坏 O(n^2)
//空间复杂度O(logn) 最坏O(n-1)
//最坏情况是标志位某一边元素每次划分只有一位

function quickSort($arr)
{
	$len = count($arr);
	if ($len <= 1) return $arr;

	$pivot = $arr[0];

	$arrLower = [];
	$arrUpper = [];

	for($index=1; $index < $len; $index++) {
		if ($arr[$index] < $pivot) $arrLower[] = $arr[$index];
		else $arrUpper[] = $arr[$index];
	}
	$arrLower = quickSort($arrLower);
	$arrUpper = quickSort($arrUpper);

	return array_merge($arrLower, array($pivot), $arrUpper);
}